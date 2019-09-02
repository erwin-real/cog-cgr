@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Reports</h4>
                    <ul class="breadcrumbs pull-left">
                    <li><a href="/reports">Reports</a></li>
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
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> View a report</h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/reports">Reports Page</a>.</li>
                                    <li>Click the name of the care group leader in the table.</li>
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
                                <h4 class="header-title"><i class="fa fa-check text-success"></i>
                                    {{Auth::user()->type == 'admin' ? 'Check' : 'Verify'}} a report
                                </h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/reports">Reports Page</a>.</li>
                                    <li>Click the name of the care group leader in the table.</li>
                                    @if(Auth::user()->type == 'admin')
                                        <li>Click the "Check" button at the bottom.</li>
                                    @else
                                        <li>Fill-up the Remarks field (Optional)</li>
                                        <li>Click the "Verify" button at the bottom.</li>
                                    @endif
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