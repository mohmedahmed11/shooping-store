@extends('layouts.master')

@section('content')

<section id="data-list-view" class="data-list-view-header">
<body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
       data-menu="vertical-menu-modern" data-col="2-columns">
<div class="row match-height">
<div class="col-8">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">المسترجع</h4>
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
                        <th>البيان</th>
                        <th>المبلغ</th>
                        <th>التاريخ</th>
                        <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($expenses)
                    @foreach($expenses as $index=>$expens)
                        <tr role="row" class="odd">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $expens->data }}</td>
                            <td>{{ $expens->price }}</td>
                            <td>{{ $expens->date }}</td>
                            <td>
                                @if (auth()->user()->hasPermission('users_delete'))
                                    <a href="{{ route('retriever.delete', $expens->id) }}" id="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i>حذف</a>
                                @else
                                    <a href="#" id="delete" class="btn btn-outline-danger disabled"><i class="fa fa-trash"></i>حذف</a>
                                @endif
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

        <h4 class="text-uppercase">اضافة مسترجع </h4>

</div>
<div class="card-content">
    <div class="card-body">


            {{-- Begin Form --}}

            <form action="{{ route('retriever.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">البيان</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" value="{{ old('data') }}" name="data">
                                        <div class="form-control-position">
                                            <i class="feather icon-trending-up"></i>
                                        </div>
                                    </div>
                                    @error("data")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">المبلغ</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" value="{{ old('price') }}" name="price">
                                        <div class="form-control-position">
                                            <i class="feather icon-dollar-sign"></i>
                                        </div>
                                    </div>
                                    @error("price")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">التاريخ</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="date" class="form-control" value="{{ old('date') }}" name="date">
                                        <div class="form-control-position">
                                            <i class="feather icon-calendar"></i>
                                        </div>
                                    </div>
                                    @error("date")
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
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



