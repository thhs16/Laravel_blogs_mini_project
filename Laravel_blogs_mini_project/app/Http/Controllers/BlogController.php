<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // blogs list page
    public function index(){
        return view('index');
    }

    // create blogs post
    public function create(Request $request){
        // dd($request->all());
        $this->checkBlogsValidation($request);

        dd('well done');
        dd($request->all());
    }

    // check blogs validation
    private function checkBlogsValidation($request){
        return $validator = $request->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'fee' => 'required',
            'address' => 'required' ,
            'rating' => 'required' ,
            'image' => 'mimes:png,jpg,jpeg'
        ]);
    }
}
