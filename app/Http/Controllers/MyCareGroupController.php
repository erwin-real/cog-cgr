<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCareGroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.mycaregroup.index')->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.mycaregroup.edit')
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
}
