<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $cart;

    // CartRepository Interface 
    // CartModelRepository
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('frontend.pages.cart', [
            'cart' => $this->cart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartRepository $cart)
    {
        //
        // $request->validate([
        //     'product_id'=>['required','int','exists:products,id'],
        //     'quantity'=>['nullable','int','min:1'],

        // ]);
        // dd($request->all());
        $product = Product::findOrFail($request->post('product_id'));

        $cart->add($product, $request->post('quantity'));
        // dd($cart);

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            // 'product_id'=>['required','int','exists:products,id'],
            'quantity' => ['required', 'int', 'min:1'],

        ]);
        // $product = Product::findOrFail($request->post('product_id'));
        $this->cart->update($id, $request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->cart->delete($id);
    }

    public function emptyCart()
    {
        $this->cart->empty();
    }

    public function total()
    {
        $this->cart->total();
    }



    public function get_sub_total(Request $request)
    {

        $quantity = $request->quantity;
        $product_id[] = $request->product_id;


        $product_price = Product::where('id', $product_id)->value('price');
        $sub_total = $quantity * $product_price;
        // return $sub_total;

        return view('frontend.pages.price_part', [
            'sub_total' => $sub_total,
        ]);
    }

    public function get_all_total(Request $request)
    {

        $quantity = $request->quantity;

        $total =  Cart::with('product')->get()->sum(function ($item) use ($quantity) {
            return $quantity * $item->product->price;
        });

        return view('frontend.pages.total_price_part', [
            'total' => $total,
        ]);

        // return $total;
    }
}
