<?php

namespace App\Http\Controllers;

class BlankPageController extends Controller
{
    public function index()
    {
        return view('layouts.blankPage');
    }
}
