<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // hal dashboard
    public function index()
    {
    	return view('dashboard.index');
    }
}
