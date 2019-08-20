@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_department)}} Care Groups</h4>
                    <ul class="breadcrumbs pull-left">
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">List of {{ucfirst(Auth::user()->head_department)}} care groups</h4>
                            <a href="/department/create" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Create</a>
                            {{--<select class="custome-select border-0 pr-3">--}}
                                {{--<option selected>Last 24 Hours</option>--}}
                                {{--<option value="0">01 July 2018</option>--}}
                            {{--</select>--}}
                        </div>
                        <div class="market-status-table mt-4">
                            @if ($groups->isEmpty())
                                <p> There are no care groups yet.</p>
                            @else
                                {{--{{$accounts->links()}}--}}
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>Leader</th>
                                                <th>Department</th>
                                                <th>Members</th>
                                                <th>Active</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th>Venue</th>
                                                <th>Cluster Area</th>
                                                <th>Date Added</th>
                                                <th>Date Modified</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($groups as $group)
                                                <tr>
                                                    @if($group->leader_id == Auth::id())
                                                        <td><a href="/my-care-group">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                                    @else
                                                        <td><a href="/department/{{$group->id}}">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                                    @endif
                                                    <td>{{ucfirst($group->department)}}</td>
                                                    <td>{{count($group->members)}}</td>
                                                    <td>{{count($group->activeMembers)}}</td>
                                                    <td>{{$group->day_cg}}</td>
                                                    <td>{{ date('h:i A', strtotime($group->time_cg)) }}</td>
                                                    <td>{{ucfirst($group->venue)}}</td>
                                                    <td>{{ucfirst($group->cluster_area)}}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($group->created_at)) }}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($group->updated_at)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection