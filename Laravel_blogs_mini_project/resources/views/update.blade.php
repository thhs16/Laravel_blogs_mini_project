@extends('master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">

                @if ( $blogDetails->image == null )
                    <img src="{{ asset('/uploads/thumb-1920-780508.jpg') }}" class=" img-thumbnail" style="max-height: 500px" alt="">
                @else
                    <img src="{{ asset('/uploads/'. $blogDetails->image ) }}" class=" img-thumbnail" style="max-height: 500px" alt="">
                @endif
            </div>

            <div class="col-8">

                <form action="">
                    <input type="text" name="" value="{{ $blogDetails->title }}" class=" form-control mb-2" >
                    <textarea name="" id="" cols="30" rows="10" class=" form-control mb-2"> {{ $blogDetails->description }}</textarea>
                    <div class="">
                        <!-- i don't know whether adding d-flex in the above div could change their display -->
                    <input type="number" name="" value="{{ $blogDetails->fee }}"  class=" form-control mb-2" id="">
                    <input type="text" name="" value="{{ $blogDetails->address }}"  class=" form-control mb-2" id="">
                    <select name="rating" id="" class=" form-control mb-2 @error('rating') is-invalid @enderror">
                        <option value="">Choose Rating...</option>
                        <option value="1" @if ( $blogDetails->rating == 1) selected @endif >1 stars</option>
                        <option value="2" @if ( $blogDetails->rating == 2) selected @endif >2 stars</option>
                        <option value="3" @if ( $blogDetails->rating == 3) selected @endif >3 stars</option>
                        <option value="4" @if ( $blogDetails->rating == 4) selected @endif >4 stars</option>
                        <option value="5" @if ( $blogDetails->rating == 5) selected @endif >5 stars</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">CREATE</button>
                </form>
                <button class="btn btn-dark mt-3 " onclick="history.back()"> GO BACK </button> {{-- JS method --}}

            </div>
        </div>
    </div>
@endsection
