<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTrait;
use App\Models\WebsiteParts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsitePartsController extends Controller
{
    use UploadImageTrait;
    public function __construct()
    {
        $this->authorizeResource(WebsiteParts::class,'websitePart');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $WebsiteParts = WebsiteParts::all();


        return view('backend.Admin_Dashboard.website_parts.index',compact('WebsiteParts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.Admin_Dashboard.website_parts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        $data = $request->except('image');
        
        if($request->file('image')){
            $data['image'] = $this->ProcessImage($request, 'image', 'website_part');
        }

        WebsiteParts::create($data);

        return redirect()->route('admin.websiteParts.index')->with('toast_success','Website Part Created Successfully');
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
        $websitePart= WebsiteParts::findOrFail($id);
        return view('backend.Admin_Dashboard.website_parts.edit', compact('websitePart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        
        $WebsitePart= WebsiteParts::findOrFail($id);


        $old_image = $WebsitePart->image;

        $data = $request->except('image');

        $new_image = $this->ProcessImage($request, 'image', 'website_part');

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $WebsitePart->update($data);

        // $WebsitePart->update($data);

        return redirect()->route('admin.websiteParts.index')->with('toast_success','Website Part Updated Successfully');

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