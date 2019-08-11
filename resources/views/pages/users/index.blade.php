@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Users</h4>
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
                            <h4 class="header-title mb-0">List of users</h4>
                            <a href="/users/create" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Create</a>
                        </div>
                        <div class="market-status-table mt-4">
                            @if ($users->isEmpty())
                                <p> There are no users yet.</p>
                            @else
                                {{--{{$users->links()}}--}}
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                {{--<th>Name</th>--}}
                                                {{--<th>Cluster Area</th>--}}
                                                {{--<th>Type</th>--}}
                                                {{--<th>Active</th>--}}
                                                {{--<th>Date Added</th>--}}
                                                {{--<th>Date Modified</th>--}}

                                                <th>@sortablelink('first_name', 'Name',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('cluster_area', 'Cluster Area',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('type', 'Type',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('is_active', 'Active',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('created_at', 'Date Added',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                                <th>@sortablelink('updated_at', 'Date Modified',[],['style' => 'text-decoration: none;', 'rel' => 'nofollow'])</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td><a href="/users/{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a></td>
                                                    <td>{{ucfirst($user->cluster_area)}}</td>

                                                    @if($user->type == 'cluster head')
                                                        <td>{{ucfirst($user->type)}} - {{ucfirst($user->head_cluster_area)}}</td>
                                                    @else
                                                        <td>{{ucfirst($user->type)}}</td>
                                                    @endif

                                                    <td>{{ucfirst($user->is_active == 1 ? 'Yes' : 'No')}}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($user->created_at)) }}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($user->updated_at)) }}</td>
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