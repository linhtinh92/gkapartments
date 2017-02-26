@extends('backend.master')
@section('title')
    {{isset($title) && $title != "" ? $title : 'checkouts'}}
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
                    {'bSortable': false, 'aTargets': [6]}
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
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($checkouts as $checkout)
                            <tr>
                                <td>{{$checkout->fullname}}</td>
                                <td>{{$checkout->phone}}</td>
								<td>{{$checkout->address}}</td>
								<td>{{$checkout->email}}</td>
								<td>{{$checkout->subtotal}}</td>
								<td>{{$checkout->total}}</td>
								<td>{{$checkout->note}}</td>
                                <td>
                                    @if($checkout->status == 1)
                                        <span class="label label-success">Confirmed</span>
                                    @else
                                        <span class="label label-danger">Unconfimred</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li>
                                            <a href="javascript:void(0)" onclick="callAjaxGet('{{route('admin.checkouts.edit',$checkout->id)}}')" data-toggle="tooltip" data-original-title="View" title="View"> <i class="icon-eye"></i> </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" onclick="confirmDelete('{{route('admin.checkouts.destroy',$checkout->id)}}')" data-toggle="tooltip" data-original-title="Delete">
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

<div id="box_conent_modal"></div>
@stop