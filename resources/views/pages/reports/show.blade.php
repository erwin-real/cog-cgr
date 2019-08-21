@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">

                    @if(Auth::user()->type == 'admin' || Auth::user()->type == 'master')
                        <h4 class="page-title pull-left">All Reports</h4>
                    @elseif(Auth::user()->type == 'department head')
                        <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_department)}} Reports</h4>
                    @elseif(Auth::user()->type == 'cluster head')
                        <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_cluster_area)}} Reports</h4>
                    @endif

                    <ul class="breadcrumbs pull-left">
                        <li>
                            <a href="/reports">
                                @if(Auth::user()->type == 'admin' || Auth::user()->type == 'master')
                                    All Reports
                                @elseif(Auth::user()->type == 'department head')
                                    {{ucfirst(Auth::user()->head_department)}} Reports
                                @elseif(Auth::user()->type == 'cluster head')
                                    {{ucfirst(Auth::user()->head_cluster_area)}} Reports
                                @endif
                            </a>
                        </li>
                        <li><a href="#">{{$report->group->day_cg}} {{ date('h:i A', strtotime($report->group->time_cg)) }}</a></li>
                        <li><span>{{$report->id}}</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>

    <div class="main-content-inner">
        @include('includes.messages')
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Report Details</h4>
                        </div>
                        <div class="ml-5 mt-4">
                            <p> <strong>Leader</strong>:
                                @if($report->leader_id != Auth::id())
                                    <a href="/my-profile/users/{{$report->leader->id}}">{{ $report->leader->first_name }} {{ $report->leader->last_name }}</a>
                                @else
                                    <a href="/my-profile">{{ $report->leader->first_name }} {{ $report->leader->last_name }}</a>
                                @endif
                            </p>
                            <p> <strong>Day</strong>: {{ $report->day_cg }}</p>
                            <p> <strong>Time</strong>: {{ date('h:i A', strtotime($report->time_cg)) }}</p>
                            <p> <strong>Venue</strong>: {{ $report->venue }}</p>
                            <p> <strong>Cluster Area</strong>: {{ ucfirst($report->cluster_area) }}</p>
                            <p> <strong>Department</strong>: {{ ucfirst($report->department) }}</p>
                            <p> <strong>Offering</strong>: {{ $report->offering ? $report->offering : 'None' }}</p>
                            <p> <strong>Date Submitted</strong>: {{ date('D M d, Y h:i a', strtotime($report->date_submitted)) }}</p>
                        </div>

                        <div class="row ml-5">
                            <div class="col-sm-12 col-md-3">
                                <p class="font-weight-bold">Present:</p>
                                @if(count($presents) == 0)
                                    <span>none</span>
                                @else
                                    <ol class="ml-4">
                                        @foreach($presents as $present)
                                            @if($present->id == Auth::id())
                                                <li><a href="/my-profile">{{$present->first_name}} {{$present->last_name}}</a></li>
                                            @else
                                                <li><a href="/my-profile/users/{{$present->id}}">{{$present->first_name}} {{$present->last_name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <p class="font-weight-bold">Absent:</p>
                                @if(count($absents) == 0)
                                    <span>none</span>
                                @else
                                    <ol class="ml-4">
                                        @foreach($absents as $absent)
                                            @if($absent->id == Auth::id())
                                                <li><a href="/my-profile">{{$absent->first_name}} {{$absent->last_name}}</a></li>
                                            @else
                                                <li><a href="/my-profile/users/{{$absent->id}}">{{$absent->first_name}} {{$absent->last_name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 mb-3">
                            <p class="font-weight-bold">Consolidation Report:</p><br>
                            <p class="ml-5">
                                @php
                                    echo nl2br($report->consolidation_report)
                                @endphp
                            </p>
                        </div>

                        <div class="mt-4">
                            <p class="font-weight-bold">Status:</p><br>


                            <div class="ml-5">
                                @if(!$report->date_verified_dh && !$report->date_verified_ch)
                                    Submitted to Cluster Head <br><small> -- {{ date('D M d, Y h:i a', strtotime($report->date_submitted)) }}</small>
                                @else
                                    @if($report->date_verified_ch)
                                        <p> <strong>Verified by:</strong> {{$report->clusterHead->first_name}} {{$report->clusterHead->last_name}} - {{ucfirst($report->cluster_area)}} Cluster Head</p>

                                            <strong>Remarks:</strong>
                                            <p class="ml-2">
                                                @php
                                                    echo nl2br($report->comment_ch)
                                                @endphp
                                            </p>
                                        <p> <strong>Date Verified</strong>: {{ date('D M d, Y h:i a', strtotime($report->date_verified_ch)) }}</p>
                                        <br><br>
                                    @endif
                                    @if($report->date_verified_dh)
                                            <p> <strong>Verified by:</strong> {{$report->departmentHead->first_name}} {{$report->departmentHead->last_name}} - {{ucfirst($report->cluster_area)}} Department Head</p>
                                            <strong>Remarks:</strong>
                                            <p class="ml-2">
                                                @php
                                                    echo nl2br($report->comment_dh)
                                                @endphp
                                            </p>
                                            <p> <strong>Date Verified</strong>: {{ date('D M d, Y h:i a', strtotime($report->date_verified_dh)) }}</p>
                                            <br><br>
                                    @endif
                                @endif
                            </div>

                        </div>

                        @if(Auth::user()->type == 'cluster head' && !$report->date_verified_ch && $report->clusterHead->id == Auth::id())
                            @include('pages.reports.form')
                        @elseif(Auth::user()->type == 'department head' && !$report->date_verified_dh && $report->date_verified_ch && $report->departmentHead->id == Auth::id())
                            @include('pages.reports.form')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection