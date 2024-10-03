<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    // blogs list page
    public function index(){

        // getting db data [ recent blogs first order ]
        $data = Blog::when( request('searchKey'), function($query){

                $searchData = request('searchKey') ;
                $query->whereAny( ['title' , 'description'] , 'like', '%'.$searchData.'%' );
        })
                ->orderBy('created_at','desc')
                ->paginate(3);

        return view('index', compact('data') );
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

    // delete blog
    public function delete($id){

        $imageName = Blog::where('id', $id) ->first('image');
        $imageName = $imageName['image'];

        // dd($imageName);

        // dd( file_exists( public_path('uploads/' . $imageName ) ));

        if( $imageName != null  ){
            unlink( public_path('uploads/' . $imageName ) );
        }

        Blog::findOrFail($id)->delete();
        Alert::success('Deletion Success', 'Your blog has been deleted.'); // this is only displayed when user get to index.blad
        return back();
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
