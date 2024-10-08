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

            // check validation
            $this->checkBlogsValidation($request); // Validate the request

            // take data from $request
            $data = $this->requestBlogData($request); // simplified data than $request->all()

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

    // Blog's details
    public function details($id){
        $blogDetails = Blog::where('id',$id)->first();
        // I dunno why findOrFail() or find() is not working here although it works in above methods.

        // dd($blogDetails->toArray());
        return view('page_details', compact('blogDetails'));
    }

    // Blog's edit page
    public function edit($id){

        // getting blogs' data to show the existed db data first
        $blogDetails = Blog::where('id',$id)->first();
        return view('update', compact('blogDetails'));
    }

    // Update page
    public function update(Request $request){

        dd($request->toArray());
        // dd($id);

        // dd($request->toArray()); // array
        $this->checkBlogsValidation($request);

        // checking img presense in form data
        if( $request->hasFile('image') ){
            $userImgName = uniqid() . $request->file('image')->getClientOriginalName() ;
            $request->file('image')->move( public_path() . '/uploads' , $userImgName );
            $data['image'] = $userImgName;
        } else {
            dd('Image is empty.');
        }

    }

    // check blogs validation
    private function checkBlogsValidation($request){

        return $validator = $request->validate([
            'title' => 'required|unique:blogs,title' , // to not let two same data in the "title" table field of "blogs" table
            'description' => 'required' ,
            'fee' => 'required' ,
            'address' => 'required' ,
            'rating' => 'required' ,
            'image' => 'mimes:png,jpg,jpeg | file'
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
