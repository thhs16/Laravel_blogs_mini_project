@extends('master');

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
                <h1>{{ $blogDetails->title }}</h1>
                <p class=" text-muted">{{ $blogDetails->description }}</p>
                <div class="">
                    <!-- i don't know whether adding d-flex in the above div could change their display -->
                <i class="fa-solid fa-money-bill text-primary mr-2"></i> {{ $blogDetails->fee }} mmk |
                <i class="fa-solid fa-location-dot text-danger mr-2"></i> {{ $blogDetails->address }} |
                <i class="fa-solid fa-star text-warning mr-2"></i> {{ $blogDetails->rating }}
                </div>

                {{-- <a href="{{ route('mainPage') }}"><button class="btn btn-dark mt-3">GO BACK</button></a> --}}
                <button class="btn btn-dark mt-3 " onclick="history.back()">GO BACK</button> {{-- JS method --}}
            </div>
        </div>
    </div>
@endsection
