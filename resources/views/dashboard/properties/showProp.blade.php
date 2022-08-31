@extends('layouts.master')
@section('content') 
  
                <section id="data-list-view" class="data-list-view-header">
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
                                    <th>NAME</th>
                                    <th>Type</th>
                                    <th>POPULARITY</th>
                                    <th>ORDER STATUS</th>
                                    <th>DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blog as $key => $blogs)
                                <tr>
                                    <td></td>
                                    <td class="product-name">{{$blogs->name}}</td>
                                    <td class="product-category">{{$blogs->type}}</td>
                                    <td>
                                        <div class="progress progress-bar-primary">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:83%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-price"></td>
                                    <td class="product-action">
                                        <a href="{{url('properties/rad/'.$blogs->id)}}" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="تعديل">
                                            <span class="action-edit"><i class="feather icon-edit"></i>
                                            </span>                                            
                                            </a>
                                               
                                        <a href="{{url('properties/delete/'.$blogs->id)}}" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="حذف">
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

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">الخصائص:</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form class="form" action="{{ route('properties.save') }}" method="post" enctype="multipart/form-data">
                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
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
                                            <input type="textname="type" class="form-control" id="data-price">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
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