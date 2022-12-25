<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Barangcontroller extends Controller
{
    function index ()
    {
        return view('page.barang');
    }
}
