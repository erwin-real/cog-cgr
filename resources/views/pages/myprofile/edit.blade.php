@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Profile</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/my-profile">My Profile</a></li>
                        <li><span>Update</span></li>
                    </ul>
                </div>
            </div>
            @include('includes.user-profile')

        </div>
    </div>

    <div class="main-content-inner">
        @include('includes.messages')
        <div class="row mt-5 mb-5">
            <div class="col-md-6 col-sm-9">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">Update My Profile</h4>
                        </div>
                        <div class="mt-4">
                            <form action="{{ action('MyProfileController@update') }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf

                                {{--FIRST NAME--}}
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-12 col-form-label text-md-left">First Name <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{$user->first_name}}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--MIDDLE NAME--}}
                                <div class="form-group row">
                                    <label for="middle_name" class="col-md-12 col-form-label text-md-left">Middle Name</label>

                                    <div class="col-md-12">
                                        <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{$user->middle_name}}" autofocus>

                                        @if ($errors->has('middle_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--LAST NAME--}}
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-12 col-form-label text-md-left">Last Name <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{$user->last_name}}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--ADDRESS--}}
                                <div class="form-group row">
                                    <label for="address" class="col-md-12 col-form-label text-md-left">Address <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$user->address}}" required autofocus>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--CLUSTER AREA--}}
                                <div class="form-group row">
                                    <label for="cluster_area" class="col-md-12 col-form-label text-md-left">Cluster Area <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="cluster_area" type="text" class="form-control{{ $errors->has('cluster_area') ? ' is-invalid' : '' }}" name="cluster_area" value="{{$user->cluster_area}}" required autofocus>

                                        @if ($errors->has('cluster_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cluster_area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--BIRTHDAY--}}
                                <div class="form-group row">
                                    <label for="birthday" class="col-md-12 col-form-label text-md-left">Birthday</label>

                                    <div class="col-md-12">
                                        <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{$user->birthday}}" autofocus>

                                        @if ($errors->has('birthday'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('birthday') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--GROUP AGE--}}
                                <div class="form-group row">
                                    <label for="group_age" class="col-md-12 col-form-label text-md-left">Group Age <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="group_age" class="form-control{{ $errors->has('group_age') ? ' is-invalid' : '' }} py-0" id="group_age" required autofocus>
                                            <option value="youth" {{$user->group_age == 'youth' ? 'selected' : ''}}>Youth</option>
                                            <option value="men" {{$user->group_age == 'men' ? 'selected' : ''}}>Men</option>
                                            <option value="women" {{$user->group_age == 'women' ? 'selected' : ''}}>Women</option>
                                        </select>

                                        @if ($errors->has('group_age'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('group_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--CONTACT--}}
                                <div class="form-group row">
                                    <label for="contact" class="col-md-12 col-form-label text-md-left">Contact #</label>

                                    <div class="col-md-12">
                                        <input id="contact" type="number" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{$user->contact}}" autofocus>

                                        @if ($errors->has('contact'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contact') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--GENDER--}}
                                <div class="form-group row">
                                    <label for="gender" class="col-md-12 col-form-label text-md-left">Gender (m/f) <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{$user->gender}}" required autofocus>

                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--JOURNEY--}}
                                {{--<div class="form-group row">--}}
                                    {{--<label for="journey" class="col-md-12 col-form-label text-md-left">Journey <span class="text-danger">*</span></label>--}}

                                    {{--<div class="col-md-12">--}}
                                        {{--<select name="journey" class="form-control{{ $errors->has('journey') ? ' is-invalid' : '' }} py-0" id="journey" required autofocus>--}}
                                            {{--<option value="pre-believer" {{$user->journey == 'pre-believer' ? 'selected' : ''}}>Pre-Believer</option>--}}
                                            {{--<option value="believer" {{$user->journey == 'believer' ? 'selected' : ''}}>Believer</option>--}}
                                            {{--<option value="disciple" {{$user->journey == 'disciple' ? 'selected' : ''}}>Disciple</option>--}}
                                            {{--<option value="leader" {{$user->journey == 'leader' ? 'selected' : ''}}>Leader</option>--}}
                                        {{--</select>--}}

                                        {{--@if ($errors->has('journey'))--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $errors->first('journey') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--CDLP--}}
                                {{--<div class="form-group row">--}}
                                    {{--<label for="cldp" class="col-md-12 col-form-label text-md-left">CLDP</label>--}}

                                    {{--<div class="col-md-12">--}}
                                        {{--<select name="cldp" class="form-control{{ $errors->has('cldp') ? ' is-invalid' : '' }} py-0" id="cldp" autofocus>--}}
                                            {{--<option value="0" {{$user->cldp == '0' ? 'selected' : ''}}>0</option>--}}
                                            {{--<option value="1" {{$user->cldp == '1' ? 'selected' : ''}}>1</option>--}}
                                            {{--<option value="2" {{$user->cldp == '2' ? 'selected' : ''}}>2</option>--}}
                                            {{--<option value="3" {{$user->cldp == '3' ? 'selected' : ''}}>3</option>--}}
                                        {{--</select>--}}

                                        {{--@if ($errors->has('cldp'))--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $errors->first('cldp') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--EMAIL--}}
                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label text-md-left">Email Address</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--USERNAME--}}
                                <div class="form-group row">
                                    <label for="username" class="col-md-12 col-form-label text-md-left">Username</label>

                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{$user->username}}" autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--SUBMIT BUTTON--}}
                                <div class="form-group row mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-check"></i> Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection