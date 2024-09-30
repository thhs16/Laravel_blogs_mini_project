@extends('master')

@section('content')
<div class="container m-5">
    <div class="row">
        <!-- Start of the Form -->
        <div class="col-4">
            <form action="{{ route('blogCreate') }}" id="blogForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div id="blogImgSpace"></div>

                <input type="file" name="image" class="form-control mb-2 @error('image') is-invalid @enderror" onchange="loadFile(event)">
                @error('image')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror

                <input type="text" name="title" class="form-control mb-2 @error('title') is-invalid @enderror" value="{{ old('title')}}" placeholder="Enter Blogs Title...">
                @error('title')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror

                <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Enter blogs description...">{{ old('description')}}</textarea>
                @error('description')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror

                <input type="number" name="fee" class="form-control mb-2 @error('fee') is-invalid @enderror" value="{{ old('fee')}}" placeholder="Enter Blog Fee...">
                @error('fee')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror

                <input type="text" name="address" class="form-control mb-2 @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter Blog Address...">
                @error('address')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror

                <select name="rating" id="" class=" form-control mb-2 @error('rating') is-invalid @enderror">
                    <option value="">Choose Rating...</option>
                    <option value="1" @if ( old('rating') == 1) selected @endif >1 stars</option>
                    <option value="2" @if ( old('rating') == 2) selected @endif >2 stars</option>
                    <option value="3" @if ( old('rating') == 3) selected @endif >3 stars</option>
                    <option value="4" @if ( old('rating') == 4) selected @endif >4 stars</option>
                    <option value="5" @if ( old('rating') == 5) selected @endif >5 stars</option>
                </select>
                @error('rating')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="submit" value="Create" class="btn btn-danger">
            </form>
        </div>
        <!-- End of the Form -->

        <!-- Start of the Blogs' display -->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="">This is title</div>
                        <div class="">5/4/2024</div>
                    </div>

                    <div class=" text-muted my-2">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat eaque natus aperiam, autem perspiciatis temporibus vel ab aliquid aliquam, expedita impedit minima. Nostrum, distinctio alias eius quia quasi aliquam libero ipsa exercitationem quidem magnam minus. Totam eaque cupiditate repudiandae quo libero fugit ea tenetur, esse porro magni vel. Provident, impedit.
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="">
                            <!-- i don't know whether adding d-flex in the above div could change their display -->
                        <i class="fa-solid fa-money-bill text-primary mr-2"></i> 10000 mmk |
                        <i class="fa-solid fa-location-dot text-danger mr-2"></i> Yangon |
                        <i class="fa-solid fa-star text-warning mr-2"></i> 5
                        </div>

                        <div class=" text-center">
                            <button class="btn btn-primary">SEE MORE</button>
                            <button class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of the Blogs' display -->
    </div>
</div>
@endsection
