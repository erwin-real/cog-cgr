@extends('layouts.main')

@section('content')
    <div class="page-title-area shadow">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">My Reports</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="/my-reports">My Reports</a></li>
                        <li><a href="#">{{$group->day_cg}} {{ date('h:i A', strtotime($group->time_cg)) }}</a></li>
                        <li><span>Create</span></li>
{{--                        <li><a href="#">{{$group->day_cg}} {{ date('h:i A', strtotime($group->time_cg)) }}</a></li>--}}
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
                            <h4 class="header-title mb-0">Create New Report</h4>
                        </div>
                        <div class="mt-4">
                            <form action="{{ action('MyReportController@store') }}" method="POST">
                                @csrf

                                {{-- LEADER ID AND CG ID --}}
                                <div class="form-group row">
                                    <label for="leader" class="col-md-12 col-form-label text-md-left">Leader <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <span class="ml-3 font-weight-bold">{{$group->leader->first_name}} {{$group->leader->last_name}}</span>
                                        <input type="hidden" name="leader_id" value="{{$group->leader_id}}">
                                        <input type="hidden" name="cg_id" value="{{$group->id}}">
                                    </div>
                                </div>

                                {{-- DAY OF CARE GROUP --}}
                                <div class="form-group row">
                                    <label for="day_cg" class="col-md-12 col-form-label text-md-left">Day <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <select name="day_cg" class="form-control{{ $errors->has('day_cg') ? ' is-invalid' : '' }} py-0" id="day_cg" required autofocus>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
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
                                        <input id="time_cg" type="time" class="form-control{{ $errors->has('time_cg') ? ' is-invalid' : '' }}" name="time_cg" required autofocus>

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
                                        <input id="venue" type="text" class="form-control{{ $errors->has('venue') ? ' is-invalid' : '' }}" name="venue" required autofocus>

                                        @if ($errors->has('venue'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('venue') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- TOPIC --}}
                                <div class="form-group row">
                                    <label for="topic" class="col-md-12 col-form-label text-md-left">Topic <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <input id="topic" type="text" class="form-control{{ $errors->has('topic') ? ' is-invalid' : '' }}" name="topic" required autofocus>

                                        @if ($errors->has('topic'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('topic') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- OFFERING --}}
                                <div class="form-group row">
                                    <label for="offering" class="col-md-12 col-form-label text-md-left">Offering</label>

                                    <div class="col-md-12">
                                        <input id="offering" type="number" step=".01" class="form-control{{ $errors->has('offering') ? ' is-invalid' : '' }}" name="offering" autofocus>

                                        @if ($errors->has('offering'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('offering') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- PRESENT --}}
                                <div class="form-group row">
                                    <label for="present" class="col-md-12 col-form-label text-md-left">Present <span class="text-danger">*</span></label>

                                    <div class="col-md-12">
                                        <ol id="present" class="ml-4">
                                            <li class="mb-1">
                                                <select id="present" class="mb-1" name="present[]" required="required">
                                                    @foreach($group->members as $member)
                                                        <option value="{{$member->id}}">{{$member->first_name}} {{$member->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            <span onclick="deleteItem(this)" style="cursor: pointer; color: rgb(231, 74, 59);"> X</span>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <button type="button" class="ml-3 btn btn-outline-primary" onclick="append()"><i class="fa fa-plus"></i> Add Member Present</button>

                                {{-- CONSOLIDATION REPORT --}}
                                <div class="form-group row mt-5">
                                    <label for="consolidation_report" class="col-md-12 col-form-label text-md-left">
                                        Consolidation Report
                                    </label>

                                    <div class="col-md-12">
                                        <textarea id="consolidation_report" type="text" rows="10"
                                               class="form-control{{ $errors->has('consolidation_report') ? ' is-invalid' : '' }}"
                                                  name="consolidation_report" autofocus></textarea>

                                        @if ($errors->has('consolidation_report'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('consolidation_report') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-5 mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-check"></i> Submit
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
        @foreach($group->members as $member)
            values.push('{{$member->first_name}} {{$member->last_name}}');
            ids.push('{{$member->id}}');
        @endforeach
        function append() {
            let newItem = document.createElement("li");
            newItem.classList.add('mb-1');

            let selectList = document.createElement("select");
            selectList.classList.add('mb-1');
            selectList.name = 'present[]';
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

            let list = document.getElementById("present");
            list.insertBefore(newItem, list.childNodes[list.childNodes.length]);
        }

        function deleteItem(r) {
            document.getElementById("present").removeChild(r.parentNode);
        }

    </script>

@endsection