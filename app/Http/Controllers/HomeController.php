<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Memastikan pengguna login sebelum akses dashboard
    }

    public function index()
    {
        return view('index');
    }

    public function home()
    {   
        return view('dashboard.home');
    }
}
