<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}