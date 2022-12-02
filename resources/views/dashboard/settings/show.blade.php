@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">إعدادات التطبيق</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form" action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf 
                
                <input name="id" value="{{$settings -> id}}" type="hidden">

                <div class="row">
                    <div class="col-12">
                        <div class="form-label-group">
                                <div class="form-group">
                                    <label for="form-group">عن التطبيق</label>
                                    <textarea class="form-control" style="height:150px" name="about" >{{ $settings->about }}</textarea>
                                </div>
                            
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="first-name-column">تكلفه التوصيل الثابته</label>
                        <div class="form-label-group">
                            <input type="text" value="{{ $settings->delivery_cost }}" id="first-name-column" class="form-control"name="delivery_cost">
                        </div>
                    </div>        

                    <div class="col-md-6 col-12">
                        <label for="first-name-column">واتساب</label>
                        <div class="form-label-group">
                            <input type="text" value="{{ $settings->whatsapp }}" id="first-name-column" class="form-control"name="whatsapp">
                        </div>
                    </div>                                                
                    <div class="col-md-6 col-12">
                        <label for="city-column">فيسبوك</label>
                        <div class="form-label-group">
                            <input type="text" value="{{ $settings->facebook }}" id="city-column" class="form-control" name="facebook">                                                            
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="country-floating">تويتر</label>
                        <div class="form-label-group">
                            <input type="text" value="{{ $settings->twitter }}" id="country-floating" class="form-control" name="twitter">
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="form-group">انستغرام</label>
                        <div class="form-label-group">
                            <input type="text" value="{{ $settings->instagram }}" id="number-id-column" class="form-control" name="instagram">
                            
                        </div>
                    </div>
                        
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-update"></i>تحديث</button>
                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">تفريغ</button>
                    </div>                                                                     
                </div>
                </div>                                       
        </form>
    </div>
    </div>
</div>

@endsection