@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'roomTypes'}}
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
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
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
                    <li><a href="{{route('admin.roomTypes.index')}}">List roomTypes</a></li>
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
                        <form action="{{route('admin.roomTypes.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="panel panel-white border-top-lg border-top-success-800">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Apartments:</label>
                                                <select name="apartment_id" class="select"
                                                        data-placeholder="Choese Apartments" required>
                                                    <option></option>
                                                    @foreach($apartments as $apartment)
                                                    <option value="{{$apartment->id}}">{{$apartment->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title:</label>
                                                <input type="text" name="title" value="{{old('title')}}"
                                                       class="form-control" placeholder="Enter title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Area:</label>
                                                <input type="text" name="area" value="{{old('area')}}"
                                                       class="form-control" placeholder="Enter Area">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price:</label>
                                                <input type="text" name="price" value="{{old('price')}}"
                                                       class="form-control" placeholder="Enter Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Video:</label>
                                                <input type="text" name="video" value="{{old('video')}}"
                                                       class="form-control" placeholder="Enter Video">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sumary:</label>
                                        <textarea class="form-control"
                                                  name="sumary" rows="4" cols="4">{{old('sumary')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>pay:</label>
                                        <textarea class="form-control ckeditor"
                                                  name="pay">{{old('pay')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>excludes:</label>
                                        <textarea class="form-control ckeditor"
                                                  name="excludes" rows="4" cols="4">{{old('excludes')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>includes:</label>
                                        <textarea class="form-control ckeditor"
                                                  name="includes" rows="4" cols="4">{{old('includes')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-white border-top-lg border-top-success-800">
                                <div class="panel-heading">Images</div>
                                <div class="panel-body">
                                    <div class="box-mul-img">
                                        <div class="form-group">
                                            <p>
                                                <label>Images:</label>
                                                <input type="file" name="images[0][]" required>
                                            </p>
                                            <p>
                                                <label>Title:</label>
                                                <input type="text" name="tilte_img[0][]" value=""
                                                       class="form-control" placeholder="Enter Price" required>
                                            </p>
                                            <hr>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-clone-img">Add <i
                                                    class="icon-plus2 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-white border-top-lg border-top-success-800">
                                <div class="panel-heading">Meta SEO</div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label>Meta Keywords:</label>
                                        <textarea class="form-control"
                                                  name="meta_keywords" rows="4"
                                                  cols="4">{{old('meta_keywords')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description:</label>
                                        <textarea class="form-control"
                                                  name="meta_description" rows="4"
                                                  cols="4">{{old('meta_description')}}</textarea>
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
                                        <a href="{{route('admin.roomTypes.index')}}" style="float: left">
                                            <button type="button" class="btn btn-primary"><i
                                                        class="icon-arrow-left13 position-left"></i>Back
                                            </button>
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
    <script>
    </script>

@stop