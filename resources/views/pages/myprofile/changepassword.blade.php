@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Profile</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/my-profile">My Profile</a></li>
                        <li><span>Change Password</span></li>
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
                            <h4 class="header-title mb-0">Change Password</h4>
                        </div>
                        <div class="ml-5 mt-4">
                            <form class="form-horizontal" method="POST" action="/my-profile/change-password">
                                {{ csrf_field() }}

                                <div class="form-group row{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="current-password" class="col-md-4 col-form-label">{{ __('Current Password') }} <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <input id="current-password" type="password"
                                               class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}"
                                               name="current-password" value="{{ old('current-password') }}" required autofocus>

                                        @if ($errors->has('current-password'))
                                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 col-form-label">{{ __('New Password') }} <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <input id="new-password" type="password"
                                               class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}"
                                               name="new-password" value="{{ old('new-password') }}" required autofocus>

                                        @if ($errors->has('new-password'))
                                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('new-password-confirm') ? ' has-error' : '' }}">
                                    <label for="new-password-confirm" class="col-md-4 col-form-label">{{ __('Confirm New Password') }} <span class="text-danger">*</span></label>

                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password"
                                               class="form-control{{ $errors->has('new-password-confirm') ? ' is-invalid' : '' }}"
                                               name="new-password_confirmation" value="{{ old('new-password-confirm') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-5">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-user-check"></i> Submit
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