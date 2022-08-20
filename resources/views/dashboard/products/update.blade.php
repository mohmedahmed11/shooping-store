@extends('layouts.master')
@section('content')
    {{-- <div class="app-content"> --}}
  
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update Product</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{url('/product/save_update/'.$data->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <label for="first-name-column">اسم المنتج</label>
                                                            <input type="text" value="{{$data->name}}" id="first-name-column" class="form-control" placeholder="الاسم" name="name">
                                                           
                                                        </div>
                                                    </div>                                                
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <label for="city-column">الكود</label>
                                                            <input type="text" value="{{$data->code}}" id="city-column" class="form-control" placeholder="code" name="code">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <label for="country-floating">الكمية</label>
                                                            <input type="text" value="{{$data->quantity}}" id="country-floating" class="form-control" name="quantity" placeholder="الكمية">
                                                           
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <label for="form-group">السعر</label>
                                                            <input type="number" value="{{$data->price}}" id="number-id-column" class="form-control" name="price" placeholder="السعر">
                                                            
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                                <div class="form-group">
                                                                    <label for="form-group">التفاصيل</label>
                                                                    <textarea class="form-control" style="height:150px" name="details" placeholder="التفاصيل">{{ $data->details}}</textarea>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                
                                                    <div class="col-md-6 col-12">
                
                                                        <div class="form-label-group">
                                                            <label>category</label>
                                                            <select class="form-control"  name="category_id" id="select" required="">
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{$category->id == $data->category_id  ? 'selected' : ''}}>
                                                                    {{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-12">
                                                        <input type="submit" class="btn btn-primary" value="Save" name="Save">
                                                    </div>                                                                     
                                                </div>
                                            </div>                                       
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                       <h4>Image Product</h4>  {{-- <h4 class="card-title">Image <i class="fa fa-image" aria-hidden="true"></i>add Image</h4> --}}
                                    </div>                               
                                    <div class="card">
                                        <img  id='output' style="height:150px; width:150px; text-align: center" src="{{url('storage/'.$data->image)}}">                                        
                                        <div class="card-body">                                                                             
                                         <fieldset class="form-group">
                                            <label for="basicInputFile">Image</label>
                                             <div class="custom-file">
                                             <input type="file" accept='image/*' name="image" onchange='openFile(event)'>
                                             {{-- <br> --}}
                                             </div>
                                         </fieldset>
                                        </div>
                                      </div>
                                </div>  
                                   
                            </div>                        
                        </div>
                    </form>
                    </div>
                    
                </section>
                <!-- Data list view end -->


    <!-- END: Page JS-->
@endsection
<head>
    <title>Update Products</title>
</head>

