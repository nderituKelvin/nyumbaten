<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller{
    public function adminDashRoute(){
        return view('admin.adminLayout');
    }

    public function alphaDashRoute(){
        return view('superAdmin.superAdminLayout');
    }

    public function memberDashRoute(){
        return view('member.memberLayout');
    }



}
