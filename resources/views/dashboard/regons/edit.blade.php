@extends('layouts.master')

@section('content')

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">المناطق</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">الرئيسية</a>
                                </li>
                            </ol>
                        </div>
                    </div>
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
                    <h4 class="card-title">تعديل - {{ $regon->name }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- Begin Form --}}
                        <form action="{{ route('regon.update', $regon->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">الاسم</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $regon->name }}" name="name">
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
                                                <label for="first-name-icon">تكلفه التوصيل</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $regon->delivery_cost }}" name="delivery_cost">
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
                                                    <input type="checkbox" @if($regon->status == 1) checked="1" @endif name="status" value="1" />
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
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-update"></i>تحديث</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">تفريغ</button>
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
