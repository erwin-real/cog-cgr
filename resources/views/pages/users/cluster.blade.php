<div class="row mt-5 mb-5">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">{{$user->head_cluster_area}} care groups</h4>
                </div>
                <div class="market-status-table mt-4">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Leader</th>
                                    <th>Department</th>
                                    <th>Type</th>
                                    <th>Members</th>
                                    <th>Active</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                    <th>Date Added</th>
                                    <th>Date Modified</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->clusterCareGroups as $group)
                                    <tr>
                                        @if($group->leader_id == Auth::id())
                                            <td><a href="/my-care-group">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                        @else
                                            <td><a href="/cluster/{{$group->id}}">{{$group->leader->first_name}} {{$group->leader->last_name}}</a></td>
                                        @endif
                                        <td>{{ucfirst($group->department)}}</td>
                                        <td>{{$group->type == 'cg' ? 'Care Group' : 'C2S'}}</td>
                                        <td>{{count($group->members)}}</td>
                                        <td>{{count($group->activeMembers)}}</td>
                                        <td>{{$group->day_cg}}</td>
                                        <td>{{ date('h:i A', strtotime($group->time_cg)) }}</td>
                                        <td>{{ucfirst($group->venue)}}</td>
                                        <td>{{ date('D M d, Y h:i a', strtotime($group->created_at)) }}</td>
                                        <td>{{ date('D M d, Y h:i a', strtotime($group->updated_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>