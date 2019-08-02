<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\DeclareDeclare;

class UserController extends Controller
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
        return view('pages.users.index')->with('users', User::orderBy('created_at', 'desc')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.users.create')
            ->with('leaders', User::where('is_leader', 1)->orderBy('first_name', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = new User(array(
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
            'age' => $request->input('age'),
            'group_age' => $request->input('group_age'),
            'address' => $request->input('address'),
            'cluster_area' => $request->input('cluster_area'),
            'head_cluster_area' => $request->input('head_cluster_area'),
            'contact' => $request->input('contact'),
            'journey' => $request->input('journey'),
            'cldp' => $request->input('cldp'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type'),
            'leader_id' => $request->input('leader_id'),
            'is_leader' => $request->input('is_leader'),
            'is_active' => $request->input('is_active')
        ));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    // CHANGE PASSWORD
    public function showChangePasswordForm(){
        return view('pages.users.changepassword')->with('account', Auth::user());
    }

    public function changePassword(Request $request){
//        dd($request);
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
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
        $user = Auth::user();
        $user->password = bcrypt($validatedData['new-password']);
        $user->save();

        return redirect('/account')->with("success","Password changed successfully !");
    }

    public function isUserType($type) {
        return (User::find(auth()->user()->id)->type == $type) ? true : false;
    }
}
