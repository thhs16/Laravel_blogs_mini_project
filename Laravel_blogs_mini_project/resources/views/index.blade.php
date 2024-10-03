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
            <div class="row">
                <div class="col-2">
                    <h1>BLOGGY</h1>
                </div>

                <div class="col offset-6 mb-3">

                    <form action="{{ route('mainPage') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="searchKey" class="form-control" value="{{ request('searchKey') }}" placeholder="SEARCH..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="submit">ENTER</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            @foreach ($data as $item)
                <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="">{{ $item->title }}</div>
                        <div class="">{{ $item->created_at->format('j-F-Y') }}</div>
                    </div>

                    <div class=" text-muted my-2">
                        {{ Str::words($item->description, 20, '...') }}
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="">
                            <!-- i don't know whether adding d-flex in the above div could change their display -->
                        <i class="fa-solid fa-money-bill text-primary mr-2"></i> {{ $item->fee }} mmk |
                        <i class="fa-solid fa-location-dot text-danger mr-2"></i> {{ $item->address }} |
                        <i class="fa-solid fa-star text-warning mr-2"></i> {{ $item->rating }}
                        </div>

                        <div class=" text-center">
                            <a href="{{ route('blogDetails' , $item->id ) }}"><button class="btn btn-primary">SEE MORE</button></a>
                            <a href="{{ route('blogEdit' , $item->id ) }}"><button class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            {{-- <a href="{{ route('blogEdit' , $item->id ) }}"><button class="btn btn-secondary">details</button></a> --}}
                            <a href="{{ url('/blogs/delete/'.$item->id) }}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

            <div class="d-flex justify-content-end">
                {{ $data->links() }}
            </div>
        </div>
        <!-- End of the Blogs' display -->
    </div>
</div>
@endsection
