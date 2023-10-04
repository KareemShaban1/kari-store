<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->middleware(['auth'])->except('index');
        // $this->middleware(['auth'])->only('index');
    }

    public function index(){
       
        $topProducts = OrderItem::select('product_id', DB::raw('COUNT(product_id) as total_orders'))
        ->groupBy('product_id')
        ->orderByDesc('total_orders')
        ->take(5) // Limit the results to the top 5 products
        ->get();
        // Extract the product IDs from the $topProducts result
        $productIds = $topProducts->pluck('product_id')->toArray();

        // Retrieve the products associated with the top product IDs
        $products = Product::whereIn('id', $productIds)->get();
        return view('backend.Admin_Dashboard.dashboard.index',compact('topProducts','products'));
    }
}