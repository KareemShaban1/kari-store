<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\WebsiteParts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {

        $banner_collection = Banner::all();
        $banners['banners'] = $banner_collection->flatMap(function ($collection) {
            return [$collection->banner_name => $collection->image_url];

        });

        $websiteParts_collection = WebsiteParts::all();
        $websiteParts['parts'] = $websiteParts_collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];

        });

        $featured_categories =
        Category::active()
        ->where('featured', '=', 1)->get();



        // get latest 8 products which status is active
        // $products = Product::with('category', 'store', 'reviews')->active()->latest()->take(8)->get();

        // Get one product from each store
        $stores = Store::all();
        $products = [];

        foreach ($stores as $store) {
            $product = Product::with(['category', 'store', 'reviews'])
                ->active()
                ->where('store_id', $store->id)
                ->latest()
                ->first(); // Get the latest product for each store
            if ($product) {
                $products[] = $product;
            }
        }

        $brands = Brand::all();
        $categories = Category::get();

        $all_products = Product::active()->get();
        
        return view(
            'frontend.pages.home',
            compact(
                'products',
                'banners',
                'websiteParts',
                'featured_categories',
                'brands',
                'categories',
                'all_products'
                // ,'best_seller_products'
            )
        );
    }
}