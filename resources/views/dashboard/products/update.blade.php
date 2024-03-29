@extends('layouts.master')
@section('content')
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">تعديل المنتج </h4>
                                </div>
                                {!! Toastr::message() !!}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{url('/product/save_update/'.$data->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span for="first-name-column">اسم المنتج</span>
                                                            <input type="text" value="{{$data->name}}" id="first-name-column" class="form-control" placeholder="الاسم" name="name">
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span for="city-column">الكود</span>
                                                            <input type="text" value="{{$data->code}}" id="city-column" class="form-control" placeholder="code" name="code">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span for="country-floating">الكمية</span>
                                                            <input type="text" value="{{$data->quantity}}" id="country-floating" class="form-control" name="quantity" placeholder="الكمية">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span for="form-group">السعر</span>
                                                            <input type="number" value="{{$data->price}}" id="number-id-column" class="form-control" name="price" placeholder="السعر">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span>الخاصية</span>
                                                            <select class="form-control"  name="category_id" id="select" required="">
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{$category->id == $data->category_id  ? 'selected' : ''}}>
                                                                    {{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span for="form-group">تاريخ الاضافة</span>
                                                            <input type="text" value="{{$data->created_at}}" id="number-id-column" class="form-control"placeholder="Date">

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <span>العلامة التجارية</span>
                                                            <select class="form-control"  name="trademark_id" id="select" required="">
                                                                @foreach($trademarks as $trademark)
                                                                <option value="{{$trademark->id}}" {{$trademark->id == $data->trademark_id  ? 'selected' : ''}}>
                                                                    {{$trademark->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <!-- <div class="col-md-4">
                                                            <div class="form-label-group">
                                                                <div class="form-group">
                                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                                        <input type="checkbox" onclick="Enableddl(this)" id="check" name="status"/>
                                                                        <span class="vs-checkbox">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class=""></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="form-label-group">
                                                            <span> <input type="checkbox" onclick="Enableddl(this)" id="check" name="status"/> يوجد مورد </span>
                                                            <select class="form-control"  name="supplier_id" id="selectProduct" disabled='disabled'>
                                                                    <option value="" selected disabled>-- اختر المورد --</option>
                                                                    @foreach($suppliers as $supplier)
                                                                    <option value="{{$supplier->id}}" {{$supplier->id == $data->supplier  ? 'selected' : ''}}>
                                                                        {{$supplier->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                                <div class="form-group">
                                                                    <span for="form-group">التفاصيل</span>
                                                                    <textarea class="form-control" style="height:150px" name="details" placeholder="التفاصيل">{{ $data->details}}</textarea>
                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                        <div class="add-data-btn">
                                                            <input type="hidden" name="Save" value="Save">
                                                            <button class="btn mr-4 btn-primary"> حفظ تعديل</button>
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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>صورة المنتج </h4> 
                                </div>
                                <div class="card" style="margin: 5%">
                                    <img  id='output' style="height:150px; width:150px;" class="img-thumbnail" src="{{url('storage/'.$data->image)}}">
                                    <div class="card-body">
                                        <fieldset class="form-group">
                                            <div class="custom-file">
                                            <input type="file" accept='image/*' name="image" onchange='openFile(event)'>
                                            {{-- <br> --}}
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    </div>
                </section>
@endsection
<head>
    <title>Update Products</title>
</head>

