<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreBannerRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
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
        $banners = Banner::all();

        return view('backend.Admin_Dashboard.banners.index',compact('banners'));

        //  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.Admin_Dashboard.banners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        //
        $request->validated();
        
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'banners');

        Banner::create($data);

        return redirect()->route('admin.banners.index');
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
        $banner = Banner::findOrFail($id);
        return view('backend.Admin_Dashboard.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBannerRequest $request, $id)
    {
        //


        // $request->validated();

        $banner = Banner::findOrFail($id);
        
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'banners');

        $banner->update($data);

        return redirect()->route('admin.banners.index');

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
}
