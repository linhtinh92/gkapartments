@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'products'}}
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
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/uploaders/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/uploader_bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/editor_ckeditor.js')}}"></script>
@stop
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{$title}}</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('admin.dashboards.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.products.index')}}">List products</a></li>
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
                        <form action="{{route('admin.products.update',$product->id)}}" method="post"
                              enctype="multipart/form-data">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title:</label>
                                                <input type="text" name="title"
                                                       value="{{old('title',isset($product) ? $product->title : '')}}"
                                                       class="form-control" placeholder="Title product" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Parent Category:</label>
                                                <select class="select" name="cate_id">
                                                    <option value="0">--Parent--</option>
                                                    <?php
                                                    if (count($selects)) {
                                                        foreach ($selects as $key => $value) {
                                                            $select = $value['id'] == $product->cate_id ? "selected" : "";
                                                            if ($value['level'] == 1) {
                                                                echo '<option value="' . $value['id'] . '" ' . $select . '>' . $value['title'] . '</option>';
                                                            } else {
                                                                $name = str_repeat('-', ($value['level'] - 1) * 2) . $value['title'];
                                                                echo '<option value="' . $value['id'] . '" ' . $select . '>' . $name . '</option>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price:</label>
                                                <input type="text" name="price"
                                                       value="{{old('price',isset($product) ? $product->price : 0)}}"
                                                       class="form-control" placeholder="Price Product">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price Sale:</label>
                                                <input type="text" name="price_sale"
                                                       value="{{old('price_sale',isset($product) ? $product->price_sale : 0)}}"
                                                       class="form-control show-add-media-popup"
                                                       placeholder="Price Sale Product">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control"
                                                  name="description" rows="4"
                                                  cols="4">{{old('description',isset($product) ? $product->description : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Content:</label>
                                        <textarea class="form-control"
                                                  name="content" id="editor-full" rows="4"
                                                  cols="4">{{old('content',isset($product) ? $product->content : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Avatar:</label>
                                        <div class="file-preview file-preview-edit">
                                            <div class="close fileinput-remove" id="fileinput_remove_a">×</div>
                                            <div class="file-drop-disabled">
                                                <div class="file-preview-thumbnails">

                                                    <div class="file-preview-frame" id="preview-1481647975231-0"
                                                         data-fileindex="0">
                                                        <img src="{{url($product->avatar)}}" class="file-preview-image"
                                                             style="width:auto;height:160px;">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <input type="file" class="file-input" name="avatar" data-show-caption="false"
                                               data-show-upload="false" data-browse-class="btn btn-primary btn-md"
                                               data-remove-class="btn btn-default btn-md">
                                        <input type="hidden" name="temp_images" value="{{$product->avatar or ""}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Multi Images</label><br>
                                        <div id="load_data_img" class="btn click-add-item" data-value='{
                                        "0":{"name":"meta_value[]","selector":"img","placeholder":"Value"},
                                        "1":{"name":"meta_key[]","selector":"input","placeholder":"Key","type":"text"},
                                        "2":{"name":"meta_type[]","selector":"input","placeholder":"Key","type":"hidden", "value":"img"}}'>
                                            Add item
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Meta</label><br>
                                        <div id="load_data_text" class="btn click-add-item" data-value='{
                                        "0":{"name":"meta_key[]","selector":"input","placeholder":"Key","type":"text"},
                                        "1":{"name":"meta_value[]","selector":"input","placeholder":"Value","type":"text"},
                                        "2":{"name":"meta_type[]","selector":"input","placeholder":"Key","type":"hidden", "value":"text"}}'>
                                            Add item
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Title:</label>
                                        <input type="text" name="site_title"
                                               value="{{old('site_title',isset($product) ? $product->site_title : '')}}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Site Keyword:</label>
                                        <textarea class="form-control"
                                                  name="site_keyword">{{old('site_keyword',isset($product) ? $product->site_keyword : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Description:</label>
                                        <textarea class="form-control"
                                                  name="site_description">{{old('site_description',isset($product) ? $product->site_description : '')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">New Product:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="new_product" class="styled"
                                                   value="1" {{isset($product) && $product->new_product == 1 ? 'checked' : ''}}>
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="new_product" class="styled" value="0"
                                                    {{isset($product) && $product->new_product == 0 ? 'checked' : ''}}>
                                            Hide
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Featured Product:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="featured_product" class="styled"
                                                   value="1" {{isset($product) && $product->featured_product == 1 ? 'checked' : ''}}>
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="featured_product" class="styled" value="0"
                                                    {{isset($product) && $product->featured_product == 0 ? 'checked' : ''}}>
                                            Hide
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Best Seller Product:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="bestseller_product" class="styled"
                                                   value="1" {{isset($product) && $product->bestseller_product == 1 ? 'checked' : ''}}>
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="bestseller_product" class="styled" value="0"
                                                    {{isset($product) && $product->bestseller_product == 0 ? 'checked' : ''}}>
                                            Hide
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="display-block">Status:</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled"
                                                   {{isset($product) && $product->status == 1 ? 'checked' : ''}}
                                                   value="1">
                                            Show
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="status" class="styled"
                                                   value="0" {{isset($product) && $product->status == 0 ? 'checked' : ''}}>
                                            Hide
                                        </label>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('admin.products.index')}}" style="float: left">
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

    <script>
        $(document).ready(function () {
            loadDataImg('{!! $product_meta !!}');
            loadDataText('{!! $product_meta !!}');
        });
    </script>
@stop