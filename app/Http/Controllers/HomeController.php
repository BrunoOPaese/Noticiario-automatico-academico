<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('/');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
}
