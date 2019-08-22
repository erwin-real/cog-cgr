<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\DeclareDeclare;

class AccountController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.accounts.index')->with('accounts', User::orderBy('created_at', 'desc')->paginate(20));
    }

    public function create() {
        return view('pages.accounts.create');
    }

    public function store(Request $request) {
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

        $account = new User(array(
            'first_name' => $validatedData['first_name'],
            'middle_name' => $request->input('middle_name'),
            'last_name' => $validatedData['last_name'],
            'email' => $request->input('email'),
            'gender' => strtolower($validatedData['gender']),
            'age' => $validatedData['age'],
            'group_age' => $validatedData['group_age'],
            'address' => $validatedData['address'],
            'cluster_area' => $validatedData['cluster_area'],
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'leader_id' => $validatedData['leader_id'],
            'head_cluster_area' => $request->input('head_cluster_area'),
            'birthday' => $request->input('birthday'),
            'contact' => $request->input('contact'),
            'journey' => $validatedData['journey'],
            'cldp' => $request->input('cldp'),
            'type' => $validatedData['type'],
            'is_leader' => $validatedData['is_leader'],
            'is_active' => $validatedData['is_active'],
            'remember_token' => $request->input('_token')
        ));
        $account->save();

        return redirect('/accounts/'. $account->id)
            ->with('account', $account)
            ->with('success', "Account Created Successfully !");
    }

    public function show($id) {
        return view('pages.accounts.show')->with('account', User::find($id));
    }

    public function edit($id) {
        $account = User::find($id);
        return view('pages.accounts.edit')
            ->with('account', $account);
//            ->with('pass', Hash::needsRehash($account->password));
    }

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

        $account = User::find($id);
        $account->first_name = $validatedData['first_name'];
        $account->middle_name = $request->input('middle_name');
        $account->last_name = $validatedData['last_name'];
        $account->email = $request->input('email');
        $account->gender = strtolower($validatedData['gender']);
        $account->age = $validatedData['age'];
        $account->group_age = $validatedData['group_age'];
        $account->username = $request->input('username');
        $account->address = $validatedData['address'];
        $account->cluster_area = $validatedData['cluster_area'];
        $account->leader_id = $validatedData['leader_id'];
        $account->birthday = $request->input('birthday');
        $account->head_cluster_area = $request->input('head_cluster_area');
        $account->contact = $request->input('contact');
        $account->journey = $validatedData['journey'];
        $account->cldp = $request->input('cldp');
        $account->type = $validatedData['type'];
        $account->is_leader = $validatedData['is_leader'];
        $account->is_active = $validatedData['is_active'];
        $account->remember_token = $request->input('_token');

        if (strlen($request->input('password')) != 0)
            $account->password = Hash::make($request->input('password'));

        $account->save();

        return redirect('/accounts/'. $account->id)
            ->with('account', $account)
            ->with('success', "Account Updated Successfully !");
    }

    public function destroy($id) {
        $account = User::find($id);
        $account->delete();

        return redirect('/accounts')->with("success","Deleted Account Successfully !");
    }

    // CHANGE PASSWORD
    public function showChangePasswordForm(Request $request){
        return view('pages.accounts.changepassword')->with('account', User::find($request->get('id')));
    }

    public function changePassword(Request $request){
        $account = User::find($request->input('id'));
        if (!(Hash::check($request->get('current-password'), $account->password))) {
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
        $account->password = bcrypt($validatedData['new-password']);
        $account->save();

        return redirect('/accounts/'.$account->id)->with("success","Password changed successfully !");
    }

    public function isUserType($type) {
        return (User::find(auth()->user()->id)->type == $type) ? true : false;
    }

}
