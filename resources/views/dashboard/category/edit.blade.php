@extends('layouts.master')

@section('content')


    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">الاقسام الرئيسية</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    {!! Toastr::message() !!}
                </div>
            </div>
        </div>
        <div class="content-body">

        {{-- //////////////////////////////////////////////////////////////////////////////// --}}

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">تعديل - {{ $categories->name }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- Begin Form --}}
                        <form action="{{ route('category.update', $categories->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $categories -> id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">الاسم</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $categories->name }}" name="name">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-list"></i>
                                                    </div>
                                                </div>
                                                @error("name")
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">صورة</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="file" name="image" class="form-control image" value="{{ $categories->image }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-image"></i>
                                                    </div>
                                                </div>
                                                @error("image")
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <img src="{{ $categories->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-update"></i>تحديث</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

        </div>
    </div>




@endsection
