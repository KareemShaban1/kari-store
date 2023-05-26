<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->middleware(['auth'])->except('index');
        // $this->middleware(['auth'])->only('index');
    }

    public function index(){
        return view('backend.Admin_Dashboard.dashboard.index');
    }
}
