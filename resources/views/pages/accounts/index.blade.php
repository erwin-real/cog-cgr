@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Accounts</h4>
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
                            <h4 class="header-title mb-0">List of accounts</h4>
                            <a href="/accounts/create" class="btn btn-outline-primary"><i class="fa fa-user-plus"></i> Create</a>
                            {{--<select class="custome-select border-0 pr-3">--}}
                                {{--<option selected>Last 24 Hours</option>--}}
                                {{--<option value="0">01 July 2018</option>--}}
                            {{--</select>--}}
                        </div>
                        <div class="market-status-table mt-4">
                            @if ($accounts->isEmpty())
                                <p> There are no accounts yet.</p>
                            @else
                                {{--{{$accounts->links()}}--}}
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Type</th>
                                            <th>Date Added</th>
                                            <th>Date Modified</th>
                                            {{--<th>Actions</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($accounts as $account)
                                                <tr>
                                                    <td><a href="/accounts/{{$account->id}}">{{$account->first_name}} {{$account->last_name}}</a></td>
                                                    <td>{{$account->username}}</td>
                                                    <td>{{$account->type}}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($account->created_at)) }}</td>
                                                    <td>{{ date('D M d, Y h:i a', strtotime($account->updated_at)) }}</td>
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