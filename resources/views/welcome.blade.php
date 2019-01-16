<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Avenue</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                @if(Auth::user()->type == 'admin')
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary m-1"><i class="fas fa-home"></i> Dashboard</a>
                @elseif(Auth::user()->type == 'seller')
                    <a href="{{ url('/transactions/create') }}" class="btn btn-outline-primary m-1">
                        <i class="fas fa-plus"></i> New Transaction
                    </a>
                @endif
                <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <div class="link">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary m-1"><i class="fa fa-sign-in-alt"></i> Login</a>
            @endauth
        </div>
    @endif
    <div class="content">
        <div class="title">
            CGR
        </div>
        <div> @include('includes.messages') </div>
        <div>
            <p>Care Group Reporting</p>
        </div>
    </div>
</div>
</body>
</html>
