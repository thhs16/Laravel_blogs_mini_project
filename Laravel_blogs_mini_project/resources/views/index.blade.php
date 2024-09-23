@extends('master.blade');

@section('content')
<div class="container m-5">
    <div class="row">
        <!-- Start of the Form -->
        <div class="col-4">
            <form action="" method="post" enctype="multipart/formdata">

                <img src="" class="w-100" id="output" class="img-thumbnail">
                <input type="file" name="image" class="form-control mb-2" onchange="loadFile(event)">
                <input type="text" name="title" class="form-control mb-2" placeholder="Enter Blogs Title">
                <textarea name="description" class="form-control mb-2" cols="30" rows="10">Enter blogs description</textarea>
                <input type="number" name="number" class="form-control mb-2" placeholder="Enter Blog Fee...">
                <input type="text" name="address" class="form-control mb-2" placeholder="Enter Blog Address...">
                <select name="rating" id="" class=" form-control mb-2">
                    <option value="">Choose Rating...</option>
                    <option value="1">1 stars</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select>
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
                    <div class="d-flex">
                        <div class="">
                            <!-- i don't know whether adding d-flex in the above div could change their display -->
                        <i class="fa-solid fa-money-bill"></i>
                        <i class="fa-solid fa-location-dot"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of the Blogs' display -->
    </div>
</div>
@endsection
