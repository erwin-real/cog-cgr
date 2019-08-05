@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Care Groups</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/caregroups">Care Groups</a></li>
                        <li><a href="/caregroups/{{$group->id}}">{{$group->id}}</a></li>
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
                            <h4 class="header-title mb-0">Update Care Group</h4>
                        </div>
                        <div class="mt-4">
                            <form action="{{ action('GroupController@update', $group->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf

                                {{-- LEADER --}}
                                <div class="form-group row">
                                    <label for="leader" class="col-md-12 col-form-label text-md-left">Leader <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="leader" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }}" id="leader" required autofocus>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{$user->id == $group->leader_id ? 'selected' : ''}}>{{$user->first_name}} {{$user->last_name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('leader'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('leader') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- DAY OF CARE GROUP --}}
                                <div class="form-group row">
                                    <label for="day_cg" class="col-md-12 col-form-label text-md-left">Day <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="day_cg" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }}" id="day_cg" required autofocus>
                                            <option value="Sunday" {{$group->day_cg == 'Sunday' ? 'selected' : ''}}>Sunday</option>
                                            <option value="Monday" {{$group->day_cg == 'Monday' ? 'selected' : ''}}>Monday</option>
                                            <option value="Tuesday" {{$group->day_cg == 'Tuesday' ? 'selected' : ''}}>Tuesday</option>
                                            <option value="Wednesday" {{$group->day_cg == 'Wednesday' ? 'selected' : ''}}>Wednesday</option>
                                            <option value="Thursday" {{$group->day_cg == 'Thursday' ? 'selected' : ''}}>Thursday</option>
                                            <option value="Friday" {{$group->day_cg == 'Friday' ? 'selected' : ''}}>Friday</option>
                                            <option value="Saturday" {{$group->day_cg == 'Saturday' ? 'selected' : ''}}>Saturday</option>
                                        </select>

                                        @if ($errors->has('day_cg'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('day_cg') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- TIME OF CARE GROUP --}}
                                <div class="form-group row">
                                    <label for="time_cg" class="col-md-12 col-form-label text-md-left">Time <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="time_cg" type="time" class="form-control{{ $errors->has('time_cg') ? ' is-invalid' : '' }}" name="time_cg" value="{{$group->time_cg}}" required autofocus>

                                        @if ($errors->has('time_cg'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('time_cg') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- VENUE --}}
                                <div class="form-group row">
                                    <label for="venue" class="col-md-12 col-form-label text-md-left">Venue <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="venue" type="text" class="form-control{{ $errors->has('venue') ? ' is-invalid' : '' }}" name="venue" value="{{$group->venue}}" required autofocus>

                                        @if ($errors->has('venue'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('venue') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- CLUSTER AREA --}}
                                <div class="form-group row">
                                    <label for="cluster_area" class="col-md-12 col-form-label text-md-left">Cluster Area <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="cluster_area" type="text" class="form-control{{ $errors->has('cluster_area') ? ' is-invalid' : '' }}" name="cluster_area" value="{{$group->cluster_area}}" required autofocus>

                                        @if ($errors->has('cluster_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cluster_area') }}</strong>
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