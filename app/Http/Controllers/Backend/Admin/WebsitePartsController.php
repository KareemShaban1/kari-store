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
     */
    public function index(Request $request)
{
    if ($request->ajax()) {
        $websiteParts = WebsiteParts::select(['id', 'key', 'value', 'image']);

        return datatables()->of($websiteParts)
            ->addColumn('value', function ($row) {
                return $row->value == 0 ?
                    '<span class="text-danger">' . trans('websiteParts_trans.Hide') . '</span>' :
                    '<span class="text-success">' . trans('websiteParts_trans.Show') . '</span>';
            })
            ->addColumn('image', function ($row) {
                $imageUrl = $row->image_url;
                return '<img src="' . $imageUrl . '" height="50" width="50" alt="Image">';
            })
            ->addColumn('control', function ($row) {
                $editUrl = route('admin.websiteParts.edit', $row->id);
                $deleteUrl = route('admin.websiteParts.destroy', $row->id);

                return '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>';
            })
            ->rawColumns(['value', 'image', 'control'])
            ->make(true);
    }

    return view('backend.dashboards.admin.website_parts.index');
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.dashboards.admin.website_parts.create');
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
        return view('backend.dashboards.admin.website_parts.edit', compact('websitePart'));
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
