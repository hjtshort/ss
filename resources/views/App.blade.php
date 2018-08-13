<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FPT system</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="shortcut icon" href="{{ asset('/cpanel/img/FPT_Logo.jpg' ) }}" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/cpanel/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/cpanel/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('/cpanel/css/fontastic.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('/cpanel/css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('/cpanel/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/cpanel/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/cpanel/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/cpanel/img/favicon.icon') }}">
    <link rel="stylesheet" href="{{ asset('/cpanel/css/loader.css') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{ asset('/cpanel/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/cpanel/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/cpanel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/cpanel/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script src="{{ asset('/cpanel/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    {{--<script src="{{ asset('/cpanel/vendor/chart.js/Chart.min.js') }}"></script>--}}
    {{--<script src="{{ asset('/cpanel/vendor/jquery-validation/jquery.validate.min.js') }}"></script>--}}
    <script src="{{ asset('/cpanel/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
{{--<script src="{{ asset('/cpanel/js/charts-home.js') }}"></script>--}}
<!-- Main File-->
    <script src="{{ asset('/cpanel/js/front.js') }}"></script>

</head>
<body>
<!-- Side Navbar -->
@include('sidebar')
<div class="page">
    <!-- navbar-->
    @include('header')
    <!-- Counts Section -->
    @yield('content')
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                    <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- JavaScript files-->

</body>
</html>