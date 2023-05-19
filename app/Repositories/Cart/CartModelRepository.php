<?php

namespace App\Repositories\Cart;

use Illuminate\Support\Collection;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class CartModelRepository implements CartRepository
{
          protected $items;

          public function __construct()
          {
                    // make items = collection
                    $this->items = collect([]);
          }

          public function get(): Collection
          {
                    // if there is no items in the cart
                    if (!$this->items->count()) {
                              $this->items = Cart::with('product')->get();
                    }
                    return $this->items;
          }

          public function add(Product $product, $quantity = 1)
          {

                    // if there is cart with products get it 
                    $item =  Cart::where('product_id', '=', $product->id)->first();

                    // if not there is cart with products create one and add products 
                    if (!$item) {
                              $cart = Cart::create([
                                        'user_id' => Auth::id(),
                                        'product_id' => $product->id,
                                        'quantity' => $quantity
                              ]);
                              $this->get()->push($cart);
                              return $cart;
                    }
                    return $item->increment('quantity', $quantity);
          }

          public function update($cart_id, $quantity)
          {
                    // update cart [product quantity] based on cart id
                    Cart::where('id', '=', $cart_id)->update(['quantity' => $quantity]);
          }

          public function delete($id)
          {
                    // delete cart based on cart id
                    Cart::where('id', '=', $id)->delete();
          }
          public function empty()
          {
                    Cart::query()->delete();
          }

          public function total(): float
          {
                    // return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
                    //           ->selectRaw('SUM(products.price * carts.quantity) as total')
                    //           ->value('total');

                    //// get sum of all items [product_quantity * product_price] on the cart 
                    return $this->get()->sum(function ($item) {
                              return $item->quantity * $item->product->price;
                    });
          }


}
