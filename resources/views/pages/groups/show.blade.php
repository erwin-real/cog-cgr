@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Care Groups</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/caregroups">Care Groups</a></li>
                        <li><span>{{$group->id}}</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')
        </div>
    </div>

    <div class="main-content-inner">
        @include('includes.messages')
        <div class="row mt-5 mb-5">
            <div class="col-md-6 col-sm-9">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Care Group Info</h4>
                        </div>
                        <div class="ml-5 mt-4">
                            <p> <strong>Leader</strong>: {{ $group->leader->first_name }} {{ $group->leader->last_name }}</p>
                            <p> <strong>Day</strong>: {{ $group->day_cg }}</p>
                            <p> <strong>Time</strong>: {{ date('h:i A', strtotime($group->time_cg)) }}</p>
                            <p> <strong>Venue</strong>: {{ $group->venue }}</p>
                            <p> <strong>Cluster Area</strong>: {{ $group->cluster_area }}</p>
                        </div>
                        <div class="buttons-holder mt-4">
                            <a href="{{ action('GroupController@edit', $group->id) }}" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delGroupModal">
                                <i class="fa fa-trash fa-sm fa-fw"></i>
                                Delete
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE Modal-->
    <div class="modal fade" id="delGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Care Group?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this care group?</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form action="{{ action('GroupController@destroy', $group->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection