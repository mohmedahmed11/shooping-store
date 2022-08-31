@extends('layouts.master')
@section('content')
<section id="multiple-column-form">
    <body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
     data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    
    <div class="row match-height">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new Product</h4>
                </div>
                {!! Toastr::message() !!}
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <label for="first-name-column">اسم المنج</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="الاسم الاول" name="name">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="country-floating" class="form-control" name="quantity" placeholder="الكمية">
                                            <label for="country-floating">الكمية</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="number" id="number-id-column" class="form-control" name="price" placeholder="السعر">
                                            <label for="number-id-column">السعر</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="number-id-column" class="form-control" name="code" placeholder="الكود">
                                            <label for="number-id-column">الكود</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        القسم
                                        <div class="controls">
                                            <select class="form-control"  name="category_id" id="select" required="">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" >
                                                    {{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            </div> 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="mb-2">
                                        <div class="row">
                                            
                                            <div class="col-12">
                                                Details
                                                <fieldset class="form-label-group">
                                                    <textarea class="form-control" id="label-textarea" rows="3" name="details" placeholder="Label in Textarea"></textarea>
                                                    <label for="label-textarea">Label in Textarea</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary mr-1 mb-1" value="Save" name="Save">
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div> 
                           
                    </div>
                </div>
            </div>      
                    </div>
    
                        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Image <i class="fa fa-image" aria-hidden="true"></i>add Image</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{-- <div class="col-sm-12 data-field-col data-list-upload">
                                <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                    <div class="dz-message">Upload Image</div>
                                </form>
                            </div> --}}

                        <!-- <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <fieldset class="form-group">
                                    <label for="first-name-icon">صورة</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="file" name="image" class="form-control image">
                                        <div class="form-control-position">
                                            <i class="feather icon-image"></i>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <img src="{{ asset('icons/defalut.jpeg') }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                            </div>
                        </div> -->


                            
                            <div class="col-md-12 col-12">
                                        
                                <fieldset class="form-group">
                                    <div class="card" style="width: 18rem;">
                                                                           
                                        <div class="card-body">                                                                             
                                            <fieldset class="form-group">
                                            <label for="first-name-icon">صورة</label>
                                                <div class="position-relative">
                                                <input type="file" name="image" class="form-control image">
                                            </div>
                                            </fieldset>
                                            <div class="form-group">
                                                <img src="{{ asset('icons/defalut.jpeg') }}" style="width: 100px" id='output' class="img-thumbnail image-preview" alt="">
                                            </div>
                                        </div>
                                      </div>
                                </fieldset>

                            </div> 
                            
                        </div>
                    </div>
                </div>      
            </div>
         
        </div>
    </form> 
    </div>
   
    
</section>



{{-- end content --}}


@endsection
<head>
    <title>Add New Products</title>
</head>
