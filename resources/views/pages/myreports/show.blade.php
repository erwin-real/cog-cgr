@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Reports</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/my-reports">My Reports</a></li>
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
                            <p class="ml-5 mt-0 pt-0">
                                @if($report->date_verified_dh)
                                    Verified by Department Head <br><small> -- {{ date('D M d, Y h:i a', strtotime($report->date_verified_dh)) }}</small>
                                @elseif($report->date_verified_ch)
                                    Verified by Cluster Head <br><small> -- {{ date('D M d, Y h:i a', strtotime($report->date_verified_ch)) }}</small>
                                @else
                                    Submitted to Cluster Head <br><small> -- {{ date('D M d, Y h:i a', strtotime($report->date_submitted)) }}</small>
                                @endif
                            </p>
                        </div>

                        <div class="buttons-holder mt-4">
                            @if($report->date_verified_ch)
                                <span>* You cannot update or delete this report because it has been verified.</span>
                            @else
                                <a href="{{ action('MyReportController@edit', $report->id) }}" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>
                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delReportModal">
                                    <i class="fa fa-trash fa-sm fa-fw"></i>
                                    Delete
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE Modal-->
    <div class="modal fade" id="delReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Report?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this report?</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form action="{{ action('MyReportController@destroy', $report->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection