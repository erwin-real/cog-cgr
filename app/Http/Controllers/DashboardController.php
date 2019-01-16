<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('dashboard');
    }


    //////////////////////////////////////////////////////////////////////////
    // RESET PASSWORD
    //////////////////////////////////////////////////////////////////////////

    public function showResetPasswordForm($id){
        if ($this->isUserType('admin')) {
            return view('auth.passwords.reset')
                ->with('user', User::find($id));
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function resetPassword(Request $request){
        if ($this->isUserType('admin')) {
            $validatedData = $request->validate([ 'password' => 'required|string|min:6|confirmed' ]);
            //Change Password
            $user = User::find($request->get('id'));
            $user->password = bcrypt($validatedData['password']);
            $user->save();
            return redirect('/users')->with("success","Password changed successfully !");
        }
        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function isUserType($type) {
        return (User::find(auth()->user()->id)->type == $type) ? true : false;
    }
}
