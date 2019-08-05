<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.groups.index')->with('groups', Group::orderBy('created_at', 'desc')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.groups.create')->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'leader' => 'required',
            'day_cg' => 'required',
            'time_cg' => 'required',
            'venue' => 'required',
            'cluster_area' => 'required'
        ]);

        $group = new Group(array(
            'leader_id' => $validatedData['leader'],
            'time_cg' => $validatedData['time_cg'],
            'venue' => $validatedData['venue'],
            'cluster_area' => $validatedData['cluster_area']
        ));
        $group->day_cg = $validatedData['day_cg'];
        $group->save();

        $leader = User::find($validatedData['leader']);
        $leader->is_leader = 1;
        $leader->save();

        return redirect('/caregroups/'. $group->id)
            ->with('group', $group)
            ->with('success', "Care Group Created Successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.groups.show')->with('group', Group::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.groups.edit')
            ->with('group', Group::find($id))
            ->with('users', User::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'leader' => 'required',
            'day_cg' => 'required',
            'time_cg' => 'required',
            'venue' => 'required',
            'cluster_area' => 'required'
        ]);

        $group = Group::find($id);
        $group->leader_id = $validatedData['leader'];
        $group->time_cg = $validatedData['time_cg'];
        $group->venue = $validatedData['venue'];
        $group->cluster_area = $validatedData['cluster_area'];
        $group->day_cg = $validatedData['day_cg'];
        $group->save();

        $leader = User::find($validatedData['leader']);
        $leader->is_leader = 1;
        $leader->save();

        return redirect('/caregroups/'. $group->id)
            ->with('group', $group)
            ->with('success', "Care Group Updated Successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $group = Group::find($id);
        $group->delete();

        return redirect('/caregroups')->with("success","Deleted Care Group Successfully !");
    }
}
