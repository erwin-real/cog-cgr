
{{-- Left Content --}}
<div class="body-left d-none d-md-none d-lg-block d-xl-block">
    <div class="sidenav">
        <ul class="list-group">
            <li class="text-center username">
                <div class="circle"></div>
                {{ Auth::user()->name }}
            </li>
            @if(Auth::user()->type == 'admin')
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
                <li class="list-group-item {{ request()->is('care_groups') ? 'active' : '' }} {{ request()->is('care_groups/*') ? 'active' : '' }} {{ request()->is('guide/care_groups') ? 'active' : '' }}">
                    <a href="/care_groups">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="link">
                            Care Groups
                        </div>
                    </a>
                    <div class="arrow d-none {{ request()->is('care_groups') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('care_groups/*') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('guide/care_groups') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
                </li>
            @endif
            <li class="list-group-item {{ request()->is('care_groups') ? 'active' : '' }} {{ request()->is('care_groups/*') ? 'active' : '' }} {{ request()->is('guide/care_groups') ? 'active' : '' }}">
                <a href="/care_groups">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="link">
                        Care Groups
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('care_groups') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('care_groups/*') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('guide/care_groups') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            <li class="list-group-item {{ request()->is('transactions') ? 'active' : '' }} {{ request()->is('guide/transactions') ? 'active' : '' }} {{ request()->is('transactions/*') ? 'active' : '' }}">
                <a href="/transactions">
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="link">
                        Transactions
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('transactions') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('transactions/*') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('guide/transactions') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            <li class="list-group-item {{ request()->is('procurement') ? 'active' : '' }} {{ request()->is('procurement/*') ? 'active' : '' }}">
                <a href="/procurement">
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="link">
                        Procurement
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('procurement') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('procurement/*') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            <li class="list-group-item {{ request()->is('loss') ? 'active' : '' }} {{ request()->is('loss/*') ? 'active' : '' }} {{ request()->is('guide/loss') ? 'active' : '' }}">
                <a href="/loss">
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="link">
                        Loss
                    </div>
                </a>
                <div class="arrow d-none {{ request()->is('loss') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('loss/*') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('guide/loss') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
            </li>
            @if(Auth::user()->type == 'admin')
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

                <li class="list-group-item {{ request()->is('users') ? 'active' : '' }} {{ request()->is('users/*') ? 'active' : '' }} {{ request()->is('guide/users') ? 'active' : '' }}">
                    <a href="/users">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="link">
                            Users
                        </div>
                    </a>
                    <div class="arrow d-none {{ request()->is('users') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('users/*') ? 'd-md-none d-lg-block d-xl-block' : '' }} {{ request()->is('guide/users') ? 'd-md-none d-lg-block d-xl-block' : '' }}"></div>
                </li>
            @endif
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