@extends('master')

@section('content')

    <div class="container mt-5">

        <form action="{{ route('blogUpdate') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-4">

                        @if ( $blogDetails->image == null )
                            <img src="{{ asset('/uploads/thumb-1920-780508.jpg') }}" class=" img-thumbnail" style="max-height: 500px" alt="">
                        @else
                            <div id="blogImgSpace">
                                <img src="{{ asset('/uploads/'. $blogDetails->image ) }}" class=" img-thumbnail w-100" alt="">
                            </div>
                        @endif

                        <input type="file" name="image" class="form-control mb-2 @error('image') is-invalid @enderror" onchange="loadFile(event)">
                        @error('image')
                                <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>



                    <div class="col-8">

                            <input type="text" name="title" value="{{ old('title', $blogDetails->title) }}" class=" form-control mb-2 @error('title') is-invalid @enderror">
                            @error('title')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                            <textarea name="description" id="" cols="30" rows="10" class=" form-control mb-2 @error('description') is-invalid @enderror"> {{ old('description', $blogDetails->description) }}</textarea>
                            @error('description')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                                <!-- i don't know whether adding d-flex in the above div could change their display -->
                            <input type="number" name="fee" value="{{ old('fee', $blogDetails->fee) }}"  class=" form-control mb-2 @error('fee') is-invalid @enderror ">
                            @error('fee')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                            <input type="text" name="address" value="{{ old('address', $blogDetails->address) }}"  class=" form-control mb-2 @error('address') is-invalid @enderror">
                            @error('address')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                            <select name="rating" id="" class=" form-control mb-2 @error('rating') is-invalid @enderror">
                                <option value="">Choose Rating...</option>
                                <option value="1" @if ( $blogDetails->rating == 1) selected @endif >1 stars</option>
                                <option value="2" @if ( $blogDetails->rating == 2) selected @endif >2 stars</option>
                                <option value="3" @if ( $blogDetails->rating == 3) selected @endif >3 stars</option>
                                <option value="4" @if ( $blogDetails->rating == 4) selected @endif >4 stars</option>
                                <option value="5" @if ( $blogDetails->rating == 5) selected @endif >5 stars</option>
                            </select>
                            @error('rating')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-danger mt-3">CREATE</button>

                        <button class="btn btn-dark mt-3 " onclick="history.back()"> GO BACK </button> {{-- JS method --}}
                    </div>
                </div>
            </form>
    </div>
@endsection
