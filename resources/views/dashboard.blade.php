@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                <!-- <li class="breadcrumb-item" aria-current="page"><a href="/users">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Guide</li> -->
            </ol>
        </nav>
        @include('includes.messages')

    </div>

@endsection