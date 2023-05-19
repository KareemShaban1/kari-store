<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreBrandRequest;
use App\Http\Requests\Backend\UpdateBrandRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Brand;
use Illuminate\Http\Request;
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

        return view('backend.pages.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.pages.brands.create');
    }


    public function store(StoreBrandRequest $request)
    {
        $request->validated();
        // dd($request->all());

        $data = $request->except('image');
        
        if($request->file('image')){
            $data['image'] = $this->uploadImage($request, 'image', 'brands');
        }

        Brand::create($data);

        return redirect()->route('backend.brands.index');
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.pages.brands.edit', compact('brand'));
    }
    public function update(UpdateBrandRequest $request, $id)
    {
        $request->validated();

        $brand = Brand::findOrFail($id);

        $old_image = $brand->image;

        $data = $request->except('image');

        $new_image = $this->uploadImage($request, 'image', 'brands');

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $brand->update($data);

        // isset => Determine if a variable is declared and is different than NULL
        if ($old_image && $new_image) {
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_image);
        }

        return redirect()->route('backend.brands.index');
    }
    public function destroy()
    {
    }
}
