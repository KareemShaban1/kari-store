<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Events\OrderToDelivery;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deliveries = Delivery::all();
        $orders = Order::with('user', 'store', 'products.category')->get();
        return view('backend.Admin_Dashboard.orders.index', compact('orders', 'deliveries'));
    }




    public function assignDelivery(Request $request)
    {   
        $data = $request->all();
        // dd($data);
       $order_delivery =  OrderDelivery::create($data);

        $order = Order::where('id',$order_delivery->order_id)->first();
        // dd($order);
        event(new OrderToDelivery($order));


        return redirect()->route('admin.orders.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $stores = Store::all();
        return view('backend.Admin_Dashboard.orders.create', compact('users', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        $users = User::all();
        $stores = Store::all();
        return view('backend.Admin_Dashboard.orders.edit', compact('order', 'users', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
