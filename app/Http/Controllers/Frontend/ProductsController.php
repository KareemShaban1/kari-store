<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;

class ProductsController extends Controller
{
    //

    public function index(){

    }

    // show product details
    public function show(Product $product){

        
        $reviews = Review::where('product_id', $product->id)->get();

        if($product->status != 'active'){
            abort(404);
        }
        return view('frontend.pages.product_details',compact('product','reviews'));
    }
}
