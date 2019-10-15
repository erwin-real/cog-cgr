<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() { return view('pages.myprofile.index')->with('user', Auth::user()); }

//    public function show($id) {
//        return ($id != auth()->user()->id) ? view('pages.myprofile.show')->with('user', User::find($id)) : redirect('/my-profile');
//    }

    public function edit() { return view('pages.myprofile.edit')->with('user', Auth::user()); }

    public function update(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'group_age' => 'required',
            'address' => 'required',
            'cluster_area' => 'required'
        ]);

        $user = Auth::user();
        $user->first_name = $validatedData['first_name'];
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $validatedData['last_name'];
        $user->gender = strtolower($validatedData['gender']);
        $user->group_age = $validatedData['group_age'];
        $user->address = $validatedData['address'];
        $user->cluster_area = strtolower($validatedData['cluster_area']);
        $user->birthday = $request->input('birthday');
        $user->contact = $request->input('contact');
//        $user->journey = $validatedData['journey'];
//        $user->cldp = $request->input('cldp');
        $user->remember_token = $request->input('_token');

        $user->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;
//        $user->head_cluster_area = ($request->input('head_cluster_area') || strlen($request->input('head_cluster_area')) > 0) ? strtolower($request->input('head_cluster_area')) : null;
        $user->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;

//        if (strlen($request->input('password')) != 0)
//            $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('/my-profile')
            ->with('user', $user)
            ->with('success', "User Updated Successfully !");
    }

    // CHANGE PASSWORD
    public function showChangePasswordForm(){ return view('pages.myprofile.changepassword')->with('user', Auth::user()); }

    public function changePassword(Request $request){
        $user = Auth::user();
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

        return redirect('/my-profile')->with("success","Password changed successfully !");
    }
}
