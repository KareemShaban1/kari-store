<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreVendorRequest;
use App\Http\Requests\Backend\UpdateVendorRequest;
use App\Models\Store;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Vendor::class,'vendor');
    }
    
    public function index()
    {
        $vendors = Vendor::all();
        return view('backend.Admin_Dashboard.vendors.index', compact('vendors'));
    }
    public function create()
    {
        $stores= Store::all();
        return view('backend.Admin_Dashboard.vendors.create',compact('stores'));
    }
    public function store(StoreVendorRequest $request )
    {
                
                $request->validated();

                $data = $request->except('password');
                $data['password'] = Hash::make($request->password); 
                Vendor::create($data);
                return redirect()->route('admin.vendors.index')->with('toast_success','Vendor Created Successfully');
    }
    public function show()
    {
    }
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $stores= Store::all();
        return view('backend.Admin_Dashboard.vendors.edit', compact('vendor', 'stores'));

    }
    public function update($id , UpdateVendorRequest $request)
    {
            $request->validated();
            $data = $request->except('password');
            $data['password'] = Hash::make($request->password); 
            $vendor = Vendor::findOrFail($id);
            $vendor->update($data);
            return redirect()->route('admin.vendors.index')->with('toast_success','Vendor Updated Successfully');

    }
    public function destroy()
    {
    }


    public function updateVendorStatus(Request $request, $id){
        $vendor = Vendor::findOrFail($id);
        $vendor->update([
            'active' => $request->input('active'),
        ]);

        // You can add a success message here if needed.

        return redirect()->route('admin.vendors.index');
    }
}