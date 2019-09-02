@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_cluster_area)}} Care Group</h4>
                    <ul class="breadcrumbs pull-left">
                    <li><a href="/cluster">{{ucfirst(Auth::user()->head_cluster_area)}} Care Group</a></li>
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
                                <h4 class="header-title"><i class="fa fa-check text-success"></i> View a {{ucfirst(Auth::user()->head_cluster_area)}} care group</h4>
                            </div>
                            <div class="ml-5">
                                <ol>
                                    <li>Go to <a href="/cluster">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups Page</a>.</li>
                                    <li>Simply click the name of the care group leader in the table.</li>
                                    <li>Finish!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="col-md-6 mt-4">--}}
                    {{--<div class="card shadow">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="d-sm-flex justify-content-between align-items-center">--}}
                                {{--<h4 class="header-title"><i class="fa fa-check text-success"></i> Create a care group</h4>--}}
                            {{--</div>--}}
                            {{--<div class="ml-5">--}}
                                {{--<ol>--}}
                                    {{--<li>Go to <a href="/department">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups Page</a>.</li>--}}
                                    {{--<li>Click the "Create" button.</li>--}}
                                    {{--<li>Fill-up all fields.</li>--}}
                                    {{--<li>Click the "Save" button.</li>--}}
                                    {{--<li>Finish!</li>--}}
                                {{--</ol>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-6 mt-4">--}}
                    {{--<div class="card shadow">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="d-sm-flex justify-content-between align-items-center">--}}
                                {{--<h4 class="header-title"><i class="fa fa-check text-success"></i> Update a care group</h4>--}}
                            {{--</div>--}}
                            {{--<div class="ml-5">--}}
                                {{--<ol>--}}
                                    {{--<li>Go to <a href="/department">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups Page</a>.</li>--}}
                                    {{--<li>Click the name of the care group leader in the table.</li>--}}
                                    {{--<li>Click the "Edit" button.</li>--}}
                                    {{--<li>Fill-up all desired fields.</li>--}}
                                    {{--<li>Click the "Save" button.</li>--}}
                                    {{--<li>Finish!</li>--}}
                                {{--</ol>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-6 mt-4">--}}
                    {{--<div class="card shadow">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="d-sm-flex justify-content-between align-items-center">--}}
                                {{--<h4 class="header-title"><i class="fa fa-check text-success"></i> Delete a care group</h4>--}}
                            {{--</div>--}}
                            {{--<div class="ml-5">--}}
                                {{--<ol>--}}
                                    {{--<li>Go to <a href="/department">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups Page</a>.</li>--}}
                                    {{--<li>Click the name of the care group leader in the table.</li>--}}
                                    {{--<li>Click the "Delete" button.</li>--}}
                                    {{--<li>Click "Delete" button in the alertbox that will show up for confirmation.</li>--}}
                                    {{--<li>Finish!</li>--}}
                                {{--</ol>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>

        </div>
    </div>
@endsection