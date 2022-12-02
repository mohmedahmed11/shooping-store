@extends('layouts.master')
@section('content')
<section id="multiple-column-form" id="place-order" class="list-view product-checkout">
    <body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
     data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


    <div class="row match-height">
        <div class="col-8">
            <div class="card" style="height: 420.283px;">
                <div class="card-header">
                    <h4 class="card-title">إضافة منتج جديد</h4>
                </div>
                {!! Toastr::message() !!}
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>اسم المنتج </span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" required id="first-name" class="form-control" name="name" placeholder="اسم المنتج">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>الكمية </span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" required id="number-id-column" class="form-control" name="quantity" placeholder="الكمية">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>السعر </span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" required id="contact-info-vertical" class="form-control" name="price" placeholder="السعر">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label id="checkout-number-error">الكود </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" required id="first-name" class="form-control" name="code" placeholder="الكود">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">

                                                <span for="location1">القسم</span>
                                            </div>
                                            <div class="col-md-8">

                                                <select class="form-control"  name="category_id" id="select" required="">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}" >
                                                        {{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span for="location1">العلامة التجارية</span>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-control"  name="trademark_id" id="select" required="">
                                                    @foreach($trademarks as $trademark)
                                                    <option value="{{$trademark->id}}" >
                                                        {{$trademark->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span for="location1">مورد المنتج</span>
                                            </div>
                                            <div class="col-md-2" style="margin: auto;">
                                                <span> <input type="checkbox" onclick="Enableddl(this)" id="check" name="status"/> يوجد مورد </span>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control"  name="supplier_id" id="selectProduct" disabled='disabled'>
                                                    <option value="" selected disabled>-- اختر المورد --</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">
                                                        {{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
<!-- 
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-label-group">
                                                <div class="form-group">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" onclick="Enableddl(this)" id="check" name="status"/>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">يوجد مورد</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="controls">
                                                <select class="form-control"  name="supplier_id" id="selectProduct" disabled='disabled'>
                                                    <option value="" selected disabled>-- اختر المورد --</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">
                                                        {{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label id="checkout-number-error">التفاصيل </label>
                                            </div>
                                            <div class="col-md-8">
                                                <fieldset class="form-label-group mb-0">
                                                    <textarea data-length="200" required name="details" class="form-control char-textarea active" id="textarea-counter" rows="3" placeholder="التفاصيل" style="color: rgb(78, 81, 84);"></textarea>
                                                    <label for="textarea-counter">التفاصيل</label>
                                                </fieldset>
                                                <small class="counter-value float-right" style="background-color: rgb(115, 103, 240);"><span class="char-count">0</span> / 100 </small>
                                                        
                                            </div>
                                        </div>
                                    </div>
<!-- 
                                    <div class="col-12">
                                    <div class="form-group row">
                                            <div class="col-md-4">

                                                <span for="location1">التفاصيل</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <p class="mb-2">
                                                        <div class="col-12">
                                                            <fieldset class="form-label-group mb-0">
                                                                <textarea data-length="200" required name="details" class="form-control char-textarea active" id="textarea-counter" rows="3" placeholder="Counter" style="color: rgb(78, 81, 84);"></textarea>
                                                                <label for="textarea-counter">التفاصيل</label>
                                                            </fieldset>
                                                            <small class="counter-value float-right" style="background-color: rgb(115, 103, 240);"><span class="char-count">0</span> / 100 </small>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                        <div class="add-data-btn">
                                            <input type="hidden" name="Save" value="Save">
                                            <button class="btn mr-4 btn-primary">إضافة المنتج</button>
                                        </div>
                                        <div class="cancel-data-btn">
                                            <button type="reset" name="reset" class="btn btn-outline-danger">إلغاء</button>
                                        </div>
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
                        <h3 class="card-title"><i class="fa fa-image" aria-hidden="true"></i>اضافة صورة</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">


                            <div class="col-md-6 col-12">

                                <fieldset class="form-group">
                                    <div class="card" style="width: 18rem;">
                                        <img  id='output' class="img-thumbnail" src="{{url('/img/no_image.jpg')}}" style="height:150px; width:150px;">
                                        <div class="card-body">
                                         <fieldset class="form-group">
                                                <span for="basicInputFile">Image</span>
                                        <div class="custom-file">
                                            <input type="file" accept='image/*' name="image" onchange='openFile(event)'><br>
                                         </div>
                                     </fieldset>
                                     
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
