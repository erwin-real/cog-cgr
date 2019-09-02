@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_department)}} Reports</h4>
                    <ul class="breadcrumbs pull-left"></ul>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">List of {{isset($status) ? $status: ''}} {{ucfirst(Auth::user()->head_department)}} Reports</h4>
                            <a class="btn btn-outline-info" href="/guides/reports"><i class="fa fa-question"></i>&nbsp; Guide</a>

                        </div>
                        <div class="market-status-table mt-4">
                            @if ($reports->isEmpty())
                                <p> There are no reports yet.</p>
                            @else

                                <strong>Filter: </strong>
                                <a href="/reports?status=unverified">Unverified Reports</a> |
                                <a href="/reports?status=verified">Verified Reports</a> |
                                <a href="/reports">All</a><br><br>

                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>Leader</th>
                                                <th>Cluster Area</th>
                                                <th>Department</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Date Submitted</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reports as $report)
                                                @if(
                                                (isset($status) && $status == "Unverified" && !$report->date_verified_dh) ||
                                                (isset($status) && $status == "Verified" && $report->date_verified_dh) ||
                                                (!isset($status))
                                                )
                                                    <tr>
                                                        <td><a href="/reports/{{$report->id}}">{{$report->leader->first_name}} {{$report->leader->last_name}}</a></td>
                                                        <td>{{ucfirst($report->cluster_area)}}</td>
                                                        <td>{{ucfirst($report->group->department)}}</td>
                                                        <td>{{count(explode(",", $report->present))}}</td>
                                                        <td>{{count(explode(",", $report->absent))}}</td>
                                                        <td>{{ date('D M d, Y h:i a', strtotime($report->date_submitted)) }}</td>
                                                        <td>
                                                            @if($report->deleted_at)
                                                                Checked by Admin
                                                            @elseif($report->date_verified_dh)
                                                                Verified by Department Head
                                                            @elseif($report->date_verified_ch)
                                                                Verified by Cluster Head
                                                            @else
                                                                Submitted to Cluster Head
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{--{{$reports->links()}}--}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection