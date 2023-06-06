<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttributeValuesController extends Controller
{
    //
    public function index()
    {

        $attribute_values = AttributeValue::all();
        return view('backend.Vendor_Dashboard.attribute_values.index', compact('attribute_values'));
    }

    public function create()
    {

        $attributes = Attribute::all();
        return view('backend.Vendor_Dashboard.attribute_values.create', compact('attributes'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user('vendor')->id;
        AttributeValue::create($data);

        return redirect()->route('vendor.attribute_values.index')->with('success', 'Attribute Value Inserted Successfully');
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
