@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Accounts</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/accounts">Accounts</a></li>
                        <li><span>{{$account->first_name}} {{$account->last_name}}</span></li>
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
                            <p> <strong>First Name</strong>: {{ $account->first_name }}</p>
                            <p> <strong>Middle Name</strong>: {{ $account->middle_name ? $account->middle_name : ''}}</p>
                            <p> <strong>Last Name</strong>: {{ $account->last_name }}</p>
                            <p> <strong>Type</strong>: {{ $account->type }}</p>
                            <p> <strong>Username</strong>: {{ $account->username ? $account->username : 'none'}}</p>
                            <p> <strong>Email</strong>: {{ $account->email ? $account->email : 'none'}}</p>
                            <p> <strong>Leader</strong>: {{ $account->is_leader }}</p>
                            <p> <strong>Active</strong>: {{ $account->is_active }}</p>
                            <p> <strong>Address</strong>: {{ $account->address }}</p>
                            <p> <strong>Cluster Area</strong>: {{ $account->cluster_area }}</p>
                            <p> <strong>Head Cluster Area</strong>: {{ $account->head_cluster_area }}</p>
                            <p> <strong>Birthday</strong>: {{ $account->birthday ? date('M d, Y', strtotime($account->birthday)) : ''}}</p>
                            <p> <strong>Age</strong>: {{ $account->age }} years old</p>
                            <p> <strong>Contact</strong>: {{ $account->contact }}</p>
                            <p> <strong>Gender</strong>: {{ $account->gender }}</p>
                            <p> <strong>Group Age</strong>: {{ $account->group_age }}</p>
                            <p> <strong>Journey</strong>: {{ $account->journey }}</p>
                            <p> <strong>CLDP</strong>: {{ $account->cldp }}</p>
                            <p> <strong>Date Created</strong>: {{ date('D M d, Y h:i a', strtotime($account->created_at)) }}</p>
                            <p> <strong>Date Updated</strong>: {{ date('D M d, Y h:i a', strtotime($account->updated_at)) }}</p>
                        </div>
                        <div class="buttons-holder mt-4">
                            <a href="{{ action('AccountController@edit', $account->id) }}" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="/accounts/change-password?id={{$account->id}}" class="btn btn-outline-warning float-left mr-2"><i class="fa fa-lock"></i> Change Password</a>
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delAccountModal">
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
    <div class="modal fade" id="delAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this account?</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form action="{{ action('AccountController@destroy', $account->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection