@extends('layouts.master')
@section('content')
<section id="multiple-column-form">
<body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
     data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    
    <div class="row match-height">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Properties</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                       <form class="form" action="{{ url('properties/pro/'.$data->id) }}" method="post" enctype="multipart/form-data">
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                            @method('put')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" value="{{$data->name}}" id="first-name-column" class="form-control" placeholder="الاسم الاول" name="name">
                                            <label for="first-name-column">اسم الخاصية</label>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="city-column" value="{{$data->type}}" class="form-control" placeholder="code" name="type">
                                            <label for="city-column">النوع</label>
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

        </div>
    </form> 
    </div> 
</section>
@endsection
<head>
    <title>Add New Properties</title>
</head>
