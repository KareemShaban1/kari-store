<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    //

    public function index(){

    }

    // show product details
    public function show(Product $product){

        if($product->status != 'active'){
            abort(404);
        }
        return view('frontend.pages.product_details',compact('product'));
    }
}
