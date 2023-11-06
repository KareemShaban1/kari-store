<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreDeliveryRequest;
use App\Http\Requests\Backend\UpdateDeliveryRequest;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Delivery::class,'delivery');
    }
    
    public function index()
    {
        $deliveries = Delivery::all();
        return view('backend.Admin_Dashboard.delivery.index', compact('deliveries'));

    }

    public function create()
    {
        $categories = Category::all();
        $vendors = Vendor::all();
        return view('backend.Admin_Dashboard.delivery.create', compact('categories','vendors'));
    }

    public function store(StoreDeliveryRequest $request)
    {
        
       // Validate the request data
        $validatedData = $request->validated();

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // dd($validatedData);
        
        // Create the delivery using the validated data
        Delivery::create($validatedData);

        return redirect()->route('admin.deliveries.index')->with('toast_success','Delivery Created Successfully');

    }

    public function edit($id)
    {
        $categories = Category::all();
        $delivery = Delivery::findOrFail($id);
        $vendors = Vendor::all();
        return view('backend.Admin_Dashboard.delivery.edit', compact('delivery', 'categories','vendors'));

    }
    public function update(UpdateDeliveryRequest $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $validatedData = $request->validated();
        $validatedData['password'] = $request->password ? Hash::make($validatedData['password']) : $delivery->password ;
        $delivery->update($validatedData);
        return redirect()->route('admin.deliveries.index')->with('toast_success','Delivery Updated Successfully');
    }

    public function delete($id){
        
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();
        
        return redirect()->route('admin.deliveries.index')->with('toast_success','Delivery Deleted Successfully');
        
    }
}