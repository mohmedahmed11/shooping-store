@extends('layouts.master')

@section('content')

<section id="data-list-view" class="data-list-view-header">
<body  class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static"
       data-menu="vertical-menu-modern" data-col="2-columns">



       {{-- <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <center>

                    <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>

                </center>

                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>



                    <div class="card-body">

                        @if (session('status'))

                            <div class="alert alert-success" role="alert">

                                {{ session('status') }}

                            </div>

                        @endif



                        <form action="{{ route('send.notification') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                <label>Title</label>

                                <input type="text" class="form-control" name="title">

                            </div>

                            <div class="form-group">

                                <label>Body</label>

                                <textarea class="form-control" name="body"></textarea>

                              </div>

                            <button type="submit" class="btn btn-primary">Send Notification</button>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div> --}}




<div class="row match-height">
<div class="col-8">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">الاشعارات</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
{{--
                <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button> --}}

    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <tr role="row">
                        <th>No</th>
                        <th>العنوان</th>
                        <th> الموضوع</th>
                        <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @isset($notifications)

                    @foreach($notifications as $index=>$notification)
                    <tr role="row" class="odd">
                        {{-- <form action="{{ route('send.notification') }}" method="POST"> --}}
                            {{-- @csrf --}}
                        <td>{{ $index + 1 }}</td>
                            <td>
                                {{ $notification->title }}
                            </td>
                            <td>
                               {{ $notification->body }}
                            </td>
                            <td>
                                     {{-- <button type="submit" class="btn btn-outline-primary">Send</button>
                            </form> --}}
                            <a href="{{ route('notification.send', $notification->id) }}"  class="btn btn-outline-primary ">
                                Send</a>
                                        <a href="{{ route('notification.delete', $notification->id) }}"  class="btn btn-outline-danger ">
                                        <i class="fa fa-trash"></i>حذف</a>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>

    </div>
</div>
</div>
</div>
<div class="col-4">
<div class="card">
<div class="card-header">

        <h4 class="text-uppercase">اضافه اشعار </h4>

</div>
<div class="card-content">
    <div class="card-body">

            <form action="{{  route('notification.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <div class="form-group">
                                    <label for="first-name-icon">العنوان</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control"  name="title" placeholder="العنوان">
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
                                    <label for="first-name-icon"> الموضوع</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="body" >
                                        <div class="form-control-position">
                                            <i class="feather icon-list"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><i class="fa fa-plus"></i> اضافة</button>
                            <button type="reset" name="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">تفريغ</button>
                        </div>
                    </div>
                </div>
            </form>
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














    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

    <script>



        var firebaseConfig = {

            apiKey: "BFvxhwlVHoYQHSK_Vnk_WhaJFu7nnqbLS95m_8yteiEttNfQqTlsqXzyXwxoQw_kd2RpqFkTm7YgnEXRcW6w5xs",

            authDomain: "https://fcm.googleapis.com/fcm/send",

            databaseURL: "https://hasnaa-store.firebaseio.com",

            projectId: "hasnaa-store",

            storageBucket: "hasnaa-store.appspot.com",

            messagingSenderId: "983489749154",

            appId: "1:983489749154:ios:1334f04386dadeaf2ff7fb",

            measurementId: "XXX"

        };



        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();



        function initFirebaseMessagingRegistration() {

                messaging

                .requestPermission()

                .then(function () {

                    return messaging.getToken()

                })

                .then(function(token) {

                    console.log(token);



                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });



                    $.ajax({

                        url: '{{ route("save-token") }}',

                        type: 'POST',

                        data: {

                            token: token

                        },

                        dataType: 'JSON',

                        success: function (response) {

                            alert('Token saved successfully.');

                        },

                        error: function (err) {

                            console.log('User Chat Token Error'+ err);

                        },

                    });



                }).catch(function (err) {

                    console.log('User Chat Token Error'+ err);

                });

         }



        messaging.onMessage(function(payload) {

            const noteTitle = payload.notification.title;

            const noteOptions = {

                body: payload.notification.body,

                icon: payload.notification.icon,

            };

            new Notification(noteTitle, noteOptions);

        });



    </script>

@endsection
