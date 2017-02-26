@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'sliders'}}
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
                    <li><a href="{{route('admin.sliders.index')}}">List sliders</a></li>
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
                        <form action="{{route('admin.sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
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
                                        <input type="text" name="title" value="{{old('title',isset($slider) ? $slider->title : '')}}"
                                               class="form-control" placeholder="Title slider" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
										<textarea class="form-control" name="description" >{{old('description',isset($slider) ? $slider->description : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Images:</label>
                                        <div class="file-preview file-preview-edit">
                                            <div class="close fileinput-remove" id="fileinput_remove_a">×</div>
                                            <div class="file-drop-disabled">
                                                <div class="file-preview-thumbnails">

                                                    <div class="file-preview-frame" id="preview-1481647975231-0" data-fileindex="0">
                                                        <img src="{{url($slider->images)}}" class="file-preview-image" style="width:auto;height:160px;">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                                                <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                                            </div>
                                        </div>
                                        <input type="file" class="file-input" name="images" value="" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg" data-remove-class="btn btn-default btn-lg">
                                        <input type="hidden" name="temp_images" value="{{$slider->images or ""}}">
                                    </div>
									<div class="form-group">
                                        <label>Link:</label>
                                        <input type="text" name="link" value="{{old('link',isset($slider) ? $slider->link : '')}}"
                                               class="form-control" placeholder="Link slider">
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Status:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled" {{isset($slider) && $slider->status == 1 ? 'checked' : ''}}
                                                   value="1">
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled" value="0" {{isset($slider) && $slider->status == 0 ? 'checked' : ''}}>
                                            Hide
                                        </label>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('admin.sliders.index')}}" style="float: left">
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