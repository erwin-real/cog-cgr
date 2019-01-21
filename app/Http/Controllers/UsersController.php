<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { $this->middleware('auth'); }

    public function guideUsers() {
        if ($this->isUserType('admin'))
            return view('pages.guides.users');

        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function users() {
        if ($this->isUserType('admin')) {
            return view('pages.users.users')
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(10));
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function addUser() {
        if ($this->isUserType('admin'))
            return view('pages.users.create');

        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function saveUser(Request $request) {
        if ($this->isUserType('admin')) {
            $user = new User;

            if ($request->get('username')) {
                $validatedData = $request->validate([
                    'name' => 'required',
                    'username' => 'max:255|unique:users',
                    'password' => 'confirmed'
                ]);
                $user->username = $validatedData['username'];
            } else {
                $validatedData = $request->validate([
                    'name' => 'required',
                    'password' => 'confirmed'
                ]);
            }

            $user->name = $validatedData['name'];
            $user->password = bcrypt($validatedData['password']);
            $user->remember_token = $request->get('_token');

            if ($request->get('email') == null) $user->email = null;
            else {
                $validateEmail = $request->validate([ 'email' => 'max:255|unique:users' ]);
                $user->email = $validateEmail['email'];
            }

            $user->type = $request->get('type');
            $user->address = $request->get('address');
            $user->cluster_area = $request->get('cluster_area');
            $user->head_cluster_area = $request->get('head_cluster_area');
            $user->birthday = $request->get('birthday');
            $user->contact_number = $request->get('number');
            $user->gender = $request->get('gender');
            $user->group_age = $request->get('group_age');
            $user->journey = $request->get('journey');
            $user->cldp = $request->get('cldp');
            $user->save();

            return redirect('/users')
                ->with('success', 'Added new user '. $validatedData['name'])
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(20));
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function showUser($id) {
        if ($this->isUserType('admin'))
            return view('pages.users.show')->with('user', User::find($id));

        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function editUser($id) {
        if ($this->isUserType('admin')) {
            return view('pages.users.edit')
                ->with('user', User::find($id));
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function updateUser(Request $request, $id) {
        if ($this->isUserType('admin')) {
            $user = User::find($id);

            if ($request->get('email') != $user->email && $request->get('username') != $user->username) {
                $validatedData = $request->validate([
                    'email' => 'string|email|max:255|unique:users',
                    'username' => 'string|max:255|unique:users'
                ]);
                $user->email = $validatedData['email'];
                $user->username = $validatedData['username'];
            } else if ($request->get('email') != $user->email) {
                $validatedData = $request->validate([ 'email' => 'string|email|max:255|unique:users' ]);
                $user->email = $validatedData['email'];
            } else if ($request->get('username') != $user->username) {
                $validatedData = $request->validate([ 'username' => 'string|max:255|unique:users' ]);
                $user->username = $validatedData['username'];
            }

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->remember_token = $request->get('_token');

            $user->save();

            return redirect('/users')
                ->with('success', 'Updated user '. $user->name)
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(20));
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function destroyUser($id) {
        if ($this->isUserType('admin')) {
            $user = User::find($id);
            $user->delete();

            return redirect('/users')
                ->with('success', 'Deleted user ' . $user->name)
                ->with('users', User::orderBy('updated_at', 'desc')->paginate(20));
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function isUserType($type) {
        return (User::find(auth()->user()->id)->type == $type) ? true : false;
    }
}
