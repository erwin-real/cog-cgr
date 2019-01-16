@extends('layouts.app')

@section('content')
    @include('includes.sidenav')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1>Users</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/users">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="mt-5 col-lg-7 col-sm-8">
                <div class="card">
                    <div class="card-header ">
                        <h5><strong>Name</strong>: {{ $user->name }}</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <p> <strong>Username</strong>: {{ $user->username }}</p>
                        <p> <strong>Email</strong>: {{ $user->email }}</p>
                        <p> <strong>Type</strong>: {{ $user->type }}</p>
                        <p> <strong>Created at</strong>: {{ date('D m-d-Y', strtotime($user->created_at)) }}</p>
                        <p> <strong>Updated at</strong>: {{ date('D m-d-Y', strtotime($user->updated_at)) }}</p>
                        <a href="{{ action('UsersController@editUser', $user->id) }}" class="btn btn-outline-info float-left mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>

                        @if(Auth::user()->username != $user->username)
                            <form id="delete" method="POST" action="{{ action('UsersController@destroyUser', $user->id) }}" class="float-left">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div>
                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </form>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                </div>

                <a href="/users" class="btn btn-outline-primary mt-3"><i class="fas fa-chevron-left"></i> Back</a>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#delete").on("submit", function () {
                return confirm("Are you sure?");
            });
        });
    </script>

@endsection