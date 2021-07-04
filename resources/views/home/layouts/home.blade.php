<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8"/>
{{--    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">--}}
{{--    <link rel="icon" type="image/png" href="assets/img/favicon.png">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <title>Sitesazz-@yield('title')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{ asset('css/home/font-awesome.min.css') }}"/>
    <!-- CSS Files -->
    <link href="{{ asset('css/home/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/home/now-ui-kit.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/home/plugins/owl.carousel.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/home/plugins/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/home/main.css') }}" rel="stylesheet"/>
</head>

<body class="index-page sidebar-collapse">
<!-- responsive-header -->
@include('home.sections.headerOfMobile')
<!-- responsive-header -->
<div class="wrapper default">

    <!-- header -->
@include('home.sections.header')
<!-- header -->

    @yield('content')

    @include('home.sections.footer')
</div>
</body>
<!--   Core JS Files   -->
<!--   Core JS Files   -->
<script src="{{ asset('js/home/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/home/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/home/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/home/plugins/bootstrap-switch.js') }}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/home/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{ asset('js/home/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="{{ asset('js/home/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/home/now-ui-kit.js') }}" type="text/javascript"></script>
<!--  CountDown -->
<script src="{{ asset('js/home/plugins/countdown.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Sliders -->
<script src="{{ asset('js/home/plugins/owl.carousel.min.js') }}" type="text/javascript"></script>
<!--  Jquery easing -->
<script src="{{ asset('js/home/plugins/jquery.easing.1.3.min.js') }}" type="text/javascript"></script>
<!--  Plugin ez-plus -->
<script src="{{ asset('js/home/plugins/jquery.ez-plus.js') }}" type="text/javascript"></script>
<!-- Main Js -->
<script src="{{ asset('js/home/main.js') }}" type="text/javascript"></script>
@yield('script')
</html>

