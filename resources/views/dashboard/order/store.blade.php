@extends('layouts.master')
@section('content')
{{--  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h3 class="content-header-title float-left mb-0">اضافه طلب</h3>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                        </li>
                    </ol>
                </div>
            </div>
            {!! Toastr::message() !!}
        </div>
    </div>
</div>
<div class="content-body">  --}}

{{-- //////////////////////////////////////////////////////////////////////////////// --}}


        <section class="content">

            <div class="row">

                <div class="col-md-6">

                    <div class="card card-primary">

                        <div class="card-header">

                            <h3 class="card-title" style="margin-bottom: 10px">الاقسام</h3>

                        </div><!-- end of card header -->

                        <div class="card-body">

                            @foreach ($categories as $category)

                                <div class="panel-group">

                                    <div class="panel panel-info">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                            </h4>
                                        </div>

                                        <div id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse">

                                            <div class="panel-body">

                                                @if ($category->product->count() > 0)

                                                    <table class="table table-hover">
                                                        <tr>
                                                            <th>الاسم</th>
                                                            <th>السعر</th>
                                                            <th>اضافه</th>
                                                        </tr>

                                                        @foreach ($category->product as $product)
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ number_format($product->price, 2) }}</td>
                                                                <td>
                                                                    <a href=""
                                                                       id="product-{{ $product->id }}"
                                                                       data-name="{{ $product->name }}"
                                                                       data-id="{{ $product->id }}"
                                                                       data-price="{{ $product->sale_price }}"
                                                                       class="btn btn-success btn-sm add-product-btn">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </table><!-- end of table -->

                                                @else
                                                    <h5>لا توجد سجلات</h5>
                                                @endif

                                            </div><!-- end of panel body -->

                                        </div><!-- end of panel collapse -->

                                    </div><!-- end of panel primary -->

                                </div><!-- end of panel group -->

                            @endforeach

                        </div><!-- end of card body -->

                    </div><!-- end of card -->

                </div><!-- end of col -->

                <div class="col-md-6">

                    <div class="card card-primary">

                        <div class="card-header">

                            <h3 class="card-title">الطلبات</h3>

                        </div><!-- end of card header -->

                        <div class="card-body">

                            <form action="{{ route('order.store', $customer->id) }}" method="post">
                                @csrf
                                {{ method_field('post') }}

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>الكميه</th>
                                        <th>السعر</th>
                                    </tr>
                                    </thead>

                                    <tbody class="order-list">


                                    </tbody>

                                </table><!-- end of table -->

                                <h4>المجموع : <span class="total-price">0</span></h4>

                                <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> @lang('site.add_order')</button>

                            </form>

                        </div><!-- end of card body -->

                    </div><!-- end of card -->

                    {{--  @if ($client->orders->count() > 0)  --}}

                        <div class="card card-primary">

                            <div class="card-header">

                                <h3 class="card-title" style="margin-bottom: 10px">الطلبات السابقه
                                    {{--  <small>{{ $orders->total() }}</small>  --}}
                                </h3>

                            </div><!-- end of card header -->

                            <div class="card-body">

                                {{--  @foreach ($orders as $order)  --}}

                                    <div class="panel-group">

                                        <div class="panel panel-success">

                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    {{--  <a data-toggle="collapse" href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toFormattedDateString() }}</a>  --}}
                                                </h4>
                                            </div>

                                            {{--  <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">  --}}

                                                <div class="panel-body">

                                                    <ul class="list-group">
                                                        {{--  @foreach ($order->products as $product)  --}}
                                                            {{--  <li class="list-group-item">{{ $product->name }}</li>  --}}
                                                        {{--  @endforeach  --}}
                                                    </ul>

                                                </div><!-- end of panel body -->

                                            </div><!-- end of panel collapse -->

                                        </div><!-- end of panel primary -->

                                    </div><!-- end of panel group -->

                                {{--  @endforeach  --}}

                                {{--  {{ $orders->links() }}  --}}

                            </div><!-- end of card body -->

                        </div><!-- end of card -->

                    {{--  @endif  --}}

                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
</section>

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

</div>

@endsection
