@extends('layouts.master')
@section('content')


        <section id="page-account-settings" id="data-list-view" class="data-list-view-header">
            <div class=" ">
                
                    <div class="sidebar-left">
                        <div class="sidebar">

                            <!-- Modal -->
                            <div class="modal fade text-left" id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-text-bold-600" id="emailCompose">إضافة خيارات</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body pt-1">
                                            <form class="form" action="{{ route('product.productoption') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="form-label-group mt-1">
                                                <span for="data-name">وصف</span>
                                                <input type="text" id="emailTo" class="form-control" placeholder="وصف الخيار " name="name">

                                            </div>


                                            <div class="col-6">
                                                <div class="card" style="width: 18rem;">
                                                    <div class="card-header">
                                                       <h4>صورة  </h4>  {{-- <h4 class="card-title">Image <i class="fa fa-image" aria-hidden="true"></i>add Image</h4> --}}
                                                    </div>
                                                    <div class="col-md-12 col-12">

                                                        <fieldset class="form-group">
                                                            <div class="" >
                                                                <img  id='output' class="img-thumbnail" src="{{url('/img/no_image.jpg')}}" style="height:200px; width:200px;">
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




                                            {{-- <div class="form-group mt-2">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="emailAttach">
                                                    <span class="custom-file-label" for="emailAttach">Attach file</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button type="submit" value="save" class="btn btn-primary">save</button>
                                            <button type="reset" value="reset" class="btn btn-danger">reset</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>


            <div class="card">
                <div class="card-title" style="margin-top: 1%">
                    <h2 style="margin-right: 2%">
                        تفاصيل المنتج

                    </h2>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2 col-12">
                            <a href="javascript: void(0);">

                                <img src="{{url('storage/'.$product->image)}}" class="rounded mr-75" alt="profile image" height="150" width="150">
                            </a>
                        </div>
                        <div class="col-md-5 col-6">
                            <h4  style="margin-top: 5%">
                                {{$product->name}}
                            </h4>
                            <h4 style="margin-top: 5%" >
                                القسم : {{$product->category}}
                            </h4>
                            <h4 style="margin-top: 5%">
                               الحالة:
                               {{-- count($posts) == 1 --}}
                               {{-- $isAdmin == 1 && $active == 1 --}}
                               @if($product->status == 1 && $product->quantity >= 1)
                                    <span class="badge badge badge-success badge-pill">متوفر</span>
                                @else
                                    <span class="badge badge badge-danger badge-pill">غير متوفر  </span>
                                @endif
                           </h4>
                        </div>

                        <div class="col-md-5 col-6">
                            <h4 style="margin-top: 5%" >
                                السعر : {{$product->price}}
                            </h4>

                            <h4 style="margin-top: 5%" >
                                الكود : {{$product->code}}
                            </h4>
                            <h4 style="margin-top: 5%" >
                                @if($product->status == 0)
                                الكمية :
                                <span class="badge badge badge-danger badge-pill"> {{ $product->quantity = 0}} </span>
                                @else
                                الكمية : {{ $product->quantity}}
                                @endif
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <h2>صور المنتج</h2>
                    <div class="row match-height">
                        @isset($images)
                        @foreach($images as $index=>$image)
                             <div class="col-xl-4">
                                    <div class="card-body">
                                        <img class="card-img img-fluid mb-1" src="{{ $image->image_path }}" alt="Card image cap">
                                    </div>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                        <h2>خيارات المنتج</h2>

                    <hr>
                    <div class="sidebar-content email-app-sidebar d-flex">

                        <div class="email-app-menu">
                            <div class="form-group form-group-compose text-center compose-btn">
                                <button type="button" class="btn btn-primary btn-block my-2" data-toggle="modal" data-target="#composeForm"><i class="feather icon-plus"></i>إضافة خيار</button>
                            </div>

                        </div>
                    </div>

                    <div class="row match-height">
                        @isset($images)
                        @foreach($options->option as  $option)
                             <div class="col-md-2">
                                    <div class="card-body">
                                        <img class="card-img img-fluid mb-1" class="img-thumbnail image-preview" src="{{url('storage/'.$option->image)}}" alt="Card image cap">
                                        <p class="card-text">{{$option->name}}</p>
                                        <a href="{{ url('product/option/delete', $option->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                                    </div>
                        </div>

                        @endforeach
                        @endisset
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="col-12" >
                                <h3>
                                التفاصيل :
                                <p class="">
                                    <br>
                                    {{ $product->details}}
                                </p>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col-12">
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>القيمة</th>
                                        <th>الوصف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product->proparities as $property)
                                    <tr>
                                        <td class="product-category">{{$property->name}}</td>
                                        <td class="product-category">{{$property->property_value}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                  <hr>
                    <h3> المنتجات المشابهة </h3>
                </div>
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                            <tr class="filters">
                                <th></th>
                                    <th> id </th>
                                    <th>اسم المنتج</th>
                                    <th>صوره</th>
                                    <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($similerProducts->simlier)
                                @foreach($similerProducts->simlier as $similer)
                                    <tr role="row" class="odd">
                                        <td></td>
                                        <td>{{ $similer->product->id }}</td>
                                        <td>{{ $similer->product->name }}</td>
                                        <td><img src="{{ url('storage/'.$similer->product->image) }}" style="width: 80px;" class="img-thumbnail" alt=""></td>
                                        <td><a href="{{ url('product/similer/delete', $similer->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="add-new-data-sidebar 1">
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">option product :</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <form class="form" action="{{ route('products.crate_silmiler') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="data-items pb-3">
                        <div class="data-fields px-2 mt-3">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-name">Name</label>
                                    <select class="form-control"  name="similar_product_id" id="select" required="">
                                        @foreach($sim as $SimilerProduct)
                                        <option value="{{$SimilerProduct->id}}" >
                                            {{$SimilerProduct->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <input type="hidden" name="product_id" value="{{ $product->id}}">
                            <button class="btn btn-primary">save</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="add-new-data-sidebar">
                <div class="overlay-bg"></div>
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">اضافة منتج مشابه:</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <form class="form" action="{{ route('products.crate_silmiler') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="data-items pb-3">
                        <div class="data-fields px-2 mt-3">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-name">Name</label>
                                    <select class="form-control"  name="similar_product_id" id="select" required="">
                                        @foreach($sim as $SimilerProduct)
                                        <option value="{{$SimilerProduct->id}}" >
                                            {{$SimilerProduct->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <input type="hidden" name="product_id" value="{{ $product->id}}">
                            <button class="btn btn-primary">save</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>
@endsection
<head>
    <title>Details Product</title>
</head>

