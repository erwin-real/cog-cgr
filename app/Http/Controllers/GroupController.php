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

    public function index(Request $request) {
//        dd($request);
//        dd(Group::where('leader_id', $request->input('id'))->first());
        if ($request->has('id') && Group::where('leader_id', $request->input('id'))->first())
            return view('pages.groups.show')->with('group', Group::where('leader_id', $request->input('id'))->get());

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
        if (!$request->has('members'))
            return redirect('/caregroups/create')
                ->with('users', User::all())
                ->with('error', "Please add member/s !");

        $my_arr = $request->get('members');
        $dups = $new_arr = array();
        foreach ($my_arr as $key => $val) {
            if (!isset($new_arr[$val])) $new_arr[$val] = $key;
            else {
                if (isset($dups[$val])) $dups[$val][] = $key;
                else $dups[$val] = array($key);
            }
        }
        if ($dups) return redirect('/caregroups/create')->with('error', 'Cannot create the care group because it has duplicate members!');

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
            'day_cg' => $validatedData['day_cg'],
            'cluster_area' => strtolower($validatedData['cluster_area'])
        ));
        $group->save();

        $leader = User::find($validatedData['leader']);
        $leader->is_leader = 1;
        $leader->save();

        for($i = 0; $i < count($request->input('members')); $i++) {
            $member = User::find($request->input('members')[$i]);
            $member->leader_id = $validatedData['leader'];
            $member->cg_id = $group->id;
            $member->save();
        }

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
        if (!$request->has('members'))
            return redirect('/caregroups/create')
                ->with('users', User::all())
                ->with('error', "Please add member/s !");

        $my_arr = $request->get('members');
        $dups = $new_arr = array();
        foreach ($my_arr as $key => $val) {
            if (!isset($new_arr[$val])) $new_arr[$val] = $key;
            else {
                if (isset($dups[$val])) $dups[$val][] = $key;
                else $dups[$val] = array($key);
            }
        }
        if ($dups) return redirect('/caregroups/create')->with('error', 'Cannot create the care group because it has duplicate members!');

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

        for($i = 0; $i < count($request->input('members')); $i++) {
            $member = User::find($request->input('members')[$i]);
            $member->leader_id = $validatedData['leader'];
            $member->cg_id = $group->id;
            $member->save();
        }

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
