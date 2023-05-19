<?php 


namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;
Interface CartRepository {

          // function get cart items
          public function get() : Collection;

          // function to add to cart 
          public function add(Product $product , $quantity = 1);

          // fuction to update the cart based on cart_id
          public function update($cart_id,$quantity);

          public function delete($cart_id);

          public function empty();

          public function total();


}
