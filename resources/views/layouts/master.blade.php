<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Hassna Store</title>
    {{-- <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png"> --}}

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/data-list-view.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/tour/tour.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ssets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h6, .navigation {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>

 <!-- toast -->
 <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" dir="rtl">

    <!-- BEGIN: Header-->
    @include('dashboard.includes.header')

    <!-- END: Header-->


    @include('dashboard.includes.sidebar')



    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @include('dashboard.includes.messages')
                @yield('content')

    </div>
    </div>
    </div>





Stack(
    children: [

    ]
)

    @include('dashboard.includes.footer')
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
     <!-- BEGIN: Vendor JS-->
     <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
     <!-- BEGIN Vendor JS-->



     <!-- BEGIN: Page Vendor JS-->
     <!-- <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script> -->
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script> -->
     <!-- END: Page Vendor JS-->
     {{--  custom  --}}
    <script src="{{ asset('app-assets/js/custom/order.js') }}"></script>
    {{--  number  --}}
    <script src="{{ asset('app-assets/js/custom/jquery.number.min.js') }}"></script>

     <!-- BEGIN: Theme JS-->
     <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
   <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
   <script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
     <!-- END: Theme JS-->

     <!-- BEGIN: Page JS-->
     <script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>

     <!-- PRINT: THIS JS-->
     <script src="{{ asset('assets/js/printThis.js') }}"></script>



   <!-- print this -->
   <script>
        //print order
    $(document).on('click', '.print-btn', function() {
        $('#print-area .modal-body').printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: false,          // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "{{ asset('assets/css/printStyle.css') }}",
            header: '<span class="modal-title" id="exampleModalCenterTitle">طلب رقم : 22</span>',
            footer: '<hr> <div class="row"> <div class="col-md-12"> <label><p>تكلفه التوصيل ثابته لكل المناطق داخل الخرطوم</p></label>  </div> </div>'
            //base: "http://127.0.0.1:8000/",            // function called before iframe is removed
        });
    });//end of click function
   </script>


  <!-- image preview -->
  <script>
    // image preview
    $(".image").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
    });
    </script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    {{--  chekbox show  --}}
    <script>
        function Enableddl(checked)
        {
        var ddl=document.getElementById('selectProduct');
        ddl.disabled=check.checked ? false : true;
        if (!ddl.disabled)
        {
            ddl.focus();
        }
    }

    $("#selectProduct").change(function () {

        var val = $('#selectProduct').val();
        {{--  var base_url = '{!! url().'/' !!}';  --}}
        var APP_URL = {!! json_encode(url('/').'/') !!}
        console.log(APP_URL);
        $.ajax({
        url: APP_URL+"banner/find_product/"+val,
        method: 'GET',
        success: function(data){
             console.log(data.id);
             $("#productToView tbody").text("");
             $("#productToView").append('<tr role="row" class="odd">'
                                        +'<td>'+data.id+'</td>'
                                        +'<td>'+data.name+'</td>'
                                        +'<td><img src="'+APP_URL+data.image+'" style="width: 80px;" class="img-thumbnail" alt=""></td>'

                                        +'</tr>');
            {{--  $("#productToView").load();  --}}
        }});

    });



    $(".selectedOrder").click(function () {

        var val = $(this).attr("val");//this.attr('val');
        var APP_URL = {!! json_encode(url('/').'/') !!}
        console.log(val);
        $.ajax({
        url: APP_URL+"order/find_order/"+val,
        method: 'GET',
        success: function(data){
            console.log(data.id);
            $('#OrderModalCenter').modal('show');
            $("#OrderModalCenter #print-area").text("");
            $("#OrderModalCenter #print-area").html('<div class="modal-header">'
            +'<h5 class="modal-title" id="exampleModalCenterTitle">طلب رقم : '+data.id+'</h5>'
            +'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
            +'<span aria-hidden="true">&times;</span> </button> </div> <div class="modal-body">'

            +'</div>'
            +'<br><div class="modal-footer"><button  class="btn btn-primary print-btn"><i class="fa fa-print"></i>طباعه فاتوره</button></div>'
            );

            $("#OrderModalCenter .modal-body").html(' <div class="row"><div class="col-md-6 col-12">'
                +'<strong>التاريخ : </strong> <br> <span>'+data.created_at+'</span> </div>'
                +'<div class="col-md-6 col-12"> <strong>المستخدم : </strong>  <span>'+data.user.name+'</span></span> <br>'
                +'<strong>الهاتف : </strong> <span>'+data.user.phone+'</span> </div>  </div> <hr>'
                +'<div class="row">  <div class="col-md-12"> <label><strong>المنطقه</strong> : <span>'+data.regon.name+'</span></label> </div> </div>'
                +'<div class="row"> <div class="col-md-12"> <label><strong>العنوان</strong> : <span>'+data.address+'</span></label> </div> </div>'
                +'<div class="row"> <div class="col-md-12">  <label><strong>مواعيد التوصيل</strong> : <span>'+data.delivery_period+'</span></label> </div> </div> <hr>'
                +'<div class="row">  <div class="col-md-12"> <label><strong>الاصناف : </strong></label> </div> <div class="col-md-12"> '
                +'<table class="table">  <thead>  <th>#</th>  <th>اسم المنتج</th> <th>الكميه</th> </thead>'
                +'<tbody></tbody></table> </div></div>'
                +'<hr> <div class="row"> <div class="col-md-12"> <label><strong>ملاحظه</strong> : <span>'+data.note+'</span></label> </div> </div>'
                +'<hr> <div class="row"> <div class="col-md-12"> <label><strong>تكلفه الطلب</strong> : <span>'+data.total+'</span></label></div>'
                +'<div class="col-md-12"> <label><strong>رسوم التوصيل</strong> : <span>'+data.delivery_cost+'</span></label> </div>'
                +'<div class="col-md-12"><label><strong>الاجمالي</strong> : <span></span>'+data.total+'</label></div>'
                +'</div>'


            );


            $.each( data.items, function( key, item ) {
                $("#OrderModalCenter .modal-body .table tbody").append('<tr><td>'+item.id+'</td> <td>'+item.name+'</td><td>'+item.count+'</td></tr> ');
            });

            }});
        return false;
    });



    $('.orderStatus').change(function() {
        var status = $(this).val();
        var id = $(this).attr("val");
        var APP_URL = {!! json_encode(url('/').'/') !!};
        console.log(APP_URL);
        $.ajax({
            url: APP_URL+"order/status/"+id+"/"+status,
            method: 'GET',
            dataType: 'application/json',
            success: function(data){
                console.log(data);
                location.reload(true);
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
                location.reload(true);
            }
        });
    });

    $("#addToSession").click(function () {

        var val = $('#selectOrderProduct').val();
        if (val == null) {
            return
        }
        var count = $('#product_count').val();
        {{--  var base_url = '{!! url().'/' !!}';  --}}
        var APP_URL = {!! json_encode(url('/').'/') !!}
        console.log(APP_URL);
        $.ajax({
        url: APP_URL+"order/add_item_to_session/"+val+"/"+count,
        method: 'GET',
        success: function(data){
             console.log(data);
             location.reload(true);
             {{--  $("#productToView tbody").text("");
             $("#productToView").append('<tr role="row" class="odd">'
                                        +'<td>'+data.id+'</td>'
                                        +'<td>'+data.name+'</td>'
                                        +'<td><img src="'+APP_URL+data.image+'" style="width: 80px;" class="img-thumbnail" alt=""></td>'

                                        +'</tr>');  --}}
            {{--  $("#productToView").load();  --}}
        }});

    });

</script>

</body>
<!-- END: Body-->

</html>
