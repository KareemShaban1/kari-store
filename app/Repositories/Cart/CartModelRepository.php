<?php

namespace App\Repositories\Cart;

use Illuminate\Support\Collection;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartModelRepository implements CartRepository
{
    protected $items;
    protected $couponCode;



    public function __construct()
    {
        // make items = collection
        $this->items = collect([]);
    }

    public function setCouponCode($request)
    {

        $this->couponCode =  $request->input('coupon_code');
    }


    public function get(): Collection
    {
        // if there is no items in the cart
        if (!$this->items->count()) {
            $this->items = Cart::with('product')->get();
        }
        return $this->items;
    }


    public function add(Product $product, $quantity = 1 , $variant_id = null)
    {
       if($variant_id != null){

         // if there is cart with products get it
         $item =  Cart::where('variant_id', '=', $variant_id)->first();
         
         // if not there is cart with products create one and add products
         if (!$item) {
             $cart = Cart::create([
                     'user_id' => Auth::id(),
                     'product_id' => $product->id,
                     'variant_id'=>$variant_id,
                     'quantity' => $quantity,
                     'coupon_code' => $this->couponCode, // Store the applied coupon code
             ]);
             
             $this->get()->push($cart);
             return $cart;
         }
         return $item->increment('quantity', $quantity);
        
       }else {
         // if there is cart with products get it
         $item =  Cart::where('product_id', '=', $product->id)->first();

         // if not there is cart with products create one and add products
         if (!$item) {
             $cart = Cart::create([
                     'user_id' => Auth::id(),
                     'product_id' => $product->id,
                     'quantity' => $quantity,
                     'coupon_code' => $this->couponCode, // Store the applied coupon code
 
             ]);
             $this->get()->push($cart);
             return $cart;
         }
         return $item->increment('quantity', $quantity);
       }
    }

    public function update($cart_id, $quantity, $product_id)
    {
        // update cart [product quantity] based on cart id
        Cart::where('id', '=', $cart_id)->
        where('product_id', $product_id)->
        update(
            [
                            'quantity' => $quantity,
            ]
        );
    }

    public function delete($id)
    {
        // delete cart based on cart id
        Cart::where('id', '=', $id)->delete();
    }

    
    public function empty()
    {
        $this->couponCode = null; // Clear the applied coupon code
        Cart::query()->delete();
        
        
    }

    public function total(): float
    {


        $subtotal = $this->get()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return $subtotal;
    }
}