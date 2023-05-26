<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //

    public function index()
    {

        $coupons = Coupon::all();

        return view('backend.Admin_Dashboard.coupons.index', compact('coupons'));
    }

    public function show()
    {

      
    }

    public function create()
    {
        $categories =   Category::all();
        $products = Product::all(); 
        return view('backend.Admin_Dashboard.coupons.create',compact('categories','products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::create($data);
        return redirect()->route('admin.coupons.index');
      
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
