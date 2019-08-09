@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Accounts</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/accounts">Accounts</a></li>
                        <li><a href="/accounts/{{$account->id}}">{{$account->first_name}} {{$account->last_name}}</a></li>
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
                            <h4 class="header-title mb-0">Update Account: {{$account->first_name}} {{$account->last_name}}</h4>
                        </div>
                        <div class="mt-4">
                            <form action="{{ action('AccountController@update', $account->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf

                                {{--FIRST NAME--}}
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-12 col-form-label text-md-left">First Name <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{$account->first_name}}" required autofocus>

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
                                        <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{$account->middle_name}}" autofocus>

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
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{$account->last_name}}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--EMAIL--}}
                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label text-md-left">Email Address</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$account->email}}" autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--GENDER--}}
                                <div class="form-group row">
                                    <label for="gender" class="col-md-12 col-form-label text-md-left">Gender (m/f) <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{$account->gender}}" required autofocus>

                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--BIRTHDAY--}}
                                <div class="form-group row">
                                    <label for="birthday" class="col-md-12 col-form-label text-md-left">Birthday</label>

                                    <div class="col-md-12">
                                        <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{$account->birthday}}" autofocus>

                                        @if ($errors->has('birthday'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('birthday') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--AGE--}}
                                <div class="form-group row">
                                    <label for="age" class="col-md-12 col-form-label text-md-left">Age <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{$account->age}}" required autofocus>

                                        @if ($errors->has('age'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--GROUP AGE--}}
                                <div class="form-group row">
                                    <label for="group_age" class="col-md-12 col-form-label text-md-left">Group Age <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="group_age" class="form-control{{ $errors->has('group_age') ? ' is-invalid' : '' }} py-0" id="group_age" required autofocus>
                                            <option value="youth" {{$account->group_age == 'youth' ? 'selected' : ''}}>Youth</option>
                                            <option value="men" {{$account->group_age == 'men' ? 'selected' : ''}}>Men</option>
                                            <option value="women" {{$account->group_age == 'women' ? 'selected' : ''}}>Women</option>
                                        </select>

                                        @if ($errors->has('group_age'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('group_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--ADDRESS--}}
                                <div class="form-group row">
                                    <label for="address" class="col-md-12 col-form-label text-md-left">Address <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$account->address}}" required autofocus>

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
                                        <input id="cluster_area" type="text" class="form-control{{ $errors->has('cluster_area') ? ' is-invalid' : '' }}" name="cluster_area" value="{{$account->cluster_area}}" required autofocus>

                                        @if ($errors->has('cluster_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cluster_area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--HEAD CLUSTER AREA--}}
                                <div class="form-group row">
                                    <label for="head_cluster_area" class="col-md-12 col-form-label text-md-left">Head Cluster Area</label>

                                    <div class="col-md-12">
                                        <input id="head_cluster_area" type="text" class="form-control{{ $errors->has('head_cluster_area') ? ' is-invalid' : '' }}" name="head_cluster_area" value="{{$account->head_cluster_area}}" autofocus>

                                        @if ($errors->has('head_cluster_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('head_cluster_area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--CONTACT--}}
                                <div class="form-group row">
                                    <label for="contact" class="col-md-12 col-form-label text-md-left">Contact #</label>

                                    <div class="col-md-12">
                                        <input id="contact" type="number" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{$account->contact}}" autofocus>

                                        @if ($errors->has('contact'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contact') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--JOURNEY--}}
                                <div class="form-group row">
                                    <label for="journey" class="col-md-12 col-form-label text-md-left">Journey <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="journey" class="form-control{{ $errors->has('journey') ? ' is-invalid' : '' }} py-0" id="journey" required autofocus>
                                            <option value="pre-believer" {{$account->journey == 'pre-believer' ? 'selected' : ''}}>Pre-Believer</option>
                                            <option value="believer" {{$account->journey == 'believer' ? 'selected' : ''}}>Believer</option>
                                            <option value="disciple" {{$account->journey == 'disciple' ? 'selected' : ''}}>Disciple</option>
                                            <option value="leader" {{$account->journey == 'leader' ? 'selected' : ''}}>Leader</option>
                                        </select>

                                        @if ($errors->has('journey'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('journey') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--CDLP--}}
                                <div class="form-group row">
                                    <label for="cldp" class="col-md-12 col-form-label text-md-left">CLDP</label>

                                    <div class="col-md-12">
                                        <select name="cldp" class="form-control{{ $errors->has('cldp') ? ' is-invalid' : '' }} py-0" id="cldp" autofocus>
                                            <option value="1" {{$account->cldp == '1' ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$account->cldp == '2' ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$account->cldp == '3' ? 'selected' : ''}}>3</option>
                                        </select>

                                        @if ($errors->has('cldp'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cldp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--USERNAME--}}
                                <div class="form-group row">
                                    <label for="username" class="col-md-12 col-form-label text-md-left">Username</label>

                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{$account->username}}" autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--PASSWORD--}}
                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label text-md-left">Password</label>

                                    <div class="col-md-12">
                                        <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autofocus>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--TYPE--}}
                                <div class="form-group row">
                                    <label for="type" class="col-md-12 col-form-label text-md-left">Type <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{$account->type}}" required autofocus>

                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--LEADER ID--}}
                                <div class="form-group row">
                                    <label for="leader_id" class="col-md-12 col-form-label text-md-left">Leader ID <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="leader_id" type="number" class="form-control{{ $errors->has('leader_id') ? ' is-invalid' : '' }}" name="leader_id" value="{{$account->leader_id}}" required autofocus>

                                        @if ($errors->has('leader_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('leader_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--IS LEADER--}}
                                <div class="form-group row">
                                    <label for="is_leader" class="col-md-12 col-form-label text-md-left">Is Leader? (0 or 1) <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="is_leader" type="number" class="form-control{{ $errors->has('is_leader') ? ' is-invalid' : '' }}" name="is_leader" value="{{$account->is_leader}}" required autofocus>

                                        @if ($errors->has('is_leader'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('is_leader') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--IS ACTIVE--}}
                                <div class="form-group row">
                                    <label for="is_active" class="col-md-12 col-form-label text-md-left">Is Active? (0 or 1) <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="is_active" type="number" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{$account->is_active}}" required autofocus>

                                        @if ($errors->has('is_active'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('is_active') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-user-plus"></i> Save
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