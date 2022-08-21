
@extends('layouts.master')
@section('content') 
  
                <section id="data-list-view multiple-column-form" class="data-list-view-header">
                    
                    <body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
                    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <div class="row match-height">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> خصائص المنتج</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">                               
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No:</th>
                                    <th>اسم الخاصية</th>
                                    <th>الوصف</th>
                                    {{-- <th>ORDER STATUS</th>
                                    <th>DATE</th> --}}
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productProparities as $property)
                                <tr>
                                    
                                        {{-- 	id	name	type --}}
                                    {{-- property_id  product_id	property_value 	 --}}
                                    {{-- 	id 	property_id 	product_id 	property_value 	 --}}
                                    <td></td>
                                    <td class="product-name">{{$property->id}}</td>
                                    <td class="product-category">{{$property->name}}</td>
                                    <td class="product-category">{{$property->property_value}}</td>
                                                                       
                                    <td class="product-action">
                                        {{-- /delete/properites/ --}}
                                        <a href="{{url('properties/delete/'.$property->id)}}" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                            <span class="action-delete"><i class="fa fa-trash"></i>
                                            </span>
                                        </a>
                                    </td> 
                                                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                </div>      
            </div>
        </div>
    </div>
                {{-- <div class="row match-height"> --}}
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">اضافة خاصية </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="{{  route('properties.save')  }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="data-items pb-3">
                        <div class="data-fields px-2 mt-3">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-name">Name</label>
                                    <input type="text" name="name" class="form-control" id="data-name">
                                </div>
                                {{-- value="{{$data->name}}"  --}}
                            
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-price">Type</label>
                                    <input type="textname=" name="type" class="form-control" id="data-price">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button class="btn btn-primary">Add Data</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button value="reset" class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                </form>
                    
                </div>
            </div>
        </div>      
    {{-- </div> --}}
 
</div>
</body>

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">خصائص المنتج:</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form class="form" action="{{ route('product.carete_proparity') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <select class="form-control"  name="property_id" id="select" required="">
                                                @foreach($properties as $property)
                                                <option value="{{$property->id}}" >
                                                    {{$property->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- value="{{$data->name}}"  --}}
                                
                                    
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">value</label>
                                            <input type="text" name="property_value" class="form-control" id="value">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <input type="hidden" name="product_id" value="{{ $product->id}}">
                                    <button class="btn btn-primary">save property</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Properites</title>
</head>
<body>
    
</body>
</html>