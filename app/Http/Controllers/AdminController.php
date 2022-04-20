<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard() {
        return view('Admin.dashboard');
    }

    public function commandes(){
        return view('admin.commandes');
    }
}
