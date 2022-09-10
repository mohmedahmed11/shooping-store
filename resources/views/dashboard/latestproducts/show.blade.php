@extends('layouts.master')
@section('content')
<section id="data-thumb-view" class="data-thumb-view-header" id="data-list-view" class="data-list-view-header">

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">  <strong>احدث العروض :</strong></h2>

                </div>
            </div>
        </div>

    </div>


    <div class="action-btns d-none">
        <div class="btn-dropdown mr-1 mb-1">
        </div>
    </div>
 <h3>

    </h3>
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
            @isset($lastedAdd)
                @foreach($lastedAdd as $lastedAdds)
                    <tr role="row" class="odd">
                        <td></td>
                        <td>{{ $lastedAdds->lastProduct->id }}</td>
                        <td>{{ $lastedAdds->lastProduct->name}}</td>
                        <td><img src="{{ url('storage/'.$lastedAdds->lastProduct->image) }}" style="width: 80px; height: 80px;" class="img-thumbnail" alt=""></td>
                        <td><a href="{{ url('latestproducts/delete', $lastedAdds->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                        </td>
                    </tr>
                @endforeach
                @endisset
        </tbody>
    </table>
</div>

<div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">اضافة  احدث العروض:</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <form class="form" action="{{ route('createlatest') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="data-items pb-3">
            <div class="data-fields px-2 mt-3">
                <div class="row">
                    <div class="col-sm-12 data-field-col">
                        <label for="data-name"> <strong>اختيار المنتج : </strong> </label>
                        <select class="form-control"  name="product_id" id="select" required="">
                            @foreach($products as $LastAdd)
                            <option value="{{$LastAdd->id}}" >
                                {{$LastAdd->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <input type="hidden" name="best_seller_products" value="{{ $LastAdd->id}}">
                <button class="btn btn-primary">save</button>
            </div>
            <div class="cancel-data-btn">
                <button type="reset" value="reset" class="btn btn-outline-danger">Cancel</button>
            </div>
        </div>
    </form>
    </div>
</div>
</section>
@endsection
<head>
    <title>last Add Product </title>
</head>
