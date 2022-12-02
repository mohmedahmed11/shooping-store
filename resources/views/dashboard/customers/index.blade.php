@extends('layouts.master')

@section('content')

<section id="data-list-view" class="data-list-view-header">
<body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
       data-menu="vertical-menu-modern" data-col="2-columns">
<div class="row match-height">
<div class="col-8">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">المشرفين</h4>
    </div>
    <div class="card-content">
        <div class="card-body">

        <!-- DataTable starts -->
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <tr role="row">
                        <th> # </th>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($customers)
                    @foreach($customers as $index=>$customer)
                        <tr role="row" class="odd">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <a href="{{ route('order.create', $customer->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-plus"></i>اضافه طلب</a>
                                @if (auth()->user()->hasPermission('users_update'))
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i>تعديل</a>
                                @else
                                    <a href="#" class="btn btn-outline-info disabled btn-sm"><i class="fa fa-edit"></i>تعديل</a>
                                @endif

                                @if (auth()->user()->hasPermission('users_delete'))
                                    <a href="{{ route('customers.delete', $customer->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>حذف</a>
                                @else
                                    <a href="#" class="btn btn-outline-danger disabled btn-sm"><i class="fa fa-trash"></i>حذف</a>
                                @endif
                                {{--  <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i>تعديل</a>  --}}
                                {{--  <a href="{{ route('admins.delete', $admin->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>  --}}
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

        <h4 class="text-uppercase">اضافه مشرف </h4>

</div>
<div class="card-content">
    <div class="card-body">


            {{-- Begin Form --}}

            <form action="{{ route('customers.store') }}" method="post" >
                @csrf
                <div class="form-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">الاسم</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" >
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                    </div>
                                    @error("name")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">رقم الهاتف</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" >
                                        <div class="form-control-position">
                                            <i class="feather icon-phone"></i>
                                        </div>
                                    </div>
                                    @error("phone")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">كلمة السر</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" >
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                    </div>
                                    @error("password")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
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
</body>


</section>
<!-- Data list view end -->
{{--  /////////////////////////////////////////////////////////////////////////////////--}}
            </div>
    <!-- END: Content-->
@endsection



