<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderCreated;
use App\Exceptions\InvalidOrderException;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Destination;
use App\Models\Order;
use App\Models\OrderCoupon;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Store;
use App\Models\TempSession;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Intl\Countries;

class CheckoutController extends Controller
{
    //
    public function create(CartRepository $cart)
    {
        $user = Auth::user();
        $neighborhood_shipping = $user->neighborhood->price;
        $shipping_fees = 0;
        $storeIds = [];

        foreach ($cart->get() as $cart_item) {
            $store_id = $cart_item->product->store_id;

            if (!in_array($store_id, $storeIds)) {
                // If the store ID is not in the array, it's a unique store
                $storeIds[] = $store_id;

                if (count($storeIds) === 1) {
                    $shipping_fees += $neighborhood_shipping;
                } else {
                    $shipping_fees += 0.5 * $neighborhood_shipping;
                }
            }
        }

        // Now, $shipping_fees contains the total shipping fees based on the unique stores in the cart.

        $numberOfUniqueStores = count($storeIds);
        if ($cart->get()->count() == 0) {
            // return redirect()->route('home');
            throw new InvalidOrderException('Cart is Empty');
        }

        $destinations = Destination::all();

        return view('frontend.pages.checkout', [
            'destinations'=>$destinations,
            'cart' => $cart,
            'countries' => Countries::getNames('ar'),
            'shipping_fees'=>$shipping_fees
        ]);
    }

   

    // public function removeCoupon()
    // {
    //     // Remove the coupon details from the session
    //     Session::forget('coupon');
    //     Session::forget('coupon_code');

    //     return redirect()->back()->with('success', 'Coupon removed successfully.');
    // }

    public function store(Request $request, CartRepository $cart)
    {
        
        // $request->validate([
        //     'phone_number'=>'required',
        // ]);

        // get items / products of the cart , treat each item as a cart , and group them by store
        $items = $cart->get()->groupBy('product.store_id');

        
        // get coupon stored in session , if it exist
        $coupon = Session::get('coupon');

        // get total price of products in cart
        $total = $cart->total();

        // if there is coupon stored in session 
        if ($coupon) {
            // subtract coupon discount from total 
            $total -= $coupon->discount_amount;
        }

        DB::beginTransaction();
        try {

            // for loop on items as key , value  [store_id , cart_item]
            // each store and its products
            foreach ($items as $store_id => $cart_items) {
                
                $store = Store::findOrFail($store_id);
                
                // dd($request->all());
                $order = new Order();
                $order->store_id = $store_id;
                $order->user_id = Auth::user('user')->id;
                $order->payment_method = 'cash_on_delivery';
                $order->total = $total;
                $order->shipping = $request->shipping_fees;
                $order->coupon_id = $coupon ? $coupon->id : null;

                

                foreach ($cart_items as $item) {
                    
                    // dd($cart_items);
                    // dd($item->product->store->id , $store_id); 
                    if($item->product->store->id == $store_id){
                        
                        $order->cart_id = $item->cookie_id;
                        $product = Product::findOrFail($item->product_id);
                        $order->percent = ($store->percent * $product->price) / 100 ;

                        $order->save();

                    }
                    
                OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'variant_id'=>$item->variant_id ? $item->variant_id : null,
                        'product_name' => $item->product->name,
                        'price' => $item->product->price,
                        'quantity' => $item->quantity,
                    ]);
                    
                    
                
                }

                
                if ($coupon) {
                    OrderCoupon::create([
                        'order_id' => $order->id,
                        'coupon_id' => $coupon->id,
                        'user_id'=>Auth::user('user')->id
                    ]);

                    $temp_session = TempSession::where('user_id', Auth::user('user')->id)->first();
                    $temp_session->delete();
                }


                foreach ($request->post('address') as $type => $address) {

                    $address["type"] = $type;
                    $order->addresses()->create($address);
                }

                // Remove the coupon details from the session
                // Session::forget('coupon');

            }


            DB::commit();

            Cart::regenerateCartSessionId();

            event(new OrderCreated($order));

            ////// another way
            // event('order.created',$order ,Auth::user());

        } catch (ValidationException $e) {
            // Handle validation errors
            // You can access the validation errors using $e->errors()
            return redirect()->back()->withErrors($e->errors())->withInput();
        
        } catch (\Throwable $e) {
            // Handle other errors
            DB::rollBack();
            // Log the error or return a response indicating the failure
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect()->route('home');
    }
    
}