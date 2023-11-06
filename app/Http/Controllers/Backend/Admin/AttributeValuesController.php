<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreAttributeValueRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValuesController extends Controller
{
    //
    public function index()
    {
 
        $attribute_values = AttributeValue::all();
        return view('backend.Admin_Dashboard.attribute_values.index', compact('attribute_values'));
    }

    public function create()
    {

        $attributes = Attribute::all();
        return view('backend.Admin_Dashboard.attribute_values.create', compact('attributes'));
    }
    public function store(StoreAttributeValueRequest $request)
    {
        $data = $request->all();
        
        AttributeValue::create($data);

        return redirect()->route('admin.attribute_values.index')->with('toast_success', 'Attribute Value Inserted Successfully');
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