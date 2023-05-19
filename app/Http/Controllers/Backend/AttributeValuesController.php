<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValuesController extends Controller
{
    //

    public function index()
    {
        $attribute_values = AttributeValue::all();

        return view('backend.pages.attribute_values.index', compact('attribute_values'));
    }

    public function create()
    {
        $attributes = Attribute::all();
        return view('backend.pages.attribute_values.create',compact('attributes'));
    }


    public function store(Request $request)
    {
        // $request->validate();

        $data = $request->all();

        AttributeValue::create($data);

        return redirect()->route('backend.attribute_values.index');
    }


    public function edit($id)
    {
        $attribute_value = AttributeValue::findOrFail($id);
        $attributes = Attribute::all();
        // dd($attribute_value);
        return view('backend.pages.attribute_values.edit', compact('attribute_value','attributes'));
    }
    public function update(Request $request, $id)
    {
        // $request->validated();

        $attribute_value = AttributeValue::findOrFail($id);
        
        $data = $request->all();

        $attribute_value->update($data);

        return redirect()->route('backend.attribute_values.index');
    }
    public function destroy()
    {
    }
}
