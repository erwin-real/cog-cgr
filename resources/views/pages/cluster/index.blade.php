@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups</h4>
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
                            <h4 class="header-title mb-0">List of {{ucfirst(Auth::user()->head_cluster_area)}} care groups</h4>
                            {{--<a href="/caregroups/create" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Create</a>--}}
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
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Venue</th>
                                            <th>Date Added</th>
                                            <th>Date Modified</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($groups as $group)
                                                <tr>
                                                    <td><a href="/cluster/{{$group->id}}">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                                    <td>{{$group->day_cg}}</td>
                                                    <td>{{ date('h:i A', strtotime($group->time_cg)) }}</td>
                                                    <td>{{$group->venue}}</td>
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