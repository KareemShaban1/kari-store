<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StorePaymentGatewayRequest;
use App\Http\Requests\Backend\UpdatePaymentGatewayRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    use UploadImageTrait;
    //
    public function index(){
        
        $paymentGateways = PaymentGateway::all();

        return view('backend.dashboards.admin.payment_gateway.index',compact('paymentGateways'));
    }

    public function create(){
        
        return view('backend.dashboards.admin.payment_gateway.create');

    }

    public function store(StorePaymentGatewayRequest  $request){
        
        $request->validated();
        // get request input array without [image , tags]
        $data = $request->except('image');

        // add 'image' to the input array $data
        $data['image'] = $this->ProcessImage($request, 'image', 'payment_gateways');

        PaymentGateway::create($data);

        return redirect()->route('admin.paymentGateways.index')->with('toast_success','Payment Gateway Created Successfully');
        
    }

    public function edit($id){
        
        $paymentGateway = PaymentGateway::findOrFail($id);
        return view('backend.dashboards.admin.payment_gateway.edit',compact('paymentGateway'));

    }

    public function update(UpdatePaymentGatewayRequest  $request , $id){

        $paymentGateway = PaymentGateway::findOrFail($id);
        
        $request->validated();
        
        $current_image = $paymentGateway->image;
        // get request input array without [image , tags]
        $data = $request->except('image');

        // add 'image' to the input array $data
        $data['image'] = $this->ProcessImage($request, 'image', 'payment_gateways',$current_image);

        $paymentGateway->update($data);

        return redirect()->route('admin.paymentGateways.index')->with('toast_success','Payment Gateway Updated Successfully');
        
    }

    public function delete($id){
        
    }
}