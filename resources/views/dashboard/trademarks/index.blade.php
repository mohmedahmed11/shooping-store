@extends('layouts.master')

@section('content')

<section id="data-list-view" class="data-list-view-header">
<body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"data-menu="vertical-menu-modern" data-col="2-columns">
<div class="row match-height">
<div class="col-8">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">العلامات التجاريه</h4>
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
                        <th>صوره</th>
                        <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($customers)
                    @foreach($customers as $index=>$customer)
                        <tr role="row" class="odd">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td><img src="{{ asset('assets/admin/uploads').'/'.$customer->image }}" style="width: 80px;" class="img-thumbnail" alt=""></td>
                            <td>
                                @if (auth()->user()->hasPermission('users_update'))
                                    <a href="{{ route('trademarks.edit', $customer->id) }}" class="btn btn-outline-info "><i class="fa fa-edit"></i>تعديل</a>
                                @else
                                    <a href="#" class="btn btn-outline-info disabled"><i class="fa fa-edit"></i>تعديل</a>
                                @endif

                                @if (auth()->user()->hasPermission('users_delete'))
                                    <a href="{{ route('trademarks.delete', $customer->id) }}" class="btn btn-outline-danger "><i class="fa fa-trash"></i>حذف</a>
                                @else
                                    <a href="#" class="btn btn-outline-danger disabled"><i class="fa fa-trash"></i>حذف</a>
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

    <h4 class="text-uppercase">اضافه علامه</h4>

</div>
<div class="card-content">
    <div class="card-body">
            {{-- Begin Form --}}
            <form action="{{ route('trademarks.store') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="first-name-icon">صورة</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="file" name="image" class="form-control image" value="{{ old('image') }}">
                                        <div class="form-control-position">
                                            <i class="feather icon-image"></i>
                                        </div>
                                    </div>
                                    @error("image")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <img src="{{ asset('img/no_image.jpg') }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
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



