<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreBrandRequest;
use App\Http\Requests\Backend\UpdateBrandRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    use UploadImageTrait;
    //


    public function __construct()
    {
        $this->authorizeResource(Brand::class);
    }

    public function index()
    {
        $brands = Brand::all();

        return view('backend.Admin_Dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.Admin_Dashboard.brands.create');
    }


    public function store(StoreBrandRequest $request)
    {
        $request->validated();

        $data = $request->except('image');

        if($request->file('image')) {
            $data['image'] = $this->ProcessImage($request, 'image', 'brands');
        }

        Brand::create($data);

        return redirect()->route('admin.brands.index');
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.Admin_Dashboard.brands.edit', compact('brand'));
    }
    public function update(UpdateBrandRequest $request, $id)
    {
        $request->validated();

        $brand = Brand::findOrFail($id);

        $current_image = $brand->image;

        $data = $request->except('image');

        $new_image = $this->ProcessImage($request, 'image', 'brands', $current_image);

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $brand->update($data);


        return redirect()->route('admin.brands.index');
    }
    public function destroy()
    {
    }
}
