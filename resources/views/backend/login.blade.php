<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Backend</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{url('public/Backend/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('public/Backend/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/ui/nicescroll.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/ui/drilldown.js')}}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="/"><img src="{{url('public/Backend/assets/images/logo_light.png')}}" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Simple login form -->
            <form action="{{route('admin.postLogin')}}" method="post">
				{!! csrf_field() !!}
                <div class="panel panel-body login-form">
                    @include('flash::message')
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group">Login to your account
                            <small class="display-block">Enter your credentials below</small>
                        </h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                    class="icon-circle-right2 position-right"></i></button>
                    </div>
                </div>
            </form>
            <!-- /simple login form -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="footer text-muted text-center">
    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene
        Kopyov</a>
</div>
<!-- /footer -->

</body>
</html>
