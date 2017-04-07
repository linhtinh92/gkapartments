<!DOCTYPE html>
<html>
<head>

    <meta name="robots" content="index, follow"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="canonical" href=""/>
    <meta name="author" content=""/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no">
@include('frontend.meta')
<!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="{{url('frontend/assets/fonts/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/fonts/bootstrap/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/style.css')}}">
</head>
<body>
<div class="main-container">
@include('frontend.header')
@yield('content')
@include('frontend.footer')
</div>
</body>
</html>