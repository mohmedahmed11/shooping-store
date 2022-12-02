@extends('layouts.master')
@section('content')
<section id="multiple-column-form">
    <body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
     data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <div class="row match-height">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$product->name}} | صور المنتج</h4>
                </div>

                {!! Toastr::message() !!}

                <div class="card-content">
                    <div class="card-body">


                            <div class="row match-height">
                                @isset($images)
                                @foreach($images as $index=>$image)

                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">

                                                <img class="card-img img-fluid mb-1" src="{{ ''.$image->image_path }}" alt="Card image cap">

                                                <div class="card-btns d-flex justify-content-between">
                                                    <a href="{{  route('products.image.delete',$image->id) }}" class="btn gradient-light-danger white">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @endisset
                            </div>

                            {{-- ////////////////////////////////////////// --}}

                    </div>
                </div>
            </div>
                    </div>

                        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">اختر الصوره <i class="fa fa-image" aria-hidden="true"></i></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <form action="{{ route('products.image.store' ,$product->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                            <div class="card" style="width: 18rem;">
                                                <img  id='output' class="img-thumbnail" src="{{ asset('/img/no_image.jpg') }}" style="height:150px; width:150px;">
                                                <div class="card-body">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" accept='image/*' name="image" onchange='openFile(event)'><br>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <div class="custom-file">
                                                            <div class="card-btns d-flex justify-content-between">
                                                                <button type="submit" class="btn gradient-light-info white">اضافه</button>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</section>



{{-- end content --}}


@endsection
<head>
    <title>Add New Products</title>
</head>
