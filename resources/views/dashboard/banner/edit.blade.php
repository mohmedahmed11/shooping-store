
@extends('layouts.master')
@section('content')

<section id="multiple-column-form">

     <form class="form" action="{{ route('banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row match-height">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">تعديل اعلان</h4>
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
                                                    <input type="checkbox" onclick="Enableddl(this)" id="check" name="status" {{ $banner->has_product == 1 ? "checked " : "" }}  />
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
                                            <select class="form-control"  name="product_id" id="selectProduct" {{ $banner->has_product == 1 ? "" : "disabled='disabled'" }} >
                                                <option value="" {{ $banner->has_product == 1 ? "" : "selected disabled" }} >--اختر المنتج--</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}"@if($banner -> product_id == $product -> id  )  selected @endif >
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

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- DataTable ends -->
                                    </div>


                                    <div class="col-12">
                                        <div class="card-btns d-flex justify-content-between">
                                            <button type="submit" class="btn gradient-light-info white">تحديث</button>
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
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="col-md-12 col-12">
                            <fieldset class="form-group">
                                <div class="card" style="width: 18rem;">
                                    <img  id='output' src="{{ $banner->image_path }}" style="height:150px; ">
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

