<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index($id)
    {

        $store = Store::with('products')->findOrFail($id);

        return view('frontend.pages.shop_page', compact('store'));
    }
}
