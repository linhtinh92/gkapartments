@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'promotions'}}
@stop
@section('css')

@stop
@section('scripts')
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/uploaders/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/uploader_bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/editor_ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/app.js')}}"></script>
@stop
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{$title}}</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('admin.dashboards.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.promotions.index')}}">List promotions</a></li>
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
                        <form action="{{route('admin.promotions.store')}}" method="post" enctype="multipart/form-data">
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
                                        <label>Title:</label>
                                        <input type="text" name="title" value="{{old('title')}}"
                                               class="form-control" placeholder="Title promotion Us" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Sumary:</label>
                                        <textarea class="form-control" name="sumary" rows="4" cols="4" >{{old('sumary')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Content:</label>
                                        <textarea class="form-control"
                                                  name="content" id="editor-full" rows="4" cols="4" >{{old('content')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Avatar:</label>
                                        <input type="file" class="file-input" name="avatar" required data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg" data-remove-class="btn btn-default btn-lg">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Desscription:</label>
                                        <textarea class="form-control" name="meta_description" rows="4" cols="4" >{{old('meta_description')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords:</label>
                                        <textarea class="form-control" name="meta_keywords" rows="4" cols="4" >{{old('meta_keywords')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Status:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled" checked="checked"
                                                   value="1">
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled" value="0">
                                            Hide
                                        </label>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('admin.promotions.index')}}" style="float: left">
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