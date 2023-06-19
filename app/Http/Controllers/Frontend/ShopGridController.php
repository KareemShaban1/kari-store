<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    private $productPerPage = 6;

    public function index(Request $request, $category_id = null)
    {
        $categories = Category::all();
        $brands = Brand::all();

        $products = $this->getFilteredProducts($request, $category_id);

        return view('frontend.pages.shop_grid', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'category_id' => $category_id
        ]);
    }

    public function reset_filters()
    {
        return redirect()->route('shop-grid.index');
    }

    public function all_filters(Request $request)
    {
        $products = $this->getFilteredProducts($request);

        if ($request->ajax()) {
            return response()->json([
                'products' => $products,
                'pagination_links' => $products->appends($request->query())->links()->toHtml(),
            ]);
        }

        return response()->json([
            'products' => $products,
            'pagination_links' => $products->appends($request->query())->links()->toHtml(),
        ]);
    }

    private function getFilteredProducts(Request $request, $category_id = null)
    {
        $query = Product::where('status', 'active');

        if ($category_id !== null) {
            $query->where('category_id', $category_id);
        }

        if ($request->has('category')) {
            $categories = $request->input('category');
            $query->whereIn('category_id', $categories);
        }

        if ($request->has('brand')) {
            $brands = $request->input('brand');
            $query->whereIn('brand_id', $brands);
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'Low Price':
                    $query->orderBy('price', 'ASC');
                    break;
                case 'High Price':
                    $query->orderBy('price', 'DESC');
                    break;
                case 'A - Z Order':
                    $query->orderBy('name', 'ASC');
                    break;
            }
        }

        return $query->with(['category', 'store'])->paginate($this->productPerPage);
    }
}
