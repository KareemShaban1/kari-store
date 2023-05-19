<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreStoreRequest;
use App\Http\Requests\Backend\UpdateStoreRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoresController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::all();
        return view('backend.pages.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {

        $request->validated();

        // merge slug to the request 
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        // get all request input except the image input
        $data = $request->except('logo_image', 'cover_image');

        // assign image to the request
        $data['logo_image'] = $this->uploadImage($request, 'logo_image', 'stores');
        $data['cover_image'] = $this->uploadImage($request, 'cover_image', 'stores');


        // store the request
        $store = Store::create($data);

        // PRG 
        return redirect()->route('backend.stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $store = Store::findOrFail($id);

        return view('backend.pages.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, $id)
    {
        $request->validated();


        // get store by id
        $store = Store::findOrFail($id);

        // get old logo_image and old cover_image
        $old_logo_image = $store->logo_image;
        $old_cover_image = $store->cover_image;

        // merge slug to the request 
        $request->merge(['slug' => Str::slug($request->post('name'))]);

        // get all request input except the image input
        $data = $request->except('logo_image', 'cover_image');

        // assign image to the request
        $new_logo_image = $this->uploadImage($request, 'logo_image', 'stores');
        $new_cover_image = $this->uploadImage($request, 'cover_image', 'stores');

        if ($new_logo_image) {
            $data['logo_image'] = $new_logo_image;
        }

        if ($new_cover_image) {
            $data['cover_image'] = $new_cover_image;
        }


        // store the request
        $store->update($data);

        // isset => Determine if a variable is declared and is different than NULL
        if ($old_logo_image && $new_logo_image) {
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_logo_image);
        }

        if ($old_cover_image && $new_cover_image) {
            // Storage::disk('disk_name')->delete('image_path');
            Storage::disk('uploads')->delete($old_cover_image);
        }

        // PRG 
        return redirect()->route('backend.stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    //  // custom function to upload images
    //  protected function uploadImage(Request $request , $file_name){
    //     // check if input of type 'file' with name 'image' is exist or not
    //     if(!$request->hasFile($file_name)){
    //         return;
    //     }
    //         $file = $request->file($file_name); // UploadedFile Object
    //         // $file->store('folder_name','disk_name'[default=>'local'] );
    //         $path = $file->store('stores',[
    //             'disk'=>'uploads'
    //         ]);
    //         return  $path;

    // }
}
