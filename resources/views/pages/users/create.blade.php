@extends('layouts.app')

@section('content')
    @include('includes.sidenav')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1>Users</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/users">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>

            {{--@include('includes.messages')--}}

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card">
                    <div class="card-header">{{ __('Create User') }}</div>

                    <div class="card-body">

                        <form method="POST" action="/users">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-5 col-form-label text-md-left">{{ __('Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-5 col-form-label text-md-left">{{ __('Type') }}</label>

                                <div class="col-md-12">
                                    <select class="form-control" name="type" id="type">
                                        <option value="member">Member</option>
                                        <option value="leader">Leader</option>
                                        <option value="cluster_head">Cluster Head</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-5 col-form-label text-md-left">{{ __('Address') }}</label>

                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cluster_area" class="col-md-5 col-form-label text-md-left">{{ __('Cluster Area') }}</label>

                                <div class="col-md-12">
                                    <input id="cluster_area" type="text" class="form-control{{ $errors->has('cluster_area') ? ' is-invalid' : '' }}" name="cluster_area" autofocus>

                                    @if ($errors->has('cluster_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cluster_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="head_cluster_area" class="col-md-5 col-form-label text-md-left">{{ __('Head\'s Cluster Area') }}
                                    <br><span class="small">Fill this if he/she is a CLUSTER HEAD</span>
                                </label>

                                <div class="col-md-12">
                                    <input id="head_cluster_area" type="text" class="form-control{{ $errors->has('head_cluster_area') ? ' is-invalid' : '' }}" name="head_cluster_area" autofocus>

                                    @if ($errors->has('head_cluster_area'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('head_cluster_area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-5 col-form-label text-md-left">{{ __('Birthday') }} </label>

                                <div class="col-md-12">
                                    <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" autofocus>

                                    @if ($errors->has('birthday'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number" class="col-md-5 col-form-label text-md-left">{{ __('Contact Number') }} </label>

                                <div class="col-md-12">
                                    <input id="number" type="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" autofocus>

                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-5 col-form-label text-md-left">{{ __('Gender') }}</label>

                                <div class="col-md-12">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="group_age" class="col-md-5 col-form-label text-md-left">{{ __('Gender') }}</label>

                                <div class="col-md-12">
                                    <select class="form-control" name="group_age" id="group_age">
                                        <option value="youth">Youth</option>
                                        <option value="men">Men</option>
                                        <option value="women">Women</option>
                                    </select>

                                    @if ($errors->has('group_age'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group_age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="journey" class="col-md-5 col-form-label text-md-left">{{ __('Journey') }}</label>

                                <div class="col-md-12">
                                    <select class="form-control" name="journey" id="journey">
                                        <option value="pre">Pre-Believer</option>
                                        <option value="believer">Believer</option>
                                        <option value="disciple">Disciple</option>
                                        <option value="leader">Leader</option>
                                    </select>

                                    @if ($errors->has('journey'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('journey') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cldp" class="col-md-5 col-form-label text-md-left">{{ __('CLDP') }}</label>

                                <div class="col-md-12">
                                    <select class="form-control" name="cldp" id="cldp">
                                        <option value="0">N/A</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>

                                    @if ($errors->has('cldp'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cldp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-5 col-form-label text-md-left">{{ __('Username') }}</label>

                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" >

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-5 col-form-label text-md-left">{{ __('Email Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-5 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-5 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
