@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{(Auth::user()->type == 'department head') ? ucfirst(Auth::user()->head_department) : 'Users'}}</h4>
                    <ul class="breadcrumbs pull-left">
                        <li>
                            <a href="/users">
                                {{(Auth::user()->type == 'department head') ? ucfirst(Auth::user()->head_department) : 'Users'}}
                            </a>
                        </li>
                        <li><span>Create</span></li>
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
                            <h4 class="header-title mb-0">Create New User</h4>
                        </div>
                        <div class="mt-4">
                            <form action="{{ action('UserController@store') }}" method="POST">
                                @csrf

                                {{--FIRST NAME--}}
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-12 col-form-label text-md-left">First Name <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="first_name" type="text"
                                               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                               name="first_name" required autofocus value="{{old('first_name')}}">

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
                                        <input id="middle_name" type="text"
                                               class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                               name="middle_name" autofocus value="{{old('middle_name')}}">

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
                                        <input id="last_name" type="text"
                                               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                               name="last_name" required autofocus value="{{old('last_name')}}">

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
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" autofocus value="{{old('email')}}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--GENDER--}}
                                <div class="form-group row">
                                    <label for="gender" class="col-md-12 col-form-label text-md-left">Gender</label>

                                    <div class="col-md-12">
                                        <select name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }} py-0" id="gender" autofocus>
                                            <option value="m" {{old('gender') == 'm' ? 'selected' : ''}}>Male</option>
                                            <option value="f" {{old('gender') == 'f' ? 'selected' : ''}}>Female</option>
                                        </select>

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
                                        <input id="birthday" type="date"
                                               class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                               name="birthday" autofocus value="{{old('birthday')}}">

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
                                        <input id="age" type="number"
                                               class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}"
                                               name="age" required autofocus value="{{old('age')}}">

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
                                        @if(Auth::user()->type == 'department head')
                                            <input type="text" name="group_age"
                                                   class="form-control{{ $errors->has('group_age') ? ' is-invalid' : '' }}"
                                                   value="{{ucfirst(Auth::user()->head_department)}}" readonly autofocus required>
                                        @else
                                            <select name="group_age" class="form-control{{ $errors->has('group_age') ? ' is-invalid' : '' }} py-0" id="group_age" required autofocus>
                                                <option value="youth" {{old('gender') == 'youth' ? 'selected' : ''}}>Youth</option>
                                                <option value="men" {{old('gender') == 'men' ? 'selected' : ''}}>Men</option>
                                                <option value="women" {{old('gender') == 'women' ? 'selected' : ''}}>Women</option>
                                            </select>
                                        @endif

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
                                        <input id="address" type="text"
                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" required autofocus value="{{old('address')}}">

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
                                        <input id="cluster_area" type="text"
                                               class="form-control{{ $errors->has('cluster_area') ? ' is-invalid' : '' }}"
                                               name="cluster_area" required autofocus value="{{old('cluster_area')}}">

                                        @if ($errors->has('cluster_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cluster_area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--CONTACT--}}
                                <div class="form-group row">
                                    <label for="contact" class="col-md-12 col-form-label text-md-left">Contact #</label>

                                    <div class="col-md-12">
                                        <input id="contact" type="number"
                                               class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                                               name="contact" autofocus value="{{old('contact')}}">

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
                                            <option value="pre-believer" {{old('journey') == 'pre-believer' ? 'selected' : ''}}>Pre-Believer</option>
                                            <option value="believer" {{old('journey') == 'believer' ? 'selected' : ''}}>Believer</option>
                                            <option value="disciple" {{old('journey') == 'disciple' ? 'selected' : ''}}>Disciple</option>
                                            <option value="leader" {{old('journey') == 'leader' ? 'selected' : ''}}>Leader</option>
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
                                    <label for="cldp" class="col-md-12 col-form-label text-md-left">CLDP <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="cldp" class="form-control{{ $errors->has('cldp') ? ' is-invalid' : '' }} py-0" id="cldp" autofocus>
                                            <option value="0" {{old('cldp') == '0' ? 'selected' : ''}}>0</option>
                                            <option value="1" {{old('cldp') == '1' ? 'selected' : ''}}>1</option>
                                            <option value="2" {{old('cldp') == '2' ? 'selected' : ''}}>2</option>
                                            <option value="3" {{old('cldp') == '3' ? 'selected' : ''}}>3</option>
                                        </select>

                                        @if ($errors->has('cldp'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cldp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--TYPE--}}
                                <div class="form-group row">
                                    <label for="type" class="col-md-12 col-form-label text-md-left">Type <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }} py-0" id="type" autofocus onchange="toggleHeads()">
                                            <option value="member" {{old('type') == 'member' ? 'selected' : ''}}>Member</option>
                                            <option value="leader" {{old('type') == 'leader' ? 'selected' : ''}}>Leader</option>

                                            @if(Auth::user()->type == 'department head' || Auth::user()->type == 'master' || Auth::user()->type == 'admin')
                                                <option value="cluster head" {{old('type') == 'cluster head' ? 'selected' : ''}}>Cluster Head</option>
                                            @endif
                                            @if(Auth::user()->type == 'master' || Auth::user()->type == 'admin')
                                                <option value="department head" {{old('type') == 'department head' ? 'selected' : ''}}>Department Head</option>
                                                <option value="admin" {{old('type') == 'admin' ? 'selected' : ''}}>Admin</option>
                                            @endif

                                        </select>

                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--HEAD CLUSTER AREA--}}
                                <div class="form-group row" id="cluster-head-div" style="display: none">
                                    <label for="head_cluster_area" class="col-md-12 col-form-label text-md-left">Head Cluster Area <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="head_cluster_area" type="text"
                                               class="form-control{{ $errors->has('head_cluster_area') ? ' is-invalid' : '' }}"
                                               name="head_cluster_area" autofocus value="{{old('head_cluster_area')}}">

                                        @if ($errors->has('head_cluster_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('head_cluster_area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--HEAD DEPARTMENT--}}
                                <div class="form-group row" id="department-head-div" style="display: none">
                                    <label for="head_department" class="col-md-12 col-form-label text-md-left">Department Head <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="head_department" class="form-control{{ $errors->has('head_department') ? ' is-invalid' : '' }} py-0" id="head_department" autofocus>
                                            <option value="youth">Youth</option>
                                            <option value="men">Men</option>
                                            <option value="women">Women</option>
                                        </select>

                                        @if ($errors->has('head_department'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('head_department') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--USERNAME--}}
                                <div class="form-group row" id="username-div" style="display: none">
                                    <label for="username" class="col-md-12 col-form-label text-md-left">Username <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="username" type="text"
                                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                               name="username" autofocus value="{{old('username')}}">

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--PASSWORD--}}
                                <div class="form-group row" id="password-div" style="display: none">
                                    <label for="password" class="col-md-12 col-form-label text-md-left">Password <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autofocus>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--IS ACTIVE--}}
                                <div class="form-group row">
                                    <label for="is_active" class="col-md-12 col-form-label text-md-left">Is Active?</label>

                                    <div class="col-md-12">
                                        <select name="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} py-0" id="is_active" autofocus>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>

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

    <script>
        toggleHeads();

        function toggleHeads() {
            if (document.getElementById("type").value !== 'member') {
                document.getElementById('username-div').style = 'display: block';
                document.getElementById('password-div').style = 'display: block';
            }

            if (document.getElementById("type").value === 'cluster head') {
                document.getElementById('cluster-head-div').style = 'display: block';
                document.getElementById('department-head-div').style = 'display: none';
            } else if (document.getElementById("type").value === 'department head') {
                document.getElementById('department-head-div').style = 'display: block';
                document.getElementById('cluster-head-div').style = 'display: none';
            } else if (document.getElementById("type").value === 'admin' || document.getElementById("type").value === 'leader') {
                document.getElementById('cluster-head-div').style = 'display: none';
                document.getElementById('department-head-div').style = 'display: none';
            } else {
                document.getElementById('cluster-head-div').style = 'display: none';
                document.getElementById('department-head-div').style = 'display: none';
                document.getElementById('username-div').style = 'display: none';
                document.getElementById('password-div').style = 'display: none';
            }
        }
    </script>

@endsection