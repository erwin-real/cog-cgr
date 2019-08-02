
<div class="col-sm-6 clearfix">
    <div class="user-profile pull-right">
        <img class="avatar user-thumb" src="{{ asset('assets/images/cog-logo.png') }}" alt="avatar">
        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::user()->first_name}} {{Auth::user()->last_name}}<i class="fa fa-angle-down"></i></h4>
        <div class="dropdown-menu">
            {{--<a class="dropdown-item" href="#">Message</a>--}}
            {{--<a class="dropdown-item" href="#">Settings</a>--}}
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fa fa-sign-out mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </div>
</div>