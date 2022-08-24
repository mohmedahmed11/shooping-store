@extends('layouts.master')
@section('content')


        <section id="page-account-settings">

            <div class="crad">
                <div class="card-title">
                    <h2>
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
                               @if($product->status== 1)
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
                                الكمية : {{$product->quantity}} 
                            </h4>
                        </div>  
                    </div>
                    <hr>    
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
                                        <th>اسم الخاصية</th>
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
                    <hr>   
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                                <tr class="filters">
                                    <th></th>
                                        <th> # </th>
                                        <th>اسم المنتج</th>
                                        <th>صوره</th>
                                        <th>إجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($similerProducts->simlier)
                                {{-- $index = 0; --}}
                                    @foreach($similerProducts->simlier as $similer)
                                        <tr role="row" class="odd">
                                            <td></td>
                                            <td>{{ $similer->product->id }}</td>
                                            <td>{{ $similer->product->name }}</td>
                                            <td><img src="{{ url('storage/'.$similer->product->image) }}" style="width: 80px;" class="img-thumbnail" alt=""></td>
                                            <td><a href="{{ url('similer/delete', $similer->product->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>

@endsection
<head>
    <title>Details Product</title>
</head>

