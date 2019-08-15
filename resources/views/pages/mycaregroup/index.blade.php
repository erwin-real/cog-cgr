@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Care Group</h4>
                    <ul class="breadcrumbs pull-left">
                        {{--<li><a href="index.html">Home</a></li>--}}
                        {{--<li><span>Dashboard</span></li>--}}
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')

        </div>
    </div>

    <div class="main-content-inner">
        @include('includes.messages')

        @foreach($user->groups as $group)
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="header-title mb-0">My Care Group Details</h4>
                            </div>
                            <div class="ml-5 my-4">

                                {{-- BASIC INFO --}}
                                <p> <strong>Care Group Leader</strong>:
                                    @if($group->leader_id != Auth::id())
                                        <a href="/my-profile/users/{{$group->leader->id}}">{{ $group->leader->first_name }} {{ $group->leader->last_name }}</a>
                                    @else
                                        <a href="/my-profile">{{ $group->leader->first_name }} {{ $group->leader->last_name }}</a>
                                    @endif
                                </p>
                                <p> <strong>Day</strong>: {{ $group->day_cg }}</p>
                                <p> <strong>Time</strong>: {{ date('h:i A', strtotime($group->time_cg)) }}</p>
                                <p> <strong>Venue</strong>: {{ $group->venue }}</p>
                                <p> <strong>Cluster Area</strong>: {{ ucfirst($group->cluster_area) }}</p>
                                <p> <strong>Cluster Head</strong>:
                                    @if($group->clusterHead)
                                        @if($group->clusterHead->id == Auth::id())
                                            <a href="/my-profile">{{$group->clusterHead->first_name}} {{$group->clusterHead->last_name}}</a>
                                        @else
                                            <a href="/my-profile/users/{{$group->clusterHead->id}}">{{$group->clusterHead->first_name}} {{$group->clusterHead->last_name}}</a>
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
                                                        <td><a href="/my-profile/users/{{$member->id}}">{{$member->first_name}} {{$member->last_name}}</a></td>
                                                    @endif
                                                    <td>{{$member->address}}</td>
                                                    <td>{{$member->birthday ? date('M d, Y', strtotime($member->birthday)) : ''}}</td>
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

                            <div class="buttons-holder mt-4">
                                <a href="{{ action('MyCareGroupController@edit', $group->id) }}" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>


                                @if(count($group->members) > 0)
                                    <a href="/reports/create?cg_id={{$group->id}}" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-plus"></i> Create Report</a>
                                @endif
                                {{--<button class="btn btn-outline-danger" data-toggle="modal" data-target="#delGroupModal">--}}
                                    {{--<i class="fa fa-trash fa-sm fa-fw"></i>--}}
                                    {{--Delete--}}
                                {{--</button>--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection