@extends('layouts.master')

@section('content')

{{-- //////////////////////////////////////////////////////////////////////////////// --}}

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">تعديل - {{ $admin->name }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- Begin Form --}}
                        <form action="{{ route('admins.update', $admin->id) }}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">الاسم</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $admin->name }}" name="name">
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
                                                <label for="first-name-icon">البريد الالكتروني</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" value="{{ $admin->email }}" name="email">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                </div>
                                                @error("email")
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <div class="form-group">
                                                <label for="first-name-icon">كلمه السر</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="password" class="form-control" name="password">
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

                                    <div class="col-md-12">
                                        <strong>الصلاحيات : </strong>
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                @php
                                                    $models = ['users', 'categories', 'products', 'settings', 'orders'];
                                                    $maps = ['create', 'read', 'update', 'delete'];
                                                @endphp
                                                <ul class="nav nav-item">
                                                    @foreach ($models as $index=>$model)
                                                        <li class="nav-item {{ $index == 0 ? 'active' : '' }}">
                                                            <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="home-tab" data-toggle="tab" href="#{{ $model }}" aria-controls="home" role="tab" aria-selected="true">@lang('site.'.$model)</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </ul>
                                            <div class="tab-content">
                                                @foreach ($models as $index=>$model)
                                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}" aria-labelledby="home-tab" role="tabpanel">
                                                        @foreach ($maps as $map)
                                                            <label>
                                                                <input type="checkbox" name="permissions[]" {{ $admin->hasPermission($model.'_'.$map) ? 'checked' : '' }} value="{{ $model.'_'.$map }}">
                                                                @lang('site.'.$map)
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-update"></i>تحديث</button>
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

@endsection
