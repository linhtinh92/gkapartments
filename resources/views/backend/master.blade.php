<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Backend</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{url('public/Backend/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/style.css')}}" rel="stylesheet" type="text/css">
@yield('css')
<!-- /global stylesheets -->
    <!-- Core JS files -->
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/ui/nicescroll.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/ui/drilldown.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/ckfinder/ckfinder.js')}}"></script>

    <!-- /core JS files -->
    <script type="text/javascript">
        var IMG_UPLOAD = '{{url('public/Backend/assets/images/upload_img.png')}}'
    </script>
    <!-- Theme JS files -->
@yield('scripts')
<!-- /theme JS files -->
    <script type="text/javascript" src="{{url('public/Backend/assets/js/scripts.js')}}"></script>

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="{{url('public/Backend/assets/images/logo_light.png')}}" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
					<?php
					$current_user = Auth::guard('admin')->user();
					?>
                    <img src="{{url($current_user->avatar)}}" alt="{{$current_user->fullname}}">
                    <span>{{$current_user->fullname}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{route('admin.users.edit',$current_user->id)}}"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="{{route('admin.logout')}}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Second navbar -->
@include('backend.menu')
<!-- /second navbar -->
@yield('content')
<!-- Footer -->
<div class="footer text-muted">
    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene
        Kopyov</a>
</div>
<!-- /footer -->

</body>
</html>
