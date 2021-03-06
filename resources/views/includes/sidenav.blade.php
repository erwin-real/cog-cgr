<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/dashboard" style="max-width: 100% !important; "><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    @if(Auth::user()->type == 'cluster head' || Auth::user()->type == 'department head' || Auth::user()->type == 'admin' || Auth::user()->type == 'master')
                        <li class="{{ request()->is('dashboard') ? 'active border-left-info' : '' }}">
                            <a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->type == 'cluster head' || Auth::user()->type == 'department head' || Auth::user()->type == 'admin' || Auth::user()->type == 'master')
                        <li class="{{ request()->is('reports') || request()->is('reports/*') || request()->is('guides/reports') ? 'active border-left-info' : '' }}">
                            <a href="/reports"><i class="fa fa-line-chart"></i>
                                @if(Auth::user()->type == 'admin' || Auth::user()->type == 'master')
                                    <span>All Reports</span>
                                @elseif(Auth::user()->type == 'department head')
                                    <span>{{ucfirst(Auth::user()->head_department)}} Reports</span>
                                @elseif(Auth::user()->type == 'cluster head')
                                    <span>{{ucfirst(Auth::user()->head_cluster_area)}} Reports</span>
                                @endif
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type == 'admin' || Auth::user()->type == 'master')
                        <li class="{{ request()->is('caregroups') || request()->is('caregroups/*') || request()->is('guides/caregroups') ? 'active border-left-info' : '' }}">
                            <a href="/caregroups"><i class="fa fa-users"></i> <span>All Care Groups</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->is_leader == 1 && Auth::user()->type == 'cluster head')
                        <li class="{{ request()->is('cluster') || request()->is('cluster/*') || request()->is('guides/cluster-care-group') ? 'active border-left-info' : '' }}">
                            <a href="/cluster"><i class="fa fa-users"></i> <span>{{ucfirst(Auth::user()->head_cluster_area)}} Care Groups</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->is_leader == 1 && Auth::user()->type == 'department head')
                        <li class="{{ request()->is('department') || request()->is('department/*') || request()->is('guides/department-care-group') ? 'active border-left-info' : '' }}">
                            <a href="/department"><i class="fa fa-users"></i> <span>{{ucfirst(Auth::user()->head_department)}} Care Groups</span></a>
                        </li>
                    @endif

                    {{--@if(Auth::user()->type == 'cluster head' && Auth::user()->type != 'admin' && Auth::user()->type != 'master')--}}
                        {{--<li class="{{ request()->is('caregroups') || request()->is('caregroups/*') ? 'active border-left-info' : '' }}">--}}
                            {{--<a href="/caregroups?cluster_area={{Auth::user()->head_cluster_area}}"><i class="fa fa-users"></i> <span>{{Auth::user()->head_cluster_area}} CG</span></a>--}}
                        {{--</li>--}}
                    {{--@endif--}}

                    @if(Auth::user()->type == 'admin' || Auth::user()->type == 'master' || Auth::user()->type == 'department head')
                        <li class="{{ request()->is('users') || request()->is('users/*') || request()->is('guides/users') ? 'active border-left-info' : '' }}">
                            <a href="/users"><i class="fa fa-user"></i>
                                @if(Auth::user()->type == 'department head')
                                    <span>{{ucfirst(Auth::user()->head_department)}}</span>
                                @else
                                    <span>Users</span>
                                @endif
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type != 'master')
                        <li class="{{ request()->is('my-reports') || request()->is('my-reports/*') || request()->is('guides/my-reports') ? 'active border-left-info' : '' }}">
                            <a href="/my-reports"><i class="fa fa-list-ul"></i> <span>My Reports</span></a>
                        </li>
                    @endif

                    @if(Auth::user()->is_leader == 1 && Auth::user()->type != 'master' && Auth::user()->type != 'member')
                        <li class="{{ request()->is('my-care-group') || request()->is('my-care-group/*') || request()->is('guides/my-care-group') ? 'active border-left-info' : '' }}">
                            <a href="/my-care-group"><i class="fa fa-users"></i> <span>My Care Group</span></a>
                        </li>
                    @endif

                    <li class="{{ request()->is('my-profile') || request()->is('my-profile/*') || request()->is('guides/my-profile') ||
                    (request()->is('users/*') && (Auth::user()->type == 'cluster head' || Auth::user()->type == 'leader')) ? 'active border-left-info' : '' }}">
                        <a href="/my-profile"><i class="fa fa-user"></i> <span>My Profile</span></a>
                    </li>
                    {{--@if(Auth::user()->type == 'admin' || Auth::user()->type == 'master')--}}
                        {{--<li class="{{ request()->is('accounts') || request()->is('accounts/*') ? 'active border-left-info' : '' }}">--}}
                            {{--<a href="/accounts"><i class="fa fa-user-secret"></i> <span>Accounts</span></a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                    {{--<li class="active">--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li class="active"><a href="index.html">ICO dashboard</a></li>--}}
                            {{--<li><a href="index2.html">Ecommerce dashboard</a></li>--}}
                            {{--<li><a href="index3.html">SEO dashboard</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Sidebar--}}
                                            {{--Types--}}
                                        {{--</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="index.html">Left Sidebar</a></li>--}}
                            {{--<li><a href="index3-horizontalmenu.html">Horizontal Sidebar</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Charts</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="barchart.html">bar chart</a></li>--}}
                            {{--<li><a href="linechart.html">line Chart</a></li>--}}
                            {{--<li><a href="piechart.html">pie chart</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>UI Features</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="accordion.html">Accordion</a></li>--}}
                            {{--<li><a href="alert.html">Alert</a></li>--}}
                            {{--<li><a href="badge.html">Badge</a></li>--}}
                            {{--<li><a href="button.html">Button</a></li>--}}
                            {{--<li><a href="button-group.html">Button Group</a></li>--}}
                            {{--<li><a href="cards.html">Cards</a></li>--}}
                            {{--<li><a href="dropdown.html">Dropdown</a></li>--}}
                            {{--<li><a href="list-group.html">List Group</a></li>--}}
                            {{--<li><a href="media-object.html">Media Object</a></li>--}}
                            {{--<li><a href="modal.html">Modal</a></li>--}}
                            {{--<li><a href="pagination.html">Pagination</a></li>--}}
                            {{--<li><a href="popovers.html">Popover</a></li>--}}
                            {{--<li><a href="progressbar.html">Progressbar</a></li>--}}
                            {{--<li><a href="tab.html">Tab</a></li>--}}
                            {{--<li><a href="typography.html">Typography</a></li>--}}
                            {{--<li><a href="form.html">Form</a></li>--}}
                            {{--<li><a href="grid.html">grid system</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>icons</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="fontawesome.html">fontawesome icons</a></li>--}}
                            {{--<li><a href="themify.html">themify icons</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>--}}
                            {{--<span>Tables</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="table-basic.html">basic table</a></li>--}}
                            {{--<li><a href="table-layout.html">table layout</a></li>--}}
                            {{--<li><a href="datatable.html">datatable</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li>--}}
                    {{--<li><a href="invoice.html"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Pages</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="login.html">Login</a></li>--}}
                            {{--<li><a href="login2.html">Login 2</a></li>--}}
                            {{--<li><a href="login3.html">Login 3</a></li>--}}
                            {{--<li><a href="register.html">Register</a></li>--}}
                            {{--<li><a href="register2.html">Register 2</a></li>--}}
                            {{--<li><a href="register3.html">Register 3</a></li>--}}
                            {{--<li><a href="register4.html">Register 4</a></li>--}}
                            {{--<li><a href="screenlock.html">Lock Screen</a></li>--}}
                            {{--<li><a href="screenlock2.html">Lock Screen 2</a></li>--}}
                            {{--<li><a href="reset-pass.html">reset password</a></li>--}}
                            {{--<li><a href="pricing.html">Pricing</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>--}}
                            {{--<span>Error</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="404.html">Error 404</a></li>--}}
                            {{--<li><a href="403.html">Error 403</a></li>--}}
                            {{--<li><a href="500.html">Error 500</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Multi--}}
                                            {{--level menu</span></a>--}}
                        {{--<ul class="collapse">--}}
                            {{--<li><a href="#">Item level (1)</a></li>--}}
                            {{--<li><a href="#">Item level (1)</a></li>--}}
                            {{--<li><a href="#" aria-expanded="true">Item level (1)</a>--}}
                                {{--<ul class="collapse">--}}
                                    {{--<li><a href="#">Item level (2)</a></li>--}}
                                    {{--<li><a href="#">Item level (2)</a></li>--}}
                                    {{--<li><a href="#">Item level (2)</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Item level (1)</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </nav>
        </div>
    </div>
</div>