<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\DeclareDeclare;

class UserController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if ($this->isDeptHeadOrAdminOrMaster()) {
            if (Auth::user()->type == 'department head')
                return view('pages.users.index')
                    ->with('users', User::where('group_age', Auth::user()->head_department)->sortable()->get());
//            ->with('users', User::where('group_age', Auth::user()->head_department)->sortable()->paginate(20));

            return view('pages.users.index')
                ->with('users', User::where('group_age', '!=', 'none')->sortable()->get());
//            return view('pages.users.index')->with('users', User::sortable()->paginate(20));
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see all users.');
    }

    public function create() {
        if ($this->isDeptHeadOrAdminOrMaster())
            return view('pages.users.create');

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to create users.');
    }

    public function store(Request $request) {
        if ($this->isDeptHeadOrAdminOrMaster()) {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'group_age' => 'required',
                'address' => 'required',
                'cluster_area' => 'required',
                'journey' => 'required',
                'type' => 'required',
                'is_active' => 'required'
            ]);

            if ($validatedData['type'] != 'member') {
                if ($validatedData['type'] == 'cluster head') {
                    $head_cluster_area = Validator::make($request->all(), [
                        'head_cluster_area' => 'required',
                        'username' => 'required',
                        'password' => 'required'
                    ]);
                    if ($head_cluster_area->fails()) return redirect()->back()->withErrors($head_cluster_area)->withInput();
                }

                $usernameAndPassword = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required'
                ]);

                if ($usernameAndPassword->fails())
                    return redirect()->back()->withErrors($usernameAndPassword)->withInput();
            }

            $user = new User(array(
                'first_name' => ucfirst($validatedData['first_name']),
                'middle_name' => ucfirst($request->input('middle_name')),
                'last_name' => ucfirst($validatedData['last_name']),
                'gender' => strtolower($validatedData['gender']),
                'age' => $validatedData['age'],
                'group_age' => strtolower($validatedData['group_age']),
                'address' => $validatedData['address'],
                'cluster_area' => strtolower($validatedData['cluster_area']),
                'leader_id' => 0,
                'birthday' => $request->input('birthday'),
                'contact' => $request->input('contact'),
                'journey' => $validatedData['journey'],
                'cldp' => $request->input('cldp'),
                'type' => $validatedData['type'],
                'is_active' => $validatedData['is_active'],
                'remember_token' => $request->input('_token')
            ));

            $user->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;

            if ($validatedData['type'] != 'member') {
                $user->is_leader = 1;
                $user->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;
                $user->password = Hash::make($request->input('password'));
                $user->head_cluster_area = ($validatedData['type'] == 'cluster head') ? $request->input('head_cluster_area') : null;
                $user->head_department = ($validatedData['type'] == 'department head') ? $request->input('head_department') : null;
            } else $user->is_leader = 0;

            $user->save();

            return redirect('/users/' . $user->id)
                ->with('user', $user)
                ->with('success', "User Created Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to create users.');
    }

    public function show($id) {
        if ($this->isDeptHeadOrAdminOrMaster()) {
            $user = User::find($id);
            if (
                (Auth::user()->type == 'department head' && strtolower($user->group_age) == Auth::user()->head_department) ||
                Auth::user()->type == 'admin' || Auth::user()->type == 'master'
            )
                return view('pages.users.show')->with('user', $user);
            else if (Auth::user()->type == 'department head' && $user->group_age != Auth::user()->head_department)
                return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see that user.');
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see that user.');
    }

    public function edit($id) {
        if ($this->isDeptHeadOrAdminOrMaster())
            return view('pages.users.edit')->with('user', User::find($id));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update that user.');
    }

    public function update(Request $request, $id) {
        if ($this->isDeptHeadOrAdminOrMaster()) {

            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'group_age' => 'required',
                'address' => 'required',
                'cluster_area' => 'required',
                'journey' => 'required',
                'type' => 'required',
                'is_active' => 'required'
            ]);

            if ($validatedData['type'] != 'member') {
                if ($validatedData['type'] == 'cluster head') {
                    $head_cluster_area = Validator::make($request->all(), [
                        'head_cluster_area' => 'required',
                        'username' => 'required'
                    ]);
                    if ($head_cluster_area->fails()) return redirect()->back()->withErrors($head_cluster_area)->withInput();
                }

                $username = Validator::make($request->all(), [ 'username' => 'required' ]);

                if ($username->fails())
                    return redirect()->back()->withErrors($username)->withInput();
            }

            $user = User::find($id);
            $user->first_name = ucfirst($validatedData['first_name']);
            $user->middle_name = ucfirst($request->input('middle_name'));
            $user->last_name = ucfirst($validatedData['last_name']);
            $user->gender = strtolower($validatedData['gender']);
            $user->age = $validatedData['age'];
            $user->group_age = strtolower($validatedData['group_age']);
            $user->address = $validatedData['address'];
            $user->cluster_area = strtolower($validatedData['cluster_area']);
            $user->birthday = $request->input('birthday');
            $user->contact = $request->input('contact');
            $user->journey = $validatedData['journey'];
            $user->cldp = $request->input('cldp');
            $user->type = $validatedData['type'];
            $user->is_active = $validatedData['is_active'];
            $user->remember_token = $request->input('_token');

            $user->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;

            if ($validatedData['type'] != 'member') {
                $user->is_leader = 1;
                $user->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;
                $user->head_cluster_area = ($validatedData['type'] == 'cluster head') ? $request->input('head_cluster_area') : null;
                $user->head_department = ($validatedData['type'] == 'department head') ? $request->input('head_department') : null;
            } else {
                $user->username = null;
                $user->password = null;
                $user->is_leader = 0;
            }

            $user->save();

            return redirect('/users/' . $user->id)
                ->with('user', $user)
                ->with('success', "User Updated Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update that user.');
    }

    public function destroy($id) {
        if ($this->isDeptHeadOrAdminOrMaster()) {
            $user = User::find($id);
            $user->delete();

            return redirect('/users')->with("success","Deleted User Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to delete that user.');
    }

    private function isDeptHeadOrAdminOrMaster() {
        return (Auth::user()->type == 'admin' || Auth::user()->type == 'master' || Auth::user()->type == 'department head') ? true : false;
    }

    public function showChangePasswordForm(Request $request){
        if ($this->isDeptHeadOrAdminOrMaster())
            return view('pages.users.changepassword')->with('user', User::find($request->get('id')));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to change someone\'s password.');
    }

    public function changePassword(Request $request){
        if ($this->isDeptHeadOrAdminOrMaster()) {
            $user = User::find($request->input('id'));
            $validatedData = $request->validate([
                'new-password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = bcrypt($validatedData['new-password']);
            $user->save();

            return redirect('/users/' . $user->id)->with("success", "User's Password changed successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to change someone\'s password.');
    }

}
