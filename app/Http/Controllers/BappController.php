<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BappController extends Controller
{
    public function index()
    {
        return view('bapp');
    }
}
