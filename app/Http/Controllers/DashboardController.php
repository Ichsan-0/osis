<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['showInfobox' => true]); // pastikan Anda memiliki file view dashboard.blade.php
    }
}
