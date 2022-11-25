<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dictionary</title>

    <!--Favicon -->
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon"/>
    <!-- Bootstrap css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css-rtl/dark.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet">

    <!-- Animate css -->
    <link href="{{ asset('assets/css-rtl/animated.css') }}" rel="stylesheet"/>

    <!--Sidemenu css -->
    <link href="{{ asset('assets/css-rtl/sidemenu.css') }}" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet"/>

    <!---Icons css-->
    <link href="{{ asset('assets/css-rtl/icons.css') }}" rel="stylesheet"/>

    <!---Sidebar css-->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet"/>

    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

    <!--- INTERNAL jvectormap css-->
    <link href="{{ asset('assets/plugins/jvectormap/jqvmap.css') }}" rel="stylesheet"/>

    <!-- INTERNAL Data table css -->
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min-rtl.css') }}" rel="stylesheet"/>

    <!-- INTERNAL Time picker css -->
    <link href="{{ asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet"/>


    <!-- Sweet-alert css -->
    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet">

    <!-- Notifications css -->
    <link href="{{ asset('assets/plugins/notify/css/jquery.growl.css') }}" rel="stylesheet">

    <!-- Summernote css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">

    <!-- PersianDateTimePicker css -->
    <link rel="stylesheet"
          href="{{asset('assets\PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.style.css')}}"/>


    <link href="{{ asset('assets/css-rtl/style-rtl.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css-rtl/custom.css') }}" rel="stylesheet"/>

    <!--me-->
    <!--fonts-->
    <link href="{{ asset('assets/css/iranyekanx.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--select 2-->
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />

    <!--growl-->
    <link href="{{asset(asset('assets/plugins/jquery-growl/jquery.growl.css'))}}" rel="stylesheet" type="text/css" />

    <!-- Font icons css-->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">

    <style>
        #growls-default {
            right: 80%;
        }
        label {
        font-weight: bold;
    }
        .rtl{
            direction: rtl;
            text-align: right;
        }
        .ltr{
            direction: ltr;
            text-align: left;
        }
    </style>

    @yield('styles')

</head>

<body class="app sidebar-mini">

<!---Global-loader-->
<div id="global-loader">
    <img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
</div>

<div class="page">
    <div class="page-main">

        <!--aside open-->
    @include('layouts.menu')
    <!--aside closed-->

        @include('layouts.navbar')
        <div class="content" style="padding: 20px">
            @yield('content')
        </div>
    </div>

    <!--Footer-->
@include('layouts.footer')
<!-- End Footer-->

</div>

<!-- image -->
<script src="{{asset('assets/js/image-validation.js')}}"></script>

<!-- Back to top -->
<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

<!-- Jquery js-->
<script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>


<!-- Bootstrap4 js-->
<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Othercharts js-->
<script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

<!--Sidemenu js-->
<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- P-scroll js-->
<script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>

<!--Sidebar js-->
<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

<!-- Select2 js -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

<!-- INTERNAL Peitychart js-->
<script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

<!-- INTERNAL Apexchart js-->
<script src="{{asset('assets/plugins/apexchart/apexcharts.js')}}"></script>

<!-- INTERNAL Vertical-scroll js-->
<script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}"></script>
<script src="{{asset('assets/plugins/vertical-scroll/vertical-scroll.js')}}"></script>

<!-- INTERNAL  Datepicker js -->
<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>

<!-- INTERNAL Chart js -->
<script src="{{asset('assets/plugins/chart/chart.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

<!-- INTERNAL Timepicker js -->
<script src="{{asset('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
<script src="{{asset('assets/plugins/time-picker/toggles.min.js')}}"></script>

<!-- INTERNAL Chartjs rounded-barchart -->
<script src="{{asset('assets/plugins/chart.min/chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chart.min/rounded-barchart.js')}}"></script>

<!-- INTERNAL jQuery-countdowntimer js -->
<script src="{{asset('assets/plugins/jQuery-countdowntimer/jQuery.countdownTimer.js')}}"></script>

<!-- INTERNAL Index js-->
<script src="{{asset('assets/js/index1.js')}}"></script>

<!-- Sweet-alert js  -->
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>

<!-- Notifications js -->
<script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>

<!-- Summernote js  -->
{{--<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>--}}

<!-- PersianDateTimePicker js -->
<script src="{{asset('assets\PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.js')}}"
        type="text/javascript"></script>

<!-- Custom js-->
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- Main js -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!--me-->
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/chartjs-adapter-moment.min.js')}}"></script>

<!-- Form editor js -->
{{--<script src="{{asset('assets/js/summernote.js')}}"></script>--}}
<script src="{{asset('assets/js/formeditor.js')}}"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

<!--select 2-->
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<!--growl-->
<script src="{{asset('assets/plugins/jquery-growl/jquery.growl.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/alpine.min.js')}}" defer></script>


@include('components.notifications')
<style>
    .tdnowrap {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
    }
</style>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $(function (e) {
        if(document.querySelector('.dont_activate')){
            document.querySelector('.dont_activate').classList.remove('active');
        }
          });
</script>
<!-- Main js -->

@yield('scripts')
</body>
</html>
