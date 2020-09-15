<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/login/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/login/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/animsition/login/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login/css/util.css">
    <link rel="stylesheet" type="text/css" href="login/css/main.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="POST" action="{{route('saveLogin')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <span class="login100-form-title p-b-43">
						Đăng ký tài khoản
                </span>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 " >
                    <input class="input100" type="text" name="name" placeholder="Nhập name" value="{{ old('name') }}">
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 " >
                    <input class="input100" type="text" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                </div>
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100">
                    <input class="input100" type="text" name="phone" placeholder="phone" value="{{ old('phone') }}">
                </div>
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 " >
                    <input class="input100" type="file" name="image" placeholder="image" >
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="password" placeholder="password" >
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Nhập lại password">
                </div>
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="wrap-input100 " >
                    <input class="input100" type="text" name="address" placeholder="Nhập address" value="{{ old('address') }}">
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div><br>

                <button type="submit" class="login100-form-btn">Submit</button>
            </form>

            <div class="login100-more" style="background-image: url('login/images/33.jpg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/animsition/login/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/bootstrap/login/js/popper.js"></script>
<script src="login/vendor/bootstrap/login/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/daterangepicker/moment.min.js"></script>
<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="login/js/main.js"></script>

</body>
</html>