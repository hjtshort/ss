<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
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
    <link rel="stylesheet"
          href="{{ asset('/cpanel/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/cpanel/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/cpanel/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/cpanel/img/favicon.icon') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="page login-page">
    <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
            <div class="form-inner" style="width: 100%">
                {{--<div class="logo text-uppercase"><strong class="text-primary">FPT System</strong></div>--}}
                <div class="sidenav-header-inner text-center"><img width="200px" src="{{ asset('/cpanel/img/FPT_Logo.jpg' ) }}"
                                                                   alt="person" class="img-fluid">
                </div>
                {{--<p class="logo text-uppercase"><strong class="text-danger">Login</strong></p>--}}
                <form method="post" class="text-left" action="">
                    @csrf
                    <div class="form-group-material">
                        <input type="email" name="email" value="{{ Session::get('email') }}" class="input-material">
                        <label for="login-username" class="label-material">Email</label>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group-material">
                        <input id="login-password" type="password" {{ Session::get('password')}} name="password" class="input-material">
                        <label for="login-password" class="label-material">Password</label>
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        <p class="text-danger">{{ Session::get('errorLogin') }}</p>
                    </div>
                    <div class="form-group text-center">
                        <button id="login" class="btn btn-primary">Login</button>
                        <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </div>
                </form>
                <small>Do not have an account?</small>
                <a href="{{ route('register') }}" class="signup">Register</a>
            </div>
            <div class="copyrights text-center">
                <p>Design by <a href="" class="external">Minh Thư</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="{{ asset('/cpanel/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/cpanel/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('/cpanel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/cpanel/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
<script src="{{ asset('/cpanel/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
{{--<script src="{{ asset('/cpanel/vendor/chart.js/Chart.min.js') }}"></script>--}}
{{--<script src="{{ asset('/cpanel/vendor/jquery-validation/jquery.validate.min.js') }}"></script>--}}
<script src="{{ asset('/cpanel/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
{{--<script src="{{ asset('/cpanel/js/charts-home.js') }}"></script>--}}
<!-- Main File-->
<script src="{{ asset('/cpanel/js/front.js') }}"></script>
</body>
</html>