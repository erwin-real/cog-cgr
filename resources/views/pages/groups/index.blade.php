@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Care Groups</h4>
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
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">List of care groups</h4>
                            <a href="/caregroups/create" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Create</a>
                            <a href="/guides/caregroups" class="btn btn-outline-info"><i class="fa fa-question"></i> Guide</a>
                        </div>
                        <h6>Total : {{count($groups)}}</h6>
                        <div class="market-status-table mt-4">
                            @if ($groups->isEmpty())
                                <p> There are no care groups yet.</p>
                            @else
                                {{--{{$accounts->links()}}--}}
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                {{--<th>Leader</th>--}}
                                                {{--<th>Members</th>--}}
                                                {{--<th>Active</th>--}}
                                                {{--<th>Day</th>--}}
                                                {{--<th>Time</th>--}}
                                                {{--<th>Venue</th>--}}
                                                {{--<th>Cluster Area</th>--}}
                                                {{--<th>Date Added</th>--}}
                                                {{--<th>Date Modified</th>--}}

                                                <th>@sortablelink('leader.first_name', 'Leader',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('department', 'Department',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('type', 'Type',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>Members</th>
                                                <th>Active</th>
                                                <th>@sortablelink('day_cg', 'Day',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('time_cg', 'Time',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('venue', 'Venue',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('cluster_area', 'Cluster Area',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('created_at', 'Date Added',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('updated_at', 'Date Modified',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($groups as $group)
                                                <tr>
                                                    @if($group->leader_id == Auth::id())
                                                        <td><a href="/my-care-group">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                                    @else
                                                        <td><a href="/caregroups/{{$group->id}}">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                                    @endif
                                                    <td>{{ucfirst($group->department)}}</td>
                                                    <td>{{$group->type == 'cg' ? 'Care Group' : 'C2S'}}</td>
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