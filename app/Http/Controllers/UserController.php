<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\DeclareDeclare;

class UserController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if ($this->isAdminOrMaster())
            return view('pages.users.index')->with('users', User::orderBy('created_at', 'desc')->paginate(20));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see all users.');
    }

    public function create() {
        if ($this->isAdminOrMaster())
            return view('pages.users.create');

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to create users.');
    }

    public function store(Request $request) {
        if ($this->isAdminOrMaster()) {
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
                'is_leader' => 'required',
                'is_active' => 'required'
            ]);

            $user = new User(array(
                'first_name' => $validatedData['first_name'],
                'middle_name' => $request->input('middle_name'),
                'last_name' => $validatedData['last_name'],
                'gender' => strtolower($validatedData['gender']),
                'age' => $validatedData['age'],
                'group_age' => $validatedData['group_age'],
                'address' => $validatedData['address'],
                'cluster_area' => strtolower($validatedData['cluster_area']),
                'password' => Hash::make($request->input('password')),
                'leader_id' => 0,
                'birthday' => $request->input('birthday'),
                'contact' => $request->input('contact'),
                'journey' => $validatedData['journey'],
                'cldp' => $request->input('cldp'),
                'type' => $validatedData['type'],
                'is_leader' => $validatedData['is_leader'],
                'is_active' => $validatedData['is_active'],
                'remember_token' => $request->input('_token')
            ));

            $user->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;
            $user->head_cluster_area = ($request->input('head_cluster_area') || strlen($request->input('head_cluster_area')) > 0) ? $request->input('head_cluster_area') : null;
            $user->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;

            $user->save();

            return redirect('/users/' . $user->id)
                ->with('user', $user)
                ->with('success', "User Created Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to create users.');
    }

    public function show($id) {
        if ($this->isAdminOrMaster())
            return view('pages.users.show')->with('user', User::find($id));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see that user.');
    }

    public function edit($id) {
        if ($this->isAdminOrMaster())
            return view('pages.users.edit')->with('user', User::find($id));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update that user.');
    }

    public function update(Request $request, $id) {
        if ($this->isAdminOrMaster()) {

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
                'is_leader' => 'required',
                'is_active' => 'required'
            ]);

            $user = User::find($id);
            $user->first_name = $validatedData['first_name'];
            $user->middle_name = $request->input('middle_name');
            $user->last_name = $validatedData['last_name'];
            $user->gender = strtolower($validatedData['gender']);
            $user->age = $validatedData['age'];
            $user->group_age = $validatedData['group_age'];
            $user->address = $validatedData['address'];
            $user->cluster_area = strtolower($validatedData['cluster_area']);
            $user->birthday = $request->input('birthday');
            $user->contact = $request->input('contact');
            $user->journey = $validatedData['journey'];
            $user->cldp = $request->input('cldp');
            $user->type = $validatedData['type'];
            $user->is_leader = $validatedData['is_leader'];
            $user->is_active = $validatedData['is_active'];
            $user->remember_token = $request->input('_token');

            $user->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;
            $user->head_cluster_area = ($request->input('head_cluster_area') || strlen($request->input('head_cluster_area')) > 0) ? strtolower($request->input('head_cluster_area')) : null;
            $user->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;

            if (strlen($request->input('password')) != 0)
                $user->password = Hash::make($request->input('password'));

            $user->save();

            return redirect('/users/' . $user->id)
                ->with('user', $user)
                ->with('success', "User Updated Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update that user.');
    }

    public function destroy($id) {
        if ($this->isAdminOrMaster()) {
            $user = User::find($id);
            $user->delete();

            return redirect('/users')->with("success","Deleted User Successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to update that user.');
    }

    private function isAdminOrMaster() { return (Auth::user()->type == 'admin' || Auth::user()->type == 'master') ? true : false; }

    // CHANGE PASSWORD
    public function showChangePasswordForm(Request $request){
        if ($this->isAdminOrMaster())
            return view('pages.users.changepassword')->with('user', User::find($request->get('id')));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege.');
    }

    public function changePassword(Request $request){
        if ($this->isAdminOrMaster()) {
            $user = User::find($request->input('id'));
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:6|confirmed',
            ]);
            //Change Password
            $user->password = bcrypt($validatedData['new-password']);
            $user->save();

            return redirect('/users/' . $user->id)->with("success", "Password changed successfully !");
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege.');
    }

}
