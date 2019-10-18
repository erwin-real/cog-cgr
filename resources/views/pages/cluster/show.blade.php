@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/cluster">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups</a></li>
                        <li><span>{{ $group->leader->first_name }} {{ $group->leader->last_name }}</span></li>
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
                            <h4 class="header-title mb-0">Care Group Details</h4>
                        </div>
                        <div class="ml-5 mt-4">
                            <p> <strong>Leader</strong>:
                                @if($group->leader_id != Auth::id())
                                    <a href="/users/{{$group->leader->id}}">{{ $group->leader->first_name }} {{ $group->leader->last_name }}</a>
                                    {{--<a href="/my-profile/users/{{$group->leader->id}}">{{ $group->leader->first_name }} {{ $group->leader->last_name }}</a>--}}
                                @else
                                    <a href="/my-profile">{{ $group->leader->first_name }} {{ $group->leader->last_name }}</a>
                                @endif
                            </p>
                            <p> <strong>Type</strong>: {{$group->type == 'cg' ? 'Care Group' : 'C2S'}}</p>
                            <p> <strong>Day</strong>: {{ $group->day_cg }}</p>
                            <p> <strong>Time</strong>: {{ date('h:i A', strtotime($group->time_cg)) }}</p>
                            <p> <strong>Venue</strong>: {{ $group->venue }}</p>
                            <p> <strong>Department</strong>: {{ ucfirst($group->department) }}</p>
                            <p> <strong>Department Head</strong>:
                                @if($group->departmentHead)
                                    @if($group->departmentHead->id == Auth::id())
                                        <a href="/my-profile">{{$group->departmentHead->first_name}} {{$group->departmentHead->last_name}}</a>
                                    @else
                                        <a href="/users/{{$group->departmentHead->id}}">{{$group->departmentHead->first_name}} {{$group->departmentHead->last_name}}</a>
                                        {{--<a href="/my-profile/users/{{$group->departmentHead->id}}">{{$group->departmentHead->first_name}} {{$group->departmentHead->last_name}}</a>--}}
                                    @endif
                                @else
                                    <span>none</span>
                                @endif
                            </p>
                            <p> <strong>Cluster Area</strong>: {{ ucfirst($group->cluster_area) }}</p>
                            <p> <strong>Cluster Head</strong>:
                                @if($group->clusterHead)
                                    @if($group->clusterHead->id == Auth::id())
                                        <a href="/my-profile">{{$group->clusterHead->first_name}} {{$group->clusterHead->last_name}}</a>
                                    @else
                                        <a href="/users/{{$group->clusterHead->id}}">{{$group->clusterHead->first_name}} {{$group->clusterHead->last_name}}</a>
                                        {{--<a href="/my-profile/users/{{$group->clusterHead->id}}">{{$group->clusterHead->first_name}} {{$group->clusterHead->last_name}}</a>--}}
                                    @endif
                                @else
                                    <span>none</span>
                                @endif
                            </p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                            <p class="font-weight-bold">Members:</p>
                        </div>

                        <div class="market-status-table">
                            @if ($group->members->isEmpty())
                                <p> There are no members yet.</p>
                            @else
                                {{--{{$accounts->links()}}--}}
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Birthday</th>
                                            <th>Age</th>
                                            <th>Contact</th>
                                            <th>Journey</th>
                                            <th>CLDP</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($group->members as $member)
                                            <tr>
                                                @if($member->id == Auth::id())
                                                    <td><a href="/my-profile">{{$member->first_name}} {{$member->last_name}}</a></td>
                                                @else
                                                    <td><a href="/users/{{$member->id}}">{{$member->first_name}} {{$member->last_name}}</a></td>
                                                    {{--<td><a href="/my-profile/users/{{$member->id}}">{{$member->first_name}} {{$member->last_name}}</a></td>--}}
                                                @endif
                                                <td>{{$member->address}}</td>
                                                <td>{{ $member->birthday ? date('M d, Y', strtotime($member->birthday)) : '' }}</td>
                                                <td>{{$member->age}}</td>
                                                <td>{{$member->contact}}</td>
                                                <td>{{ucfirst($member->journey)}}</td>
                                                <td>{{$member->cldp}}</td>
                                                <td>{{$member->is_active == 1 ? 'Yes' : 'No'}}</td>
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