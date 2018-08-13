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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 ">
            <div class="card mt-5">
                <div class="card-header d-flex align-items-center ">
                    <div class="logo text-uppercase"><h1><strong class="text-primary">Register</strong></h1></div>
                </div>
                <div class="card-body">
                    <form action="" method="post" >
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" class="form-control">
                            <p><strong class="text-danger">{{ $errors->first('email') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="text" name="password" placeholder="Mật khẩu" value="{{ old('password') }}" class="form-control">
                            <p><strong class="text-danger">{{ $errors->first('password') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="text" name="password_confirmation" placeholder="Nhập lại mật khẩu" value="{{ old('password_confirmation') }}" class="form-control">
                            <p><strong class="text-danger">{{ $errors->first('password_confirmed') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="name" name="name" placeholder="Họ tên" value="{{ old('name') }}" class="form-control">
                            <p><strong class="text-danger">{{ $errors->first('name') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <div class="i-checks">
                                <input id="radioCustom1" checked type="radio" value="1" name="sex" class="form-control-custom radio-custom">
                                <label for="radioCustom1">Nam</label>
                            </div>
                            <div class="i-checks">
                                <input id="radioCustom2" type="radio" value="0" name="sex" class="form-control-custom radio-custom">
                                <label for="radioCustom2">Nữ</label>
                            </div>
                            <p><strong class="text-danger">{{ $errors->first('sex') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <label>Điện thoại liên hệ</label>
                            <input type="number" name="phone" placeholder="Điện thoại" value="{{ old('phone') }}" class="form-control">
                            <p><strong class="text-danger">{{ $errors->first('phone') }}</strong></p>
                        </div>
                        <div class="form-group">
                            <label>Điạ chỉ</label>
                            <input type="text" name="address" placeholder="Địa chỉ" value="{{ old('address') }}" class="form-control">
                            <p><strong class="text-danger">{{ $errors->first('address') }}</strong></p>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input type="submit" value="Register" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="{{ asset('/cpanel/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/cpanel/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('/cpanel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>