<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{

    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if($this->isLeaderAndDeptHead())
            return view('pages.department.index')->with('groups', Auth::user()->departmentGroups);

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see Department Care Groups.');
    }

    public function create() {
        if($this->isLeaderAndDeptHead())
            return view('pages.department.create')
                ->with('leaders', User::where('is_leader', true)->get())
                ->with('users', User::whereNull('cg_id')->get());
//            return view('pages.department.create')->with('users', User::all());

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to create a care group.');
    }

    public function store(Request $request) {
        if($this->isLeaderAndDeptHead()) {
            if (!$request->has('members'))
                return redirect('/department/create')
                    ->with('users', User::all())
                    ->with('error', "Please add member/s !");

            for ($i = 0; $i < count($request->input('members')); $i++) {
                if (Auth::id() == $request->input('members')[$i])
                    return redirect('/department/create')->with('error', 'Invalid members');
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
            if ($dups) return redirect('/department/create')->with('error', 'Cannot create the care group because it has duplicate members!');

            $validatedData = $request->validate([
                'leader' => 'required',
                'day_cg' => 'required',
                'time_cg' => 'required',
                'venue' => 'required',
                'type' => 'required',
                'cluster_area' => 'required'
            ]);

            for ($i = 0; $i < count($request->input('members')); $i++) {
                if ($request->input('members')[$i] == $validatedData['leader'])
                    return redirect('/department/create')->with('error', 'Cannot create the care group because the leader should not be one of the members!');
            }

            $group = new Group(array(
                'leader_id' => $validatedData['leader'],
                'department' => Auth::user()->head_department,
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

            return redirect('/department/' . $group->id)
                ->with('group', $group)
                ->with('success', "Care Group Created Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to create a care group.');
    }

    public function show($id) {
        if($this->isLeaderAndDeptHead())
            return view('pages.department.show')->with('group', Group::find($id));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see that care group.');
    }

    public function edit($id) {
        if($this->isLeaderAndDeptHead())
            return view('pages.department.edit')
                ->with('group', Group::find($id))
                ->with('leaders', User::where('is_leader', true)->get())
                ->with('users', User::whereNull('cg_id')->get()->merge(Group::find($id)->members));
//                ->with('users', User::all());

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update that care group.');
    }

    public function update(Request $request, $id) {
        if($this->isLeaderAndDeptHead()) {
            if (!$request->has('members'))
                return redirect('/department/create')
                    ->with('users', User::all())
                    ->with('error', "Please add member/s !");

            for ($i = 0; $i < count($request->input('members')); $i++) {
                if (Auth::user()->id == $request->input('members')[$i])
                    return redirect('/department/' . $id . '/edit')->with('error', 'Invalid members');
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
            if ($dups) return redirect('/department/' . $id . '/edit')->with('error', 'Cannot update the care group because it has duplicate members!');

            $validatedData = $request->validate([
                'leader' => 'required',
                'day_cg' => 'required',
                'time_cg' => 'required',
                'type' => 'required',
                'venue' => 'required',
                'cluster_area' => 'required'
            ]);


            for ($i = 0; $i < count($request->input('members')); $i++) {
                if ($request->input('members')[$i] == $validatedData['leader'])
                    return redirect()->back()->with('error', 'Cannot update the care group because the leader should not be one of the members!');
            }

            $group = Group::find($id);
            $group->leader_id = $validatedData['leader'];
            $group->department = Auth::user()->head_department;
            $group->time_cg = $validatedData['time_cg'];
            $group->venue = $validatedData['venue'];
            $group->type = $validatedData['type'];
            $group->cluster_area = $validatedData['cluster_area'];
            $group->day_cg = $validatedData['day_cg'];
            $group->save();

            $leader = User::find($validatedData['leader']);
            $leader->is_leader = 1;
            if ($leader->type == 'member') $leader->type = 'leader';
            $leader->save();

            foreach ($group->members as $user) {
                $user->cg_id = null;
                $user->save();
            }

            for ($i = 0; $i < count($request->input('members')); $i++) {
                $member = User::find($request->input('members')[$i]);
                $member->leader_id = $validatedData['leader'];
                $member->cg_id = $group->id;
                $member->save();
            }

            return redirect('/department/' . $group->id)
                ->with('group', $group)
                ->with('success', "Care Group Updated Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update this care group.');
    }

    public function destroy($id) {
        if($this->isLeaderAndDeptHead()) {
            $group = Group::find($id);

            foreach ($group->members as $member) {
                $member->cg_id = null;
                $member->save();
            }

            $group->delete();
            return redirect('/department')->with('success', 'Deleted care group successfully.');
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see delete that care group.');
    }

    private function isLeaderAndDeptHead() {
        return (
            Auth::user()->is_leader == 1 &&
//            count(Auth::user()->groups) > 0 &&
            Auth::user()->type == 'department head'
        ) ? true : false;
    }
}
