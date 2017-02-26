@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'categories'}}
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
                    <li><a href="{{route('admin.categories.index')}}">List categories</a></li>
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
                        <form action="{{route('admin.categories.update',$categorie->id)}}" method="post" enctype="multipart/form-data">
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
                                        <input type="text" name="title" value="{{old('title',isset($categorie) ? $categorie->title : '')}}"
                                               class="form-control" placeholder="Title categorie" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Parent Category:</label>
                                        <select class="select" name="parent">
                                            <option value="0">--Parent--</option>
                                            <?php
                                            if (count($selects)) {
                                                foreach ($selects as $key => $value) {
                                                    $select = $value['id'] == $categorie->parent ? "selected" : "";
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
                                        <label>Site Title:</label>
                                        <input type="text" name="site_title" value="{{old('site_title',isset($categorie) ? $categorie->site_title : '')}}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Site Keyword:</label>
                                        <textarea class="form-control" name="site_keyword" >{{old('site_keyword',isset($categorie) ? $categorie->site_keyword : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Description:</label>
                                        <textarea class="form-control" name="site_description" >{{old('site_description',isset($categorie) ? $categorie->site_description : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Status:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled" {{isset($categorie) && $categorie->status == 1 ? 'checked' : ''}}
                                                   value="1">
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled" value="0" {{isset($categorie) && $categorie->status == 0 ? 'checked' : ''}}>
                                            Hide
                                        </label>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('admin.categories.index')}}" style="float: left">
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