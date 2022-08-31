@extends('layouts.master')
@section('content')
<section id="data-thumb-view" class="data-thumb-view-header"  id="basic-dropdown">

    <!-- dataTable starts -->
    <div class="table-responsive">
        <table class="table data-thumb-view table nowrap scroll-horizontal-vertical">
            <thead>
                <tr class="">
                    <th>رقم الطلب</th>
                    <th>المستخدم</th>
                    <th>رقم الهاتف</th>
                    <th>منطقه التوصيل</th>
                    <th>المجموع</th>
                    <th>فترة التوصيل</th>
                    <th>عدد الوحدات</th>
                    <th>الحاله</th>
                    <th>تفاصيل</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($orders)
                @foreach($orders as $index=>$order)
                <tr role="row" >
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->user->phone}}</td>
                    <td>{{$order->regon->name}}</td>
                    {{--  <td>{{$order->address}}</td>  --}}
                    <td>${{$order->total}}</td>
                    {{--  <td>${{$order->delivery_cost}}</td>  --}}
                    <td>{{$order->delivery_period}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <span class="badge badge-pill badge-primary">{{$order->items_count}}</span>
                    </td>
                    <td>
                        @if ($order->status == 0)
                        <span class="badge badge badge-light badge-pill">جديد</span>
                        @elseif ($order->status == 1)
                        <span class="badge badge badge-info badge-pill">مقبول</span>
                        @elseif ($order->status == 2)
                        <span class="badge badge badge-warning badge-pill">قيد التوصيل</span>
                        @elseif ($order->status == 3)
                        <span class="badge badge badge-success badge-pill">تم التسليم</span>
                        @elseif ($order->status == 4)
                        <span class="badge badge badge-danger badge-pill">تم الالغاء</span>
                        @endif
                    </td>
                    <td>
                        <button class="selectedOrder btn-outline-info" data-toggle="modal" data-target="#OrderModalCenter" type="button" val="{{ $order->id }}" >
                            <i class="feather icon-menu"></i>
                        </button>
                    </td>
                    <td>
                        <select class="form-control orderStatus" val="{{ $order->id }}"  name="status" id="orderList" >
                            <option value="" selected disabled>--اختر الحاله--</option>
                            <option value="0">جديد</option>
                            <option value="1">مقبول</option>
                            <option value="2">قيد التوصيل</option>
                            <option value="3">تم التسليم</option>
                            <option value="4">تم الالغاء</option>
                        </select>
                        {{--  <div class="btn-group ">
                            <div class="dropdown">
                                <button class="btn btn-outline-info dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-expanded="false">
                                    تغيير الحاله
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3" id="orderList" onchange="getSelectValue();">
                                    <a class="dropdown-item" href="{{route('order.status',$order->id)}}" value="0">جديد</a>
                                    <a class="dropdown-item" href="{{route('order.status',$order->id)}}" value="1">مقبول</a>
                                    <a class="dropdown-item" href="{{route('order.status',$order->id)}}" value="2">قيد التوصيل</a>
                                    <a class="dropdown-item" href="{{route('order.status',$order->id)}}" value="3">تم التسليم</a>
                                    <a class="dropdown-item" href="{{route('order.status',$order->id)}}" value="4">تم الالغاء</a>
                                </div>
                            </div>
                        </div>  --}}
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>
    <!-- dataTable ends -->
</section>

<!-- Modal -->


        <div class="modal fade" id="OrderModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="print-area">

                </div>
            </div>

        </div>
</form>

<!-- Modal -->


@endsection



