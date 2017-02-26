@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'locations'}}
@stop
@section('css')

@stop
@section('scripts')
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/uploaders/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/uploader_bootstrap.js')}}"></script>
@stop
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{$title}}</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('admin.dashboards.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.locations.index')}}">List locations</a></li>
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
                        <form action="{{route('admin.locations.update',$location->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">
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
                                        <label>Title:</label>
                                        <input type="text" name="title" value="{{old('title',isset($location) ? $location->title : '')}}"
                                               class="form-control" placeholder="Title location" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Parent Category:</label>
                                        <select class="select" name="parent">
                                            <option value="0">--Parent--</option>
                                            <?php
                                            if (count($selects)) {
                                                foreach ($selects as $key => $value) {
                                                    $select = $value['id'] == $location->parent ? "selected" : "";
                                                    if ($value['level'] == 1) {
                                                        echo '<option value="' . $value['id'] . '" '.$select.'>' . $value['title'] . '</option>';
                                                    } else {
                                                        $name = str_repeat('-', ($value['level'] - 1) * 2) . $value['title'];
                                                        echo '<option value="' . $value['id'] . '" '.$select.'>' . $name . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Type Location:</label>
                                        <input type="text" name="type" value="{{old('type',isset($location) ? $location->type : '')}}"
                                               class="form-control">
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('admin.locations.index')}}" style="float: left">
                                            <button type="button" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i>Back </button>
                                        </a>
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