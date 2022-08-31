@extends('layouts.master')
@section('content')



        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">اضافه طلب</h2>
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
        <div class="content-body">

        {{-- //////////////////////////////////////////////////////////////////////////////// --}}

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اضافه طلب جديد :</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- Begin Form --}}

                        <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">المستخدم</label>
                                                <select name="user_id" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر المستخدم ">
                                                        @if($users && $users -> count() > 0)
                                                            @foreach($users as $user)
                                                                <option value="{{$user -> id }}">{{$user -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">منطقه التوصيل</label>
                                                <select name="regon_id" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر المنطقه ">
                                                        @if($regons && $regons -> count() > 0)
                                                            @foreach($regons as $regon)
                                                                <option value="{{$regon -> id }}">{{$regon -> name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">العنوان</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('address') }}" name="address">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">المجموع</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="number" class="form-control" value="{{ old('total') }}" name="total">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">تكلفه التوصيل</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="number" class="form-control" value="{{ old('delivery_cost') }}" name="delivery_cost">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">فتره التوصيل</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('delivery_period') }}" name="delivery_period">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-clock-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">عدد الوحدات</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="number" class="form-control" value="{{ old('items_count') }}" name="items_count">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-list-ol"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">الحاله</label>
                                                <select name="status" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر الحاله ">
                                                        <option value="0">طلب جديد</option>
                                                        <option value="1">طلب مقبول</option>
                                                        <option value="2">قيد التوصيل</option>
                                                        <option value="3">نم التسليم</option>
                                                        <option value="4">تم الالغاء</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">order from</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('order_from') }}" name="order_from">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-list"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">نوت</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('note') }}" name="note">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-plus"></i> اضافة</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

        </div>




@endsection
