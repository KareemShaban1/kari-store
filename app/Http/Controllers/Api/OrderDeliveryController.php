<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDeliveryController extends Controller
{
    //
    public function show($id){
        $orderDelivery = OrderDelivery::query()->select([
            'id',
            'order_id',
            'delivery_id',
            DB::raw("ST_X(current_location) AS lat"),
            DB::raw("ST_Y(current_location) AS lng")
        ])->where('id',$id)->findOrFail();
        return $orderDelivery;
    }
    public function update(Request $request , OrderDelivery $orderDelivery){
        $request->validate([
            'lng'=>'required|numeric',
            'lat'=>'required|numeric',
        ]);

        $orderDelivery->update([
            'current_location'=>DB::raw("POINT({$request->lng} , {$request->lat})"),
        ]);

        return $orderDelivery;
    }
}