<!DOCTYPE html>
<html lang="en">
<head>
    <title>WebNail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="energen/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="energen/css/animate.css">

    <link rel="stylesheet" href="energen/css/owl.carousel.min.css">
    <link rel="stylesheet" href="energen/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="energen/css/magnific-popup.css">

    <link rel="stylesheet" href="energen/css/aos.css">

    <link rel="stylesheet" href="energen/css/ionicons.min.css">

    <link rel="stylesheet" href="energen/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="energen/css/jquery.timepicker.css">


    <link rel="stylesheet" href="energen/css/flaticon.css">
    <link rel="stylesheet" href="energen/css/icomoon.css">
    <link rel="stylesheet" href="energen/css/style.css">


</head>
<body>
@include('web.share.header')
@yield('content')

@include('web.share.footer')


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="energen/js/jquery.min.js"></script>
<script src="energen/js/jquery-migrate-3.0.1.min.js"></script>
<script src="energen/js/popper.min.js"></script>
<script src="energen/js/bootstrap.min.js"></script>
<script src="energen/js/jquery.easing.1.3.js"></script>
<script src="energen/js/jquery.waypoints.min.js"></script>
<script src="energen/js/jquery.stellar.min.js"></script>
<script src="energen/js/owl.carousel.min.js"></script>
<script src="energen/js/jquery.magnific-popup.min.js"></script>
<script src="energen/js/aos.js"></script>
<script src="energen/js/jquery.animateNumber.min.js"></script>
<script src="energen/js/bootstrap-datepicker.js"></script>
<script src="energen/js/jquery.timepicker.min.js"></script>
<script src="energen/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="energen/js/google-map.js"></script>
<script src="energen/js/main.js"></script>

@yield('js')
</body>
</html>