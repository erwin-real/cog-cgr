@extends('layouts.app')

@section('content')
    @include('includes.sidenav')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1>Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <div class="top-dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="campaign-summary">
                            <div class="card bg-success mb-3">
                                <div class="card-body text-center">
                                    {{--<h1>{{$transactions->sum('income')}}</h1>--}}
                                    <p>INCOME</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="list-summary">
                            <div class="card bg-secondary mb-3">
                                <div class="card-body text-center">
                                    {{--<h1>{{$transactions->sum('capital')}}</h1>--}}
                                    <p>CAPITAL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="subs-summary">
                            <div class="card bg-danger mb-3">
                                <div class="card-body text-center">
                                    {{--<h1>{{count($procurements)}}</h1>--}}
                                    <p>PROCUREMENTS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bottom-dashboard">
                <div class="row">

                    {{-- <div class="col-sm-6 mb-2">
                        <div class="card mb-2">
                            <h5 class="card-title campaign-title">Transactions Summary <a class="float-right" href="/transactions"><i class="fas fa-ellipsis-v"></i></a></h5>
                            <div class="card-body table-responsive-sm">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Total</th>
                                            <th scope="col">Money Received</th>
                                            <th scope="col">Change</th>
                                            <th scope="col">Income</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($transactions) > 0)
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td>{{$transaction->total}}</td>
                                                    <td>{{$transaction->money_received}}</td>
                                                    <td>{{$transaction->change}}</td>
                                                    <td>{{$transaction->income}}</td>
                                                    <td>{{date('D m-d-Y H:i', strtotime($transaction->created_at))}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr class="text-center">
                                            <th colspan="4">No transactions found</th>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-2">
                            <h5 class="card-title lists-title">Procurements Summary <a class="float-right" href="/procurement"><i class="fas fa-ellipsis-v"></i></a></h5>
                            <div class="card-body table-responsive-sm">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Stocks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($procurements) > 0)
                                            @foreach($procurements as $procurement)
                                                <tr>
                                                    <td>{{$procurement->name}}</td>
                                                    <td>{{$procurement->type}}</td>
                                                    <td>{{$procurement->desc}}</td>
                                                    <td>{{$procurement->stocks}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr class="text-center">
                                            <th colspan="4">No procurements found</th>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="card mb-2">
                            <h5 class="card-title report-title">7-day Report Summary <a class="float-right" href="/reports"><i class="fas fa-ellipsis-v"></i></a></h5>
                            <div class="panel-body pt-4">
                                {{--{!! $chart->container() !!}--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

@endsection

<script src="/js/vue.js"></script>
<script src="/js/echarts-en.min.js"></script>
{{--{!! $chart->script() !!}--}}

<script src="/js/highcharts.js"></script>