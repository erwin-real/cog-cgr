@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Users</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/users">Users</a></li>
                        <li><span>{{$user->first_name}} {{$user->last_name}}</span></li>
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
                            <h4 class="header-title mb-0">User Profile</h4>
                        </div>
                        <div class="ml-5 mt-4">
                            <p> <strong>First Name</strong>: {{ $user->first_name }}</p>
                            <p> <strong>Middle Name</strong>: {{ $user->middle_name ? $user->middle_name : ''}}</p>
                            <p> <strong>Last Name</strong>: {{ $user->last_name }}</p>
                            <p> <strong>Username</strong>: {{ $user->username ? $user->username : 'none'}}</p>
                            <p> <strong>Email</strong>: {{ $user->email ? $user->email : 'none'}}</p>
                            <p> <strong>Leader</strong>: {{ $user->is_leader }}</p>
                            <p> <strong>Active</strong>: {{ $user->is_active }}</p>
                            <p> <strong>Address</strong>: {{ $user->address }}</p>
                            <p> <strong>Cluster Area</strong>: {{ $user->cluster_area }}</p>
                            <p> <strong>Head Cluster Area</strong>: {{ $user->head_cluster_area }}</p>
                            <p> <strong>Birthday</strong>: {{ $user->birthday ? date('M d, Y', strtotime($user->birthday)) : ''}}</p>
                            <p> <strong>Contact</strong>: {{ $user->contact }}</p>
                            <p> <strong>Gender</strong>: {{ $user->gender }}</p>
                            <p> <strong>Group Age</strong>: {{ $user->group_age }}</p>
                            <p> <strong>Journey</strong>: {{ $user->journey }}</p>
                            <p> <strong>CLDP</strong>: {{ $user->cldp }}</p>
                        </div>
                        <div class="buttons-holder mt-4">
                            <a href="{{ action('UserController@edit', $user->id) }}" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="/users/change-password?id={{$user->id}}" class="btn btn-outline-warning float-left mr-2"><i class="fa fa-lock"></i> Change Password</a>
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delUserModal">
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
    <div class="modal fade" id="delUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this user?</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form action="{{ action('UserController@destroy', $user->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection