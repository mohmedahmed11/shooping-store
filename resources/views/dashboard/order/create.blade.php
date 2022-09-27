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

    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-body">

            <div class="row match-height">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">بياتات مقدم الطلب :</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">الاسم</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">رقم الهاتف</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('phone') }}" name="phone">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                </div>
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
                                                <label for="first-name-icon">فتره التوصيل</label>
                                                <select name="delivery_period" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر الحاله ">
                                                        <option value="الفترة الصباحية (9 - 12)">الفترة الصباحية (9 - 12)</option>
                                                        <option value="الفترة الصباحية (2 - 5)">الفترة الصباحية (2 - 5)</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">تكلفه التوصيل</label>
                                                <div class="position-relative has-icon-left">
                                                    @foreach($settings as $setting)
                                                    <input type="text" class="form-control" value="{{$setting -> delivery_cost}}" name="delivery_cost">
                                                    @endforeach
                                                    <div class="form-control-position">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">ملاحظة</label>
                                                <div class="position-relative has-icon-left">
                                                    <textarea class="form-control"  name="note">{{ old('note') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-plus"></i> إكمال الطلب</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
{{--  //////////////////////////////////////////////////////////////  --}}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">بيانات المنتج:</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-label-group col-md-5 ">
                                        <div class="form-group">
                                            <label for="first-name-icon">المنتج</label>
                                            <select class="form-control"  name="product_id" id="selectOrderProduct" >
                                                <option value="" selected disabled>--اختر المنتج--</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-label-group col-md-5 ">
                                        <div class="form-group">
                                            <label for="first-name-icon">الكمية</label>
                                            <input type="number" class="form-control" id="product_count" name="count" value="1">
                                        </div>
                                    </div>

                                    <div class="form-label-group col-md-2 ">
                                        <div class="form-group">
                                            <label for="first-name-icon">  </label>
                                            <button type="button" id="addToSession" class="form-control btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div id="" class="col-12">
                                    <div class="table-responsive">
                                        <table class="table" id="productToView">
                                            <thead>
                                                <tr role="row">
                                                    <th>الاسم</th>
                                                    <th>الكمية</th>
                                                    <th>سعر المنتج</th>
                                                    <th>المجموع</th>
                                                    <th>إجراء</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{--  {{ $items = ; }}  --}}
                                                @if(session('order_items'))
                                                    {{ $total = 0 }}
                                                    @foreach (session('order_items') as $index => $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->count }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>{{ $total += $item->price *  $item->count }}</td>
                                                        <td>
                                                            <a href="{{ route('order.delete_item_from_session',$index ) }}" id="delete" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>حذف</a>
                                                        </td>
                                                        {{--  <input type="hidden" name="product_id[]" value="{{ $item->id }}">  --}}
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <th>المجموع الكلي</th>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>{{ $total }}</td>
                                                    </tr>
                                                    
                                                @endif
                                                {{--  {{ $items }}  --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- DataTable ends -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
    {{-- End Form --}}
</section>

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

        </div>




@endsection
