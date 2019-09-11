<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function __construct() { $this->middleware('auth'); }

    public function index(Request $request) {
//        dd($request);
//        dd(Group::where('leader_id', $request->input('id'))->first());
//        if ($request->has('id') && Group::where('leader_id', $request->input('id'))->first())
//            return view('pages.groups.show')->with('group', Group::where('leader_id', $request->input('id'))->get());
        if ($this->isAdminOrMaster())
            return view('pages.groups.index')->with('groups', Group::sortable()->paginate(20));

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to see all care groups.');
    }

    public function create() {
        if ($this->isAdminOrMaster())
            return view('pages.groups.create')->with('users', User::all());

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to create care groups.');
    }

    public function store(Request $request) {
        if ($this->isAdminOrMaster()) {

            if (!$request->has('members'))
                return redirect('/caregroups/create')
                    ->with('users', User::all())
                    ->with('error', "Please add member/s !");

            for ($i = 0; $i < count($request->input('members')); $i++) {
                if (Auth::id() == $request->input('members')[$i])
                    return redirect('/caregroups/create')->with('error', 'Invalid members');
            }

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
                'department' => 'required',
                'day_cg' => 'required',
                'type' => 'required',
                'time_cg' => 'required',
                'venue' => 'required',
                'cluster_area' => 'required'
            ]);

            $group = new Group(array(
                'leader_id' => $validatedData['leader'],
                'department' => $validatedData['department'],
                'time_cg' => $validatedData['time_cg'],
                'type' => $validatedData['type'],
                'venue' => $validatedData['venue'],
                'day_cg' => $validatedData['day_cg'],
                'cluster_area' => strtolower($validatedData['cluster_area'])
            ));
            $group->save();

            $leader = User::find($validatedData['leader']);
            $leader->is_leader = 1;
            if ($leader->type == 'member') $leader->type = 'leader';
            $leader->save();

            for ($i = 0; $i < count($request->input('members')); $i++) {
                $member = User::find($request->input('members')[$i]);
                $member->leader_id = $validatedData['leader'];
                $member->cg_id = $group->id;
                $member->save();
            }

            return redirect('/caregroups/' . $group->id)
                ->with('group', $group)
                ->with('success', "Care Group Created Successfully !");

        }
        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to create care groups.');
    }

    public function show($id) {
        if ($this->isAdminOrMaster())
            return view('pages.groups.show')->with('group', Group::find($id));

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to see that care group.');
    }

    public function edit($id) {
        if ($this->isAdminOrMaster())
            return view('pages.groups.edit')
                ->with('group', Group::find($id))
                ->with('users', User::all());

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to update that care group.');
    }

    public function update(Request $request, $id) {
        if ($this->isAdminOrMaster()) {

            if (!$request->has('members'))
                return redirect('/caregroups/create')
                    ->with('users', User::all())
                    ->with('error', "Please add member/s !");

            for ($i = 0; $i < count($request->input('members')); $i++) {
                if (Auth::user()->id == $request->input('members')[$i])
                    return redirect('/caregroups/' . $id . '/edit')->with('error', 'Invalid members');
            }

            $my_arr = $request->get('members');
            $dups = $new_arr = array();
            foreach ($my_arr as $key => $val) {
                if (!isset($new_arr[$val])) $new_arr[$val] = $key;
                else {
                    if (isset($dups[$val])) $dups[$val][] = $key;
                    else $dups[$val] = array($key);
                }
            }
            if ($dups) return redirect('/caregroups/' . $id . '/edit')->with('error', 'Cannot create the care group because it has duplicate members!');

            $validatedData = $request->validate([
                'leader' => 'required',
                'department' => 'required',
                'day_cg' => 'required',
                'time_cg' => 'required',
                'type' => 'required',
                'venue' => 'required',
                'cluster_area' => 'required'
            ]);

            $group = Group::find($id);
            $group->leader_id = $validatedData['leader'];
            $group->department = $validatedData['department'];
            $group->time_cg = $validatedData['time_cg'];
            $group->type = $validatedData['type'];
            $group->venue = $validatedData['venue'];
            $group->cluster_area = $validatedData['cluster_area'];
            $group->day_cg = $validatedData['day_cg'];
            $group->save();

            $leader = User::find($validatedData['leader']);
            $leader->is_leader = 1;
            if ($leader->type == 'member') $leader->type = 'leader';
            $leader->save();

            for ($i = 0; $i < count($request->input('members')); $i++) {
                $member = User::find($request->input('members')[$i]);
                $member->leader_id = $validatedData['leader'];
                $member->cg_id = $group->id;
                $member->save();
            }

            return redirect('/caregroups/' . $group->id)
                ->with('group', $group)
                ->with('success', "Care Group Updated Successfully !");
        }

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to update that care group.');
    }

    public function destroy($id) {
        if ($this->isAdminOrMaster()) {
            $group = Group::find($id);
            $group->delete();

            return redirect('/caregroups')->with("success", "Deleted Care Group Successfully !");
        }

        return redirect('/my-care-group')->with('error', 'You don\'t have the privilege to delete that care group.');
    }

    private function isAdminOrMaster() { return (Auth::user()->type == 'admin' || Auth::user()->type == 'master') ? true : false; }
}
