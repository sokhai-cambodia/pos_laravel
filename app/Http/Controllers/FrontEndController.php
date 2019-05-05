<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('front-end.pos');
    }

    public function room()
    {
        return view('front-end.room');
    }

}