<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return view('jabatan', ['showInfobox' => false]); // pastikan Anda memiliki file view dashboard.blade.php
    }
}
