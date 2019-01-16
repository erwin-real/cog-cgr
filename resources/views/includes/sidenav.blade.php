
{{-- Left Content --}}
<div class="body-left d-none d-md-none d-lg-block d-xl-block">
    <div class="sidenav">
        <ul class="list-group">
            <li class="text-center username">
                <div class="circle"></div>
                {{ Auth::user()->name }}
            </li>
            {{--@if(Auth::user()->type == 'admin')--}}
                <li class="list-group-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <div class="icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="link">
                            Dashboard
                        </div>
                    </a>
                    <div class="arrow d-none {{ request()->is('dashboard') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
                </li>
            {{--@endif--}}
            <li class="list-group-item {{ request()->is('products') ? 'active' : '' }} {{ request()->is('products') ? 'active' : '' }} {{ request()->is('products/import') ? 'active' : '' }} {{ request()->is('products/add') ? 'active' : '' }} {{ request()->is('products/create') ? 'active' : '' }}">
                <a href="/products">
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="link">
                        Products
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('products') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('products') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('products/import') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('products/add') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('products/create') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            <li class="list-group-item {{ request()->is('transactions') ? 'active' : '' }} {{ request()->is('transactions/create') ? 'active' : '' }} {{ request()->is('transactions') ? 'active' : '' }} {{ request()->is('transactions/list') ? 'active' : '' }} {{ request()->is('transactions/create') ? 'active' : '' }} {{ request()->is('transactions/1') ? 'active' : '' }} {{ request()->is('transactions/2') ? 'active' : '' }} {{ request()->is('transactions/1/edit') ? 'active' : '' }} {{ request()->is('transactions/2/edit') ? 'active' : '' }}">
                <a href="/transactions">
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="link">
                        Transactions
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('transactions') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('transactions/create') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('transactions') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('transactions/list') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('templates/create') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('templates/1') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('templates/2') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('campaigns/1/edit') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('campaigns/2/edit') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            <li class="list-group-item {{ request()->is('procurement') ? 'active' : '' }}">
                <a href="/procurement">
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="link">
                        Procurement
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('procurement') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            <li class="list-group-item {{ request()->is('loss') ? 'active' : '' }}">
                <a href="/loss">
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="link">
                        Loss
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('loss') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            {{--@if(Auth::user()->type == 'admin')--}}
                <li class="list-group-item {{ request()->is('reports') ? 'active' : '' }}">
                    <a href="/reports">
                        <div class="icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="link">
                            Reports
                        </div>
                    </a>
                    <div class="arrow d-none {{ request()->is('reports') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
                </li>

                <li class="list-group-item {{ request()->is('users') ? 'active' : '' }}">
                    <a href="/users">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="link">
                            Users
                        </div>
                    </a>
                    <div class="arrow d-none {{ request()->is('users') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
                </li>
            {{--@endif--}}
            @guest
                <li class="list-group-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li class="list-group-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="list-group-item bot-logout">
                    <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <div class="icon logout">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <div class="link">
                            {{ __('Logout') }}
                        </div>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            @endguest
        </ul>
    </div>
</div>