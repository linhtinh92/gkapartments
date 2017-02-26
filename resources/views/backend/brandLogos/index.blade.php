@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'brandLogos'}}
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
                    {'bSortable': false, 'aTargets': [0,4]}
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
                    <li><a href="{{route('admin.brandLogos.create')}}" class="btn btn-primary">Create brandLogo <i
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
                            <th>Images</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brandLogos as $brandLogo)
                            <tr>
                                <td>{{$brandLogo->title}}</td>
                                <td>
                                    <img src="{{url($brandLogo->images)}}" width="100px">
                                </td>
								<td>{{$brandLogo->link}}</td>
                                <td>
                                    @if($brandLogo->status == 1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">UnActive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li>
                                            <a href="{{route('admin.brandLogos.edit',$brandLogo->id)}}" data-toggle="tooltip" data-original-title="Edit" title="Edit"> <i class="icon-pencil5"></i> </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" onclick="confirmDelete('{{route('admin.brandLogos.destroy',$brandLogo->id)}}')" data-toggle="tooltip" data-original-title="Delete">
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