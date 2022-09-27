@extends('layouts.master')
@section('content')
<div class="content-header row">
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
<div class="content-body">

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

<section id="multiple-column-form">

</section>

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

</div>

@endsection
