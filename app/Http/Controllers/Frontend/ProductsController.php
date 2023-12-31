<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index(){

    }

    // show product details
    public function show($id , $slug){
        $product = Product::where('id',$id)->where('slug',$slug)->first(); 

        $product_variants = ProductVariant::where('product_id',$product->id)->get();
        
        $reviews = Review::where('product_id', $product->id)->get();

        if($product->status != 'active'){
            abort(404);
        }
        return view('frontend.pages.product_details',compact('product','reviews','product_variants'));
    }

    public function show_variant(Product $product){

        $variant = ProductVariant::where('product_id',$product->id)->with('product')->first();
        
        // $reviews = Review::where('product_id', $product->id)->get();

        // if($product->status != 'active'){
        //     abort(404);
        // }
        return view('frontend.pages.product_variant_details',compact('variant'));

    }

    
    public function productAutocomplete(Request $request){
        $term = $request->input('term');

        $products = Product::where('name', 'LIKE', '%' . $term . '%')
            ->select('name', 'id' ,'slug','image') // Select both name and id
            ->get(); // Retrieve the matching customers

        return response()->json($products);
    }
}