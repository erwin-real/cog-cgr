@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Care Group</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/my-care-group">My Care Group</a></li>
                        <li><span>{{$member->first_name}} {{$member->last_name}}</span></li>
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
                            <h4 class="header-title mb-0">{{ucfirst($member->type)}}'s Profile</h4>
                        </div>
                        <div class="ml-5 mt-4">

                            {{-- BASIC INFO --}}
                            <p> <strong>First Name</strong>: {{ $member->first_name }}</p>
                            <p> <strong>Middle Name</strong>: {{ $member->middle_name ? $member->middle_name : ''}}</p>
                            <p> <strong>Last Name</strong>: {{ $member->last_name }}</p>
                            <p> <strong>Address</strong>: {{ $member->address }}</p>
                            <p> <strong>Cluster Area</strong>: {{ ucfirst($member->cluster_area) }}</p>
                            <p> <strong>Birthday</strong>: {{ $member->birthday ? date('M d, Y', strtotime($member->birthday)) : 'none'}}</p>
                            <p> <strong>Age</strong>: {{ $member->age }} years old</p>
                            <p> <strong>Group Age</strong>: {{ ucfirst($member->group_age) }}</p>
                            <p> <strong>Contact</strong>: {{ $member->contact ? $member->contact : 'none' }}</p>
                            <p> <strong>Gender</strong>: {{ $member->gender == 'f' ? 'Female' : 'Male' }}</p>
                            <p> <strong>Journey</strong>: {{ ucfirst($member->journey) }}</p>
                            <p> <strong>CLDP</strong>: {{ $member->cldp }}</p>
                            <p> <strong>Is Active</strong>? {{ $member->is_active == 1 ? 'Yes' : 'No' }}</p>
                            <p> <strong>Email</strong>: {{ $member->email ? $member->email : 'none'}}</p>
                            <p> <strong>Username</strong>: {{ $member->username ? $member->username : 'none'}}</p>

                            @if($member->leader_id != 0 && $member->leader_id != Auth()->user()->id)
                                <p> <strong>Leader</strong>: <a href="/my-profile/users/{{$member->leader->id}}">{{ $member->leader->first_name.' '.$member->leader->last_name }}</a></p>
                            @elseif($member->leader_id == Auth()->user()->id)
                                <p> <strong>Leader</strong>: <a href="/my-profile">{{ $member->leader->first_name.' '.$member->leader->last_name }}</a></p>
                            @endif
                        </div>

                        <div class="buttons-holder mt-4">
                            <a href="/my-care-group/members/{{$member->id}}/edit" class="btn btn-outline-primary float-left mr-2"><i class="fa fa-pencil"></i> Edit</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection