<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\WebsiteParts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

        $banner_collection = Banner::all();
        $banners['banners'] = $banner_collection->flatMap(function ($collection) {
            return [$collection->banner_name => $collection->image_url];
            
        });

        $websiteParts_collection = WebsiteParts::all();
        $websiteParts['parts'] = $websiteParts_collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
            
        });

        // dd($websiteParts_collection,$websiteParts['parts']['left_show_bar']);

        // get latest 8 products which status is active 
        $products = Product::with('category')->active()->latest()->take(8)->get();
        return view('frontend.pages.home',compact('products','banners','websiteParts'));
    }
}
