@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'products'}}
@stop
@section('css')

@stop
@section('scripts')
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/tables/datatables/extensions/responsive.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('public/Backend/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{url('public/Backend/assets/js/pages/datatables_responsive.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "aoColumnDefs": [
                    {'bSortable': false, 'aTargets': [8]}
                ]
            });
        });
    </script>
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
                <ul class="button-create">
                    <li><a href="{{route('admin.products.create')}}" class="btn btn-primary">Create product <i
                                    class="icon-plus-circle2 position-right"></i></a></li>
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
                <!-- Whole row as a control -->
                <div class="panel panel-flat">
                    @include('flash::message')
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Avatar</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>New Product</th>
                            <th>Featured Product</th>
                            <th>Best Seller Product</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->title or ""}}</td>
								<td>
                                    <img src="{{url($product->avatar)}}" width="100px">
                                </td>
                                <td>{{$product->category->title or ""}}</td>
                                <td>{{$product->price or ""}}</td>
                                <td>
                                    @if($product->new_product == 1)
                                        <span class="label label-success">Show</span>
                                    @else
                                        <span class="label label-danger">Hide</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->featured_product == 1)
                                        <span class="label label-success">Show</span>
                                    @else
                                        <span class="label label-danger">Hide</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->bestseller_product == 1)
                                        <span class="label label-success">Show</span>
                                    @else
                                        <span class="label label-danger">Hide</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="label label-success">Show</span>
                                    @else
                                        <span class="label label-danger">Hide</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li>
                                            <a href="{{route('admin.products.edit',$product->id)}}" data-toggle="tooltip" data-original-title="Edit" title="Edit"> <i class="icon-pencil5"></i> </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" onclick="confirmDelete('{{route('admin.products.destroy',$product->id)}}')" data-toggle="tooltip" data-original-title="Delete">
                                                <i class="icon-diff-removed"></i> </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /whole row as a control -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->


@stop