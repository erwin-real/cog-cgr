@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Reports</h4>
                    <ul class="breadcrumbs pull-left">
                    <li><a href="/my-reports">My Reports</a></li>
                    <li><span>Guide</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        <div class="sales-report-area mb-5">

            <div class="row">

                <div class="col-md-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> View my care group report</h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/my-reports">My Reports Page</a>.</li>
                                    <li>Simply click the date and time of care group in the table.</li>
                                    <li>Finish!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> Create My Care Group Report</h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/my-care-group">My Care Group Page</a>.</li>
                                    <li>Click the "Create Report" button inside one care group.</li>
                                    <li>Fill all required, (with <span class="text-danger">*</span>), fields.</li>
                                    <li>Click the "Save" button.</li>
                                    <li>Finish!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="align-items-center">
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> Update My Care Group Report</h4>
                                <p class="text-info">Note: You cannot update your report if it's already verified by your cluster head.</p>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/my-reports">My Reports Page</a>.</li>
                                    <li>Simply click the date and time of care group in the table.</li>
                                    <li>Click the "Edit" button.</li>
                                    <li>Update all desired fields.</li>
                                    <li>Click the "Save" button.</li>
                                    <li>Finish!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="align-items-center">
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> Delete My Care Group Report</h4>
                                <p class="text-info">Note: You cannot delete your report if it's already verified by your cluster head.</p>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/my-reports">My Reports Page</a>.</li>
                                    <li>Simply click the date and time of care group in the table.</li>
                                    <li>Click the "Delete" button.</li>
                                    <li>Click "Delete" button in the alertbox that will show up for confirmation.</li>
                                    <li>Finish!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection