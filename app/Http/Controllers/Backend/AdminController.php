<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Admin::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        $admins = Admin::all();
        return view('backend.pages.admins.index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.admins.create',[
            'roles'=>Role::all(),
            'admin'=> new Admin()
        ]);
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
            'name'=>'required',
            'role'=>'required|array'
        ]);
        $admin = Admin::create($request->all());
        $admin->roles()->attach($request->roles);

        return redirect()->route('backend.admins.index');
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
    public function edit(Admin $admin)
    {
        //
        $roles = Role::all();
        $admin_roles = $admin->roles()->pluck('id')->toArray();
        // foreach($roles as $role){
        //     dd($role->id,$admin_roles);
        // }
        // dd($admin_roles);

        return view('backend.pages.admins.edit',compact('admin','roles','admin_roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'roles'=>'required|array'
        ]);
        $admin->update($request->all());

        $admin->roles()->sync($request->roles);

        return redirect()->route('backend.admins.index');

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
