<?php

namespace App\Http\Controllers\Backend\Admin;

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
        return view('backend.Admin_Dashboard.admins.index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        // $admin_roles = $admin->roles()->pluck('id')->toArray();
        return view('backend.Admin_Dashboard.admins.create',[
            'roles'=>$roles,
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
            'role'=>'nullable|array'
        ]);

        $admin = Admin::create($request->all());

        if($request->roles){
            $admin->roles()->attach($request->roles);
        }
        

        return redirect()->route('admin.admins.index');
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

        return view('backend.Admin_Dashboard.admins.edit',compact('admin','roles','admin_roles'));

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
        $request->validate([
            'name'=>'required',
            'roles'=>'nullable|array'
        ]);
        // dd($request->all());

        $data = $request->all();

        $data['password'] = $request->password ? $request->password : $admin->password; 

        $admin->update($data);
        if($request->roles){
            $admin->roles()->sync($request->roles);
        }
        

        return redirect()->route('admin.admins.index');

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
