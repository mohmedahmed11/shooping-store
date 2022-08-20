@extends('layouts.master')
@section('content')
<div class="app-content content">
    {{-- <div class="app-content"> --}}
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            
            <div class="content-body">
                @include('dashboard.includes.messages')
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                                <tr>
                                    
                                    <th></th>
                                    <th>id</th>
                                    <th>Image</th>
                                    <th>NAME</th>
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                    {{-- <th>DETIALS</th> --}}
                                    <th>CODE</th>
                                    <th>quantity</th>
                                    <th>PRICE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($blog as $key => $blogs)
                                
                                <tr>
                                    
                                    <td>

                                    </td>
                                    <td class="product-category">{{$blogs->id}}</td>
                                    <td class="product-img">
                                        <img src="{{url('storage/'.$blogs->image)}}" style="width:60px">
                                    </td>
                                    <td class="product-name">{{$blogs->name}}</td>
                                    <td class="product-category">{{$blogs->category_id}}</td>
                                    <td class="product-category">{{$blogs->status}}</td>
                                    {{-- <td class="product-category">{{$blogs->details}}</td> --}}
                                    <td>
                                        <div class="chip chip-primary">
                                            <div class="chip-body">
                                                <div class="chip-text">{{$blogs->code}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-category">{{$blogs->quantity}}</td>
                                    
                                    <td class="product-price"><div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">{{$blogs->price}}</div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="product-action">


{{-- <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span> --}}
                                        <a href="{{url('product/update/'.$blogs->id)}}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="تعديل">
                                            <span class="action-edit"><i class="feather icon-edit"></i>
                                            </span>
                                            
                                            </a>
                                               
                                        <a href="{{url('product/delete/'.$blogs->id)}}" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                            <span class="action-delete"><i class="fa fa-trash"></i>
                                            </span>
                                        </a>
                                        <a href="{{url('product/images/'.$blogs->id)}}" data-toggle="tooltip" data-placement="top" title="الخصائص"  class="btn btn-outline-success">
                                            <span class="action-edit"><i class="fa fa-check-square"></i>
                                            </span>
                                            </a>
                                        <a href="{{url('product/images/'.$blogs->id)}}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="صور العرض">
                                            <span class="action-edit"><i class="fa fa-image"></i>
                                            </span>
                                            
                                            </a>
                                        
                                    </td>
                                </tr>
                               
                              
                                </tbody>
                           
                            @endforeach
                          
                        </table>
                     
                    </div>
                    <!-- dataTable ends -->
                    <!-- add new sidebar starts -->
                
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    
    <!-- END: Content-->

</div>
    <!-- END: Page JS-->


@endsection

<head>
   
    <title>Show Products</title>
</head>
