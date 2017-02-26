@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'configs'}}
@stop
@section('css')

@stop
@section('scripts')
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/libraries/jasny_bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/libraries/jquery_ui/core.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/selects/selectboxit.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/tags/tokenfield.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/inputs/touchspin.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/inputs/maxlength.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/inputs/formatter.min.js')}}"></script>

    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/uploaders/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/uploader_bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/form_floating_labels.js')}}"></script>
@stop
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{$title}}</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('admin.dashboards.dashboard')}}">Dashboard</a></li>
                    <li class="active">{{$title}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Basic legend -->
                        <form action="{{route('admin.configs.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    @include('flash::message')
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Title Web:</label>
                                        <input type="text" name="site_title" value="{{ $result['site_title'] or '' }}"
                                               class="form-control" placeholder="Title website" required>
                                    </div>
                                    <div class="form-group">
                                        <label>TagLine:</label>
                                        <input type="text" name="tag_line" value="{{ $result['tag_line'] or '' }}"
                                               class="form-control" placeholder="" >
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords:</label>
                                        <input type="text" class="tags-input" name="site_keyword" value="{{ $result['site_keyword'] or '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description:</label>
                                        <textarea class="form-control" rows="4" name="site_description" required>{{ $result['site_description'] or '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name:</label>
                                        <input type="text" class="form-control" name="company_name" value="{{ $result['company_name'] or '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email receives feedback from clients:</label>
                                        <input type="email" name="email_receives_feedback" value="{{ $result['email_receives_feedback'] or '' }}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        <input type="text" class="form-control" name="phone_number" value="{{ $result['phone_number'] or '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" name="address" value="{{ $result['address'] or '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude:</label>
                                        <input type="text" class="form-control" name="longitude" value="{{ $result['longitude'] or '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude:</label>
                                        <input type="text" class="form-control" name="latitude" value="{{ $result['latitude'] or '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Maps API Key:</label>
                                        <input type="text" class="form-control" name="maps_api_key" value="{{ $result['maps_api_key'] or '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Money:</label>
                                        <input type="text" name="sub_money" value="{{ $result['sub_money'] or '' }}"
                                               class="form-control" placeholder="" >
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit form <i
                                                    class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /basic legend -->

                    </div>
                </div>
                <!-- /fieldset legend -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->


@stop