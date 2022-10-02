@extends('layouts.master')
@section('content')

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

        <section>

            <div class="row">

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" style="margin-bottom: 10px">الاقسام</h3>
                        </div><!-- end of card header -->

                        <div class="card-body">
                            <table  id="" class="table table-hover nowrap scroll-horizontal-vertical dataTable no-footer" >

                                <tbody>
                                @foreach ($categories as $category)
                                <tr class="">
                                 <td><a data-toggle="collapse" href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</a>
                                 <div id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse">

                                    <div class="panel-body">

                                        @if ($category->product->count() > 0)

                                            <table id="DataTables_Table_0" class="table data-thumb-view table nowrap scroll-horizontal-vertical dataTable no-footer">
                                                <thead>
                                                <tr>
                                                    <th>الاسم</th>
                                                    <th>السعر</th>
                                                    <th>اضافه</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($category->product as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ number_format($product->price, 2) }}</td>
                                                        <td>
                                                            <a href=""
                                                               id="product-{{ $product->id }}"
                                                               data-name="{{ $product->name }}"
                                                               data-id="{{ $product->id }}"
                                                               data-price="{{ $product->price }}"
                                                               class="btn btn-success btn-sm add-product-btn">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table><!-- end of table -->

                                        @else
                                            <sapn>لا توجد سجلات</sapn>
                                        @endif

                                    </div><!-- end of panel body -->
                                </div><!-- end of panel collapse -->
                            </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $customer->name }}" name="name">
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
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone">
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

                                    <div class="col-md-12">
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

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">ملاحظة</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ old('note') }}" name="note">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>الكميه</th>
                                        <th>السعر</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody class="order-list">

                                    </tbody>

                                </table><!-- end of table -->
                                <hr>
                                <strong>المجموع : <span class="total-price">0</span></strong>
                                <hr>
                                @foreach($settings as $setting)                         
                                    <strong>تكلفه التوصيل : {{$delivery_cost = $setting -> delivery_cost}}</strong>
                                    <input type="hidden" id="deleviryCost" name="delivery_cost" value="{{$delivery_cost}}" >
                                    <input type="hidden" id="total" name="total" >
                                @endforeach
                                <hr>
                                <strong>المجموع الكلي : <span id="total-cost"> 0 </span></strong>
                                <hr>

                                <button type="submit" class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i>اضافه الطلب</button>

                            </form>

                        </div><!-- end of card body -->

                    </div><!-- end of card -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
</section>

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

</div>

@endsection
