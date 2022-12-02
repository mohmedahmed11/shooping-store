@extends('layouts.master')

@section('content')

<section id="data-list-view" class="data-list-view-header">
<body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
       data-menu="vertical-menu-modern" data-col="2-columns">
<div class="row match-height">
<div class="col-8">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">المناطق</h4>
    </div>
    <div class="card-content">
        <div class="card-body">

        <!-- DataTable starts -->
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <tr role="row">
                        <th>رقم</th>
                        <th>الاسم</th>
                        <th>رسوم التوصيل</th>
                        <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($regons)
                    @foreach($regons as $index=>$regon)
                        <tr role="row" class="odd">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $regon->name }}</td>
                            <td>${{ $regon->delivery_cost }}</td>
                            <td>
                                <a href="{{ route('regon.edit', $regon->id) }}" class="btn btn-outline-info "><i class="fa fa-edit"></i>تعديل</a>
                                <a href="{{ route('regon.status', $regon->id) }}" id="delete" class="btn btn-outline-warning "><i class="fa fa-status"></i>
                                    @if ($regon->status == 0)
                                    تفعيل
                                    @else
                                    إلغاء تفعيل
                                    @endif
                                </a>
                                <a href="{{ route('regon.delete', $regon->id) }}" id="delete" class="btn btn-outline-danger "><i class="fa fa-trash"></i>حذف</a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
    <!-- DataTable ends -->

    </div>
</div>
</div>
</div>
    {{-- <div class="row match-height"> --}}
<div class="col-4">
<div class="card">
<div class="card-header">

        <h4 class="text-uppercase">اضافه منطقه </h4>

</div>
<div class="card-content">
    <div class="card-body">


            {{-- Begin Form --}}

            <form action="{{ route('regon.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">

                                    <label for="first-name-icon">الاسم</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="مثال : الخرطوم بحري">
                                        <div class="form-control-position">
                                            <i class="feather icon-list"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">رسوم التوصيل</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="number" class="form-control" value="{{ old('name') }}" name="delivery_cost" >
                                        <div class="form-control-position">
                                            <i class="feather icon-list"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input type="checkbox" checked="" name="status" value="1">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">الحالة</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-plus"></i> اضافة</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">تفريغ</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- End Form --}}

    </div>
</div>
</div>
{{-- </div> --}}

</div>
</body>


</section>
<!-- Data list view end -->
{{--  /////////////////////////////////////////////////////////////////////////////////--}}
            </div>
    <!-- END: Content-->
@endsection
