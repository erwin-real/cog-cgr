<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCareGroupController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if(Auth::user()->is_leader == 1 && count(Auth::user()->groups) > 0 && Auth::user()->type != 'master')
            return view('pages.mycaregroup.index')->with('user', Auth::user());

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $group = Group::find($id);
        if ($group->leader->id == auth()->user()->id)
            return view('pages.mycaregroup.edit')
                ->with('group', $group)
                ->with('users', User::all());

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $group = Group::find($id);
        if ($group->leader->id == auth()->user()->id) {
            if (!$request->has('members'))
                return redirect('/my-care-group/' . $id . '/edit')
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
            if ($dups) return redirect('/my-care-group/' . $id . '/edit')->with('error', 'Cannot update the care group because it has duplicate members!');

            $validatedData = $request->validate([
                'day_cg' => 'required',
                'time_cg' => 'required',
                'venue' => 'required',
                'cluster_area' => 'required'
            ]);

            $group = Group::find($id);
            $group->time_cg = $validatedData['time_cg'];
            $group->venue = $validatedData['venue'];
            $group->cluster_area = $validatedData['cluster_area'];
            $group->day_cg = $validatedData['day_cg'];
            $group->save();

            // REMOVE CG_ID & LEADER_ID
            foreach ($group->members as $member) {
                $member->cg_id = null;
                $member->leader_id = 0;
                $member->save();
            }

            for ($i = 0; $i < count($request->input('members')); $i++) {
                $member = User::find($request->input('members')[$i]);
                $member->leader_id = Auth::id();
                $member->cg_id = $group->id;
                $member->save();
            }

            return redirect('/my-care-group')
                ->with('success', "Care Group Updated Successfully !");
        }

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege.');
    }
}
