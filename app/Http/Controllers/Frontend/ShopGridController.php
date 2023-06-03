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
    public function index(Request $request, $category_id = null)
    {

        $categories = Category::all();
        $brands = Brand::all();
        if ($category_id) {
            $products = Product::where('status', 'active')
                ->where('category_id', $category_id)
                ->paginate(12);
        } else {
            $products = Product::where('status', 'active')->paginate(12);
        }


        return view('frontend.pages.shop_grid', compact('categories', 'brands', 'products'));
    }

    public function categories_filter($category_id)
    {

        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::where('status', 'active')
            ->where('category_id', $category_id)
            ->paginate();
        // dd($products);

        return view('frontend.pages.category_grid', compact('categories', 'category_id', 'brands', 'products'));
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


    }

    public function search_products(Request $request)
    {

        $products = Product::where('status', 'active')->paginate(12);
        if ($request->search != '') {

            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->paginate();
            // dd($products); 
        }

        return view('frontend.pages.show_products', compact('products'));
    }


    public function category_filter(Request $request)
    {
        if ($request->has('category')) {
            $categories = $request->input('category');
            $products = Product::whereIn('category_id', $categories)->paginate();
        } else {
            $products = Product::paginate();
        }

        return view('frontend.pages.show_products', compact('products'));
    }

    public function brand_filter(Request $request)
    {
        if ($request->has('brand')) {
            $brands = $request->input('brand');
            $products = Product::whereIn('brand_id', $brands)->paginate();
        } else {
            $products = Product::paginate();
        }

        return view('frontend.pages.show_products', compact('products'));
    }


    public function reset_filters()
    {
        $products = Product::where('status', 'active')->paginate(12);
        return view('frontend.pages.show_products', compact('products'));
    }


    public function priceFilter(Request $request)
    {

        if ($request->has('left_value') || $request->has('right_value')) {

            $products = Product::where('status', 'active')->whereBetween('price', [$request->left_value, $request->right_value])->paginate(12);
        } else {
            $products = Product::where('status', 'active')->paginate(12);
        }
        return view('frontend.pages.show_products', compact('products'));
    }



    public function all_filters(Request $request)
    {
        $query = Product::where('status', 'active');

        // Apply category filter
        if ($request->has('category')) {
            $categories = $request->input('category');
            $query->whereIn('category_id', $categories);
        }

        // Apply brand filter
        if ($request->has('brand')) {
            $brands = $request->input('brand');
            $query->whereIn('brand_id', $brands);
        }

        // Apply price range filter
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Apply search filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        if ($request->has('sort')) {
            // dd($request);
            if ($request->sort == "Low Price") {
                $query->where('status', 'active')->orderBy('price', 'ASC')->paginate(12);
            } elseif ($request->sort == "High Price") {
                $query->where('status', 'active')->orderBy('price', 'DESC')->paginate(12);
            } elseif ($request->sort == "A - Z Order") {
                $query->where('status', 'active')->orderBy('name', 'ASC')->paginate(12);
            }else{
                $query->where('status', 'active');
            }

        }

        $products = $query->paginate(12);

        // pagination using ajax
        if ($request->ajax()) {
            return view('frontend.pages.show_products', compact('products'))->render();
        }

      

        return view('frontend.pages.show_products', compact('products'));
    }
}
