<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel d-xs-block d-sm-block d-md-block d-lg-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            FoodAvenue
        </a>
         {{-- -> {{ Auth::user()->name }} --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--</li>--}}
                @else
                    @if(Auth::user()->type == 'admin')
                        <li class="nav-tem"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    @endif
                    <li class="nav-tem"><a class="nav-link" href="/care_groups">Care Groups</a></li>
                    <li class="nav-tem"><a class="nav-link" href="/care_groups">Care Groups</a></li>
                    <li class="nav-tem"><a class="nav-link" href="/procurement">Leaders</a></li>
                    <li class="nav-tem"><a class="nav-link" href="/procurement">Procurement</a></li>
                    <li class="nav-tem"><a class="nav-link" href="/loss">Loss</a></li>
                    @if(Auth::user()->type == 'admin')
                        <li class="nav-tem"><a class="nav-link" href="/reports">Reports</a></li>
                        <li class="nav-tem"><a class="nav-link" href="/users">Users</a></li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>

                    </li> --}}
                @endguest
            </ul>
        </div>
    </div>
</nav>
