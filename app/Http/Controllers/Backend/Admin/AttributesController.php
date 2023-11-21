<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreAttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    //
    public function index()
    {
        $attributes = Attribute::all();

        return view('backend.dashboards.admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('backend.dashboards.admin.attributes.create');
    }

    public function show(Attribute $attribute)
    {
        return view('backend.dashboards.admin.attributes.show',compact('attribute'));
    }
 

    public function store(Request $request)
    {
        $data =  $request->validate([
                'name' => 'required|string|max:255',
                'vendor_id' => 'nullable|exists:vendors,id',
                // Add more validation rules as needed
        ]);


        Attribute::create($data);

        return redirect()->route('admin.attributes.index')->with('toast_success','Attribute Created Successfully');;
    }


    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('backend.dashboards.admin.attributes.edit', compact('attribute'));
    }
    public function update(Request $request, $id)
    {
        // $request->validated();
        $data =  $request->validate([
            'name' => 'required|string|max:255',
            'vendor_id' => 'nullable|exists:vendors,id',
            // Add more validation rules as needed
        ]);

        $attribute = Attribute::findOrFail($id);

        $attribute->update($data);


        return redirect()->route('admin.attributes.index')->with('toast_success','Attribute Updated Successfully');;
    }
    public function destroy()
    {
    }
}