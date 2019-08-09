@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Profile</h4>
                    {{--<ul class="breadcrumbs pull-left">--}}
                        {{--<li><a href="/users">Users</a></li>--}}
                        {{--<li><span>{{$user->first_name}} {{$user->last_name}}</span></li>--}}
                    {{--</ul>--}}
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
                            <h4 class="header-title mb-0">My Profile</h4>
                        </div>
                        <div class="ml-5 mt-4">

                            {{-- BASIC INFO --}}
                            <p> <strong>First Name</strong>: {{ $user->first_name }}</p>
                            <p> <strong>Middle Name</strong>: {{ $user->middle_name ? $user->middle_name : ''}}</p>
                            <p> <strong>Last Name</strong>: {{ $user->last_name }}</p>
                            <p> <strong>Address</strong>: {{ $user->address }}</p>
                            <p> <strong>Cluster Area</strong>: {{ ucfirst($user->cluster_area) }}</p>
                            <p> <strong>Birthday</strong>: {{ $user->birthday ? date('M d, Y', strtotime($user->birthday)) : 'none'}}</p>
                            <p> <strong>Age</strong>: {{ $user->age }} years old</p>
                            <p> <strong>Group Age</strong>: {{ ucfirst($user->group_age) }}</p>
                            <p> <strong>Contact</strong>: {{ $user->contact ? $user->contact : 'none' }}</p>
                            <p> <strong>Gender</strong>: {{ $user->gender == 'f' ? 'Female' : 'Male' }}</p>
                            <p> <strong>Journey</strong>: {{ ucfirst($user->journey) }}</p>
                            <p> <strong>CLDP</strong>: {{ $user->cldp }}</p>
                            <p> <strong>Email</strong>: {{ $user->email ? $user->email : 'none'}}</p>
                            <p> <strong>Username</strong>: {{ $user->username ? $user->username : 'none'}}</p>

                            @if($user->leader_id != 0)
                                <p> <strong>Leader</strong>: <a href="/my-profile/users/{{$user->leader->id}}">{{ $user->leader->first_name.' '.$user->leader->last_name }}</a></p>
                            @else
                                <p> <strong>Leader</strong>: </p>
                            @endif
                        </div>

                        @if($user->id == Auth::id())
                            <div class="buttons-holder mt-4">
                                <a href="/my-profile/edit" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/my-profile/change-password" class="btn btn-outline-warning float-left mr-2"><i class="fa fa-lock"></i> Change Password</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection