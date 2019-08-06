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
                                            <th>Show</th>
                                            <th>Leader</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Venue</th>
                                            <th>Cluster Area</th>
                                            <th>Date Added</th>
                                            <th>Date Modified</th>
                                            {{--<th>Actions</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($groups as $group)
                                                <tr>
                                                    <td><a href="/caregroups/{{$group->id}}"><i class="fa fa-eye"></i> Show</a></td>
                                                    <td><a href="/users/{{$group->leader_id}}">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                                    <td>{{$group->day_cg}}</td>
                                                    <td>{{ date('h:i A', strtotime($group->time_cg)) }}</td>
                                                    <td>{{$group->venue}}</td>
                                                    <td>{{$group->cluster_area}}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($group->created_at)) }}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($group->updated_at)) }}</td>
                                                    {{--<td>--}}
                                                    {{--<a href="/products/{{$product->id}}/edit"><i class="fa fa-tools"></i></a>--}}
                                                    {{--<a href="/combinations?id={{$product->id}}"><i class="fa fa-cogs"></i></a>--}}
                                                    {{--</td>--}}
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