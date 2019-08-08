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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.users.index')->with('users', User::orderBy('created_at', 'desc')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        dd($request);
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
            'leader_id' => 'required',
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
            'leader_id' => $validatedData['leader_id'],
            'birthday' => $request->input('birthday'),
            'contact' => $request->input('contact'),
            'journey' => $validatedData['journey'],
            'cldp' => $request->input('cldp'),
            'cg_id' => $request->input('cg_id'),
            'type' => $validatedData['type'],
            'is_leader' => $validatedData['is_leader'],
            'is_active' => $validatedData['is_active'],
            'remember_token' => $request->input('_token')
        ));

        $user->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;
        $user->head_cluster_area = ($request->input('head_cluster_area') || strlen($request->input('head_cluster_area')) > 0) ? $request->input('head_cluster_area') : null;
        $user->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;

        $user->save();

        return redirect('/users/'. $user->id)
            ->with('user', $user)
            ->with('success', "User Created Successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.users.show')->with('user', User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('pages.users.edit')
            ->with('user', $user);
//            ->with('pass', Hash::needsRehash($user->password));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'group_age' => 'required',
            'address' => 'required',
            'cluster_area' => 'required',
            'journey' => 'required',
            'type' => 'required',
            'leader_id' => 'required',
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
        $user->leader_id = $validatedData['leader_id'];
        $user->birthday = $request->input('birthday');
        $user->contact = $request->input('contact');
        $user->journey = $validatedData['journey'];
        $user->cldp = $request->input('cldp');
        $user->cg_id = $request->input('cg_id');
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

        return redirect('/users/'. $user->id)
            ->with('user', $user)
            ->with('success', "User Updated Successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with("success","Deleted User Successfully !");
    }

    // CHANGE PASSWORD
    public function showChangePasswordForm(Request $request){
        return view('pages.users.changepassword')->with('user', User::find($request->get('id')));
    }

    public function changePassword(Request $request){
        $user = User::find($request->input('id'));
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user->password = bcrypt($validatedData['new-password']);
        $user->save();

        return redirect('/users/'.$user->id)->with("success","Password changed successfully !");
    }

    public function isUserType($type) {
        return (auth()->user()->type == $type) ? true : false;
    }
}
