
@extends('layouts.master')
@section('content')

<section id="multiple-column-form">
    {{--  <body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
     data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


      --}}
     <form class="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row match-height">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اضافه اعلان</h4>
                </div>

                {!! Toastr::message() !!}

                <div class="card-content">
                    <div class="card-body">
                       
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" onclick="Enableddl(this)" id="check" name="status"  />
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">اعلان لمنتج</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-12">
                                        <div class="controls">
                                            <select class="form-control"  name="product_id" id="selectProduct" disabled='disabled'>
                                                <option value="" selected disabled>--اختر المنتج--</option>
                                                {{--  @foreach($products as $product)
                                                    <option value="{{ $product->id }}" @if(old('product_id') != $product->id ) {{$selectedProduct = $product}} @endif>{{ $product->name }}</option>
                                                @endforeach  --}}
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}" >
                                                    {{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div id="" class="col-md-12 col-12">
                                        <div class="table-responsive">
                                            <table class="table" id="productToView">
                                                <thead>
                                                    <tr role="row">
                                                        <th>رقم المنتج</th>
                                                        <th>الاسم</th>
                                                        <th>صوره</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{--  @isset($selectedProduct)
                                                       <tr role="row" class="odd">
                                                            <td>{{ $selectedProduct->id}}</td>
                                                            <td>{{ $selectedProduct->name }}</td>
                                                            <td><img src="{{ $selectedProduct->image }}" style="width: 80px;" class="img-thumbnail" alt=""></td>
                                                            
                                                        </tr>
                                                    @endisset  --}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- DataTable ends -->
                                    </div>


                                    <div class="col-12">
                                        <div class="card-btns d-flex justify-content-between">
                                            <button type="submit" class="btn gradient-light-info white">اضافه</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> اختر صوره الاعلان <i class="fa fa-image" aria-hidden="true"></i></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="col-md-12 col-12">
                            <fieldset class="form-group">
                                <div class="card" style="width: 18rem;">
                                    <img  id='output' src="{{ asset('icons/defalut.jpeg') }}" style="height:150px; ">
                                    <fieldset class="form-group">
                                        <label for="basicInputFile">Image</label>
                                        <div class="custom-file">
                                            <input type="file" accept='image/*' name="image" onchange='openFile(event)'><br>
                                        </div>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>


</section>

{{-- end content --}}


@endsection

