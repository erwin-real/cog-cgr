@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Profile</h4>
                    <ul class="breadcrumbs pull-left">
                    <li><a href="/my-profile">My Profile</a></li>
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
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> Update Personal Info</h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/my-profile">My Profile Page</a>.</li>
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
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> Change Password</h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/my-profile">My Profile Page</a>.</li>
                                    <li>Click the "Change Password" button.</li>
                                    <li>Fill-up all fields.</li>
                                    <li>Click the "Submit" button.</li>
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