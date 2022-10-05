@extends('layouts.master')
@section('content')


 <section id="data-thumb-view" class="data-thumb-view-header"> 



    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">  <strong> الأكثر مببيعاً :</strong></h2>

                </div>
            </div>
        </div>

    </div>

<div class="table-responsive">
    <table class="table data-thumb-view">
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
            @isset($bestSellers)
                @foreach($bestSellers as $bestSeller)
                    <tr role="row" class="odd">
                        <td></td>
                        <td>{{ $bestSeller->bestProduct->id }}</td>
                        <td>{{ $bestSeller->bestProduct->name}}</td>
                        <td><img src="{{ url('storage/'.$bestSeller->bestProduct->image) }}" style="width: 80px; height: 80px;" class="img-thumbnail" alt=""></td>
                        <td><a href="{{ url('homeApp/delete', $bestSeller->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                        </td>
                    </tr>
                @endforeach
                @endisset
        </tbody>
    </table>
</div>



<div class="add-new-data-sidebar">
    <div class="overlay-bg">

    </div>
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">اضافة منتج مشابه:</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <form class="form" action="{{ route('create') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="data-items pb-3">
            <div class="data-fields px-2 mt-3">
                <div class="row">
                    <div class="col-sm-12 data-field-col">
                        <label for="data-name">Name</label>
                        <select class="form-control"  name="product_id" id="select" required="">
                            @foreach($products as $bestSeller)
                            <option value="{{$bestSeller->id}}" >
                                {{$bestSeller->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <input type="hidden" name="best_seller_products" value="{{ $bestSeller->id}}">
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
    <title>Best Seller Product </title>
</head>
