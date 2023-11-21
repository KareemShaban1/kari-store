<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreStoreRequest;
use App\Http\Requests\Backend\UpdateStoreRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoresController extends Controller
{
    use UploadImageTrait;

    public function __construct()
    {
        $this->authorizeResource(Store::class,'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::withCount([
            'products' => function ($query) {
                $query->where('status', '=', 'active');
            }
        ])->get();
        return view('backend.dashboards.admin.stores.index', compact('stores'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $destinations = Destination::all();
        $categories = Category::all();
        return view('backend.dashboards.admin.stores.create', compact('categories', 'destinations'));
    }

    public function getCities(Request $request)
    {
        // dd($request->governorate_id);

        $governorateId = $request->governorate_id;
        $cities = Destination::where('parent_id',$governorateId)->get();

        return response()->json(['cities' => $cities]);
    }

    public function getNeighborhoods(Request $request)
    {
        // dd($request->governorate_id);

        $cityId = $request->city_id;
        $neighborhoods = Destination::where('parent_id',$cityId)->get();

        return response()->json(['neighborhoods' => $neighborhoods]);
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
        // processImage ($request , file_name , folder_name)
        $data['logo_image'] = $this->ProcessImage($request, 'logo_image', 'stores');
        $data['cover_image'] = $this->ProcessImage($request, 'cover_image', 'stores');
        
        
        // store the request
        $store = Store::create($data);


        $store->categories()->sync($request->categories_id);

        return redirect()->route('admin.stores.index')->with('toast_success','Store Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
        return view('backend.dashboards.admin.stores.show', compact('store'));
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
        $destinations = Destination::all();
        $categories = Category::all();
        return view('backend.dashboards.admin.stores.edit', 
        compact('store', 'categories','destinations'));
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
        $new_logo_image = $this->ProcessImage($request, 'logo_image', 'stores',$old_logo_image);
        $new_cover_image = $this->ProcessImage($request, 'cover_image', 'stores',$old_cover_image);

        if ($new_logo_image) {
            $data['logo_image'] = $new_logo_image;
        }

        if ($new_cover_image) {
            $data['cover_image'] = $new_cover_image;
        }

        
        $store->update($data);


        $store->categories()->sync($request->categories_id);

        // PRG
        return redirect()->route('admin.stores.index')->with('toast_success','Store Updated Successfully');
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


        public function updateStoreFeatured(Request $request, $id)
    {
        $store = Store::findOrFail($id);
        $store->update([
            'featured' => $request->input('featured'),
        ]);

        // You can add a success message here if needed.

        return redirect()->route('admin.stores.index');
    }

    public function updateStoreStatus(Request $request, $id){
        $store = Store::findOrFail($id);
        $store->update([
            'status' => $request->input('status'),
        ]);

        // You can add a success message here if needed.

        return redirect()->route('admin.stores.index');
    }


}