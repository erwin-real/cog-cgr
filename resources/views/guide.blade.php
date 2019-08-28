@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Guide</h4>
                    <ul class="breadcrumbs pull-left">
                        {{--<li><a href="index.html">Home</a></li>--}}
                        {{--<li><span>Dashboard</span></li>--}}
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        <div class="sales-report-area mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-report mb-xs-30 shadow">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                Work in progress
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection