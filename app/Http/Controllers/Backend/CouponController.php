<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //

    public function index()
    {

        $coupons = Coupon::all();

        return view('backend.pages.coupons.index', compact('coupons'));
    }

    public function show()
    {

      
    }

    public function create()
    {
        $categories =   Category::all();
        $products = Product::all(); 
        return view('backend.pages.coupons.create',compact('categories','products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::create($data);
        return redirect()->route('backend.coupons.index');
      
    }

    public function edit()
    {

      
    }

    public function update()
    {

      
    }

    public function destroy()
    {

      
    }
}
