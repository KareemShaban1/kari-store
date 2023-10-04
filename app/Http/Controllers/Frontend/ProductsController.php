<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index(){

    }

    // show product details
    public function show(Product $product){

        $product_variants = ProductVariant::where('product_id',$product->id)->get();
        
        $reviews = Review::where('product_id', $product->id)->get();

        if($product->status != 'active'){
            abort(404);
        }
        return view('frontend.pages.product_details',compact('product','reviews','product_variants'));
    }

    public function productAutocomplete(Request $request){
        $term = $request->input('term');

        $products = Product::where('name', 'LIKE', '%' . $term . '%')
            ->select('name', 'id' ,'slug','image') // Select both name and id
            ->get(); // Retrieve the matching customers

        return response()->json($products);
    }
}