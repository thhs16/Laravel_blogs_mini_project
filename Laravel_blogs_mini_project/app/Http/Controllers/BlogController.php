<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    // blogs list page
    public function index(){
        
        return view('index');
    }

    // create blogs post
    public function create(Request $request){
        // try {

            // check validation
            $this->checkBlogsValidation($request); // Validate the request

            // take data from $request
            $data = $this->requestBlogData($request); // simplified data than $request->all()

            // Testing
            // dd($request->hasFile('image'));
            // dd($request->file());

            // checking img presense in form data
            if( $request->hasFile('image') ){
                $userImgName = uniqid() . $request->file('image')->getClientOriginalName() ;
                $request->file('image')->move( public_path() . '/uploads' , $userImgName );
                $data['image'] = $userImgName;
            } else {
                dd('Image is empty.');
            }

            // adding data to db
            Blog::create($data);

            // Success Message SweetAlert
            toast('Your Blog Data has been created...', 'success');

            return back();


        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     // Handle validation errors
        //     dd($e->errors()); // Dump the validation errors to debug.
        // }
    }

    // check blogs validation
    private function checkBlogsValidation($request){
        return $validator = $request->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'fee' => 'required',
            'address' => 'required' ,
            'rating' => 'required' ,
            'image.*' => 'mimes:png,jpg,jpeg'
        ]);
    }

    // Request blog data
    private function requestBlogData($formData){
        return [
            'title' => $formData->title , // title in $fromData indicates the value of the name attribute of the form
            'description' => $formData->description ,
            'fee' => $formData->fee ,
            'address' => $formData->address ,
            'rating' => $formData->rating ,
            'image' => null
        ];

        $data = [];
    }
}
