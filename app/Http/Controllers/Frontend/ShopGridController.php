<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ShopGridController extends Controller
{
    //
    public function index(Request $request)
    {

        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('status', 'active')->paginate(12);


        return view('frontend.pages.shop_grid', compact('categories', 'brands', 'products'));
    }


    public function sortBy(Request $request)
    {


        $products = Product::where('status', 'active')->paginate(12);

        if ($request->sort) {
            if ($request->sort == "Low Price") {
                $products = Product::where('status', 'active')->orderBy('price', 'ASC')->paginate(12);
            } elseif ($request->sort == "High Price") {
                $products = Product::where('status', 'active')->orderBy('price', 'DESC')->paginate(12);
            } elseif ($request->sort == "A - Z Order") {
                $products = Product::where('status', 'active')->orderBy('name', 'ASC')->paginate(12);
            }
        }
        return view('frontend.pages.show_products', compact('products'));


        // return view('frontend.pages.shop_grid', compact('products'));
    }

    public function search_products(Request $request)
    {
    
        $products = Product::where('status', 'active')->paginate(12);
        if($request->search != ''){

            $products = Product::where('name','LIKE','%'.$request->search.'%')->paginate();   
            // dd($products); 
        }

        return view('frontend.pages.show_products', compact('products'));
        
    }

    public function category_filter(Request $request){

        if($request->category){

            $products = Product::where('category_id',$request->category)->paginate();   
            // dd($products); 
        }

        return view('frontend.pages.show_products', compact('products'));

    }

    public function reset_filters(){
        $products = Product::where('status', 'active')->paginate(12);
        return view('frontend.pages.show_products', compact('products'));

    }


    public function brand_filter(Request $request){

        if($request->brand){

            $products = Product::where('brand_id',$request->brand)->paginate();   
            // dd($products); 
        }

        return view('frontend.pages.show_products', compact('products'));


    }


    public function priceFilter(Request $request)
    {


        $products = Product::where('status', 'active')->whereBetween('price', [$request->left_value, $request->right_value])->paginate(12);


        return view('frontend.pages.show_products', compact('products'));
        // return view('frontend.pages.shop_grid', compact( 'products','categories','brands'));


    }

    public function all_filters(Request $request)
    {

        // if ($request->sort) {
        //     if ($request->sort == "Low Price") {
        //         $products = Product::where('status', 'active')->orderBy('price', 'ASC')->paginate(12);
        //         // return view('frontend.pages.show_products', compact('products'));
        //     } elseif ($request->sort == "High Price") {

        //         $products = Product::where('status', 'active')->orderBy('price', 'DESC')->paginate(12);
        //         // return view('frontend.pages.show_products', compact('products'));
        //     } elseif ($request->sort == "A - Z Order") {
        //         $products = Product::where('status', 'active')->orderBy('name', 'ASC')->paginate(12);
        //         // return view('frontend.pages.show_products', compact('products'));
        //     } elseif ($request->sort == "Select Order") {

        //         // return view('frontend.pages.show_products', compact('products'));
        //     }
        // }

        // if ($request->left_value || $request->left_value) {
        //     $products = Product::where('status', 'active')->whereBetween('price', [$request->left_value, $request->right_value])->paginate(12);
        // }

        if($request->category && $request->brand && $request->search){
            $products = Product::where('status', 'active')
            ->where('category_id', $request->category)
            ->where('brand_id', $request->brand)
            ->where('name', 'like', '%' . $request->search . '%')
            ->paginate(12);
        }
        return view('frontend.pages.show_products', compact('products'));
    }


   
}
