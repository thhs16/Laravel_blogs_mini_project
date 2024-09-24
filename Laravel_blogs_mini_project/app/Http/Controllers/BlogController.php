<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // blogs list page
    public function index(){
        return view('index');
    }
}
