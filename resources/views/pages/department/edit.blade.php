@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">{{ucfirst(Auth::user()->head_department)}} Care Groups</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/department">{{ucfirst(Auth::user()->head_department)}} Care Groups</a></li>
                        <li><a href="/department/{{$group->id}}">{{ $group->leader->first_name }} {{ $group->leader->last_name }}</a></li>
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
                            <form action="{{ action('DepartmentController@update', $group->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf

                                {{-- LEADER --}}
                                <div class="form-group row">
                                    <label for="leader" class="col-md-12 col-form-label text-md-left">Leader <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="leader" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }} py-0" id="leader" required autofocus>
                                            @foreach($users as $user)
                                                @if($user->id != Auth::id() && $user->type != 'master')
                                                    <option value="{{$user->id}}" {{$user->id == $group->leader_id ? 'selected' : ''}}>{{$user->first_name}} {{$user->last_name}}</option>
                                                @endif
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
                                        <select name="day_cg" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }} py-0" id="day_cg" required autofocus>
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

                                {{-- MEMBERS --}}
                                <div class="form-group row">
                                    <label for="members" class="col-md-12 col-form-label text-md-left">Members <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <ol id="members" class="ml-4">
                                            @foreach($group->members as $member)
                                                <li class="mb-1">
                                                    <select id="members" class="mb-1" name="members[]" required="required">
                                                        @foreach($users as $user)
                                                            @if($user->id != Auth::id() && $user->type != 'master' && $user->type != 'admin')
                                                                <option value="{{$user->id}}" {{$user->id === $member->id ? 'selected' : ''}}>{{$user->first_name}} {{$user->last_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span onclick="deleteItem(this)" style="cursor: pointer; color: rgb(231, 74, 59);"> X</span>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                <button type="button" class="ml-3 btn btn-outline-primary" onclick="append()"><i class="fa fa-plus"></i> Add Attribute</button>

                                <div class="form-group row mt-5 mb-0 text-center">
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

    <script>
        var values = [];
        var ids = [];
        @foreach($users as $user)
        @if($user->id != Auth::user()->id && $user->type != 'master' && $user->type != 'admin')
        values.push('{{$user->first_name}} {{$user->last_name}}');
        ids.push('{{$user->id}}');
        @endif
        @endforeach
        function append() {
            let newItem = document.createElement("li");
            newItem.classList.add('mb-1');

            let selectList = document.createElement("select");
            selectList.classList.add('mb-1');
            selectList.name = 'members[]';
            selectList.setAttribute("required", "required");

            for (let i = 0; i < values.length; i++) {
                let option = document.createElement("option");
                option.setAttribute("value", ids[i]);
                option.text = values[i];
                selectList.appendChild(option);
            }

            newItem.appendChild(selectList);

            let span = document.createElement("span");
            span.style = 'cursor: pointer; color: #e74a3b;';
            span.setAttribute("onclick","deleteItem(this)");
            span.innerHTML = " X";
            newItem.appendChild(span);

            let list = document.getElementById("members");
            list.insertBefore(newItem, list.childNodes[list.childNodes.length]);
        }

        function deleteItem(r) {
            document.getElementById("members").removeChild(r.parentNode);
        }

    </script>

@endsection