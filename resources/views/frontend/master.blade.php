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
    <!-- Google Fonts
    ============================================ -->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'
          type='text/css'>
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <!-- font-awesome CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.css')}}">
    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/lib/css/nivo-slider.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{url('frontend/lib/css/preview.css')}}" type="text/css" media="screen"/>
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/animate.css')}}">
    <!-- meanmenu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/meanmenu.min.css')}}">
    <!-- ui CSS
    ============================================ -->
    <link href="{{url('frontend/css/jquery-ui.css')}}" rel="stylesheet">
    <!-- Image Zoom CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/img-zoom/jquery.simpleLens.css')}}">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/style.css')}}">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
    <!-- modernizr JS
    ============================================ -->
    <script src="{{url('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{url('frontend/js/vendor/jquery-1.11.3.min.js')}}"></script>
    <script type="text/javascript">
        var SUB_MONEY = "{{$frontEndConfig['sub_money']}}";
    </script>
</head>
<body>
@include('frontend.header')
@yield('content')
@include('frontend.brand')
@include('frontend.footer')