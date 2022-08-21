@extends('layouts.master')
@section('content')
<section id="data-thumb-view" class="data-thumb-view-header">
    <div class="action-btns d-none">
        <div class="btn-dropdown mr-1 mb-1">
            {{-- <div class="btn-group dropdown actions-dropodown"> --}}
                {{-- <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
             --}}
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    <!-- dataTable starts -->
    <div class="table-responsive">
        <table class="table data-thumb-view">
            <thead>
                <tr  class="filters">
                                    
                    <th></th>
                    {{-- <th>id</th> --}}
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>القسم</th>
                    <th>الحالة</th>
                    <th>الكود</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    det
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <a href="index.html" >
                <tr  role="row" href="index.html" >


                    {{-- id	name	category_id	image	code	quantity	status	price	 Ascending 1	created_at	updated_at 	 --}}

                    <td>

                    </td>
                    {{-- <td class="product-name">{{$product->id}}</td> --}}
                    <td class="product-img">
                        <a href="{{url('product/details/'.$product->id)}}" data-toggle="tooltip" data-placement="top" title="تفاصيل..">
                                                                     
                           
                        <img src="{{url('storage/'.$product->image)}}" class="img-thumbnail" style="height:100px; width:100px;">
                    {{-- </a> --}}
                    </td>
                    <td class="product-name">{{$product->name}}</td>
                    <td class="product-name">{{$product->category}}</td>                                  
                    <td class="product-name">{{$product->status}}</td>
                    <td class="product-name">{{$product->details}}</td>
                    <td class="product-name">
                        <div class="chip chip-primary">
                            <div class="chip-body">
                                <div class="chip-text">{{$product->code}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="product-name">{{$product->quantity}}</td>
                    
                    <td class="product-name"><div class="chip chip-text">
                        <div class="chip-body">
                            <div class="chip-text">{{$product->price}}</div>
                        </div>
                    </div>
                    </td>



                    {{-- <td class="product-action">
                        <a href="{{url('product/update/'.$product->id)}}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="تعديل">
                            <span class="action-edit"><i class="feather icon-edit"></i>
                            </span>                                            
                            </a>
                               
                        <a href="{{url('product/delete/'.$product->id)}}" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                            <span class="action-delete"><i class="fa fa-trash"></i>
                            </span>
                        </a>
                        <a href="{{url('product/properites/'.$product->id)}}" data-toggle="tooltip" data-placement="top" title="الخصائص"  class="btn btn-outline-success">
                            <span class="action-edit"><i class="fa fa-check-square"></i>
                            </span>
                            </a>
                        <a href="{{url('product/images/'.$product->id)}}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="صور العرض">
                            <span class="action-edit"><i class="fa fa-image"></i>
                            </span>
                            </a>                                        
                    </td> --}}
               
                </tr>
            </a>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- dataTable ends -->
    
    <!-- add new sidebar starts -->

    <!-- add new sidebar ends -->
</section>    
@endsection
<head>

    <title>Display Products</title>
</head>
