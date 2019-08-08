<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{

    public function __construct() { $this->middleware('auth'); }

    public function show($id) {
        $member = User::find($id);
        if (auth()->user()->id == $member->leader_id)
            return view('pages.members.show')->with('member', $member);

        return redirect('/my-profile')
            ->with('error', 'You don\'t have the privilege.');
    }

    public function edit($id) {
        $member = User::find($id);
        if (auth()->user()->id == $member->leader_id)
            return view('pages.members.edit')->with('member', $member);

        return redirect('/my-profile')
            ->with('error', 'You don\'t have the privilege.');
    }

    public function update(Request $request, $id) {
        $member = User::find($id);
        if (auth()->user()->id == $member->leader_id) {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'group_age' => 'required',
                'address' => 'required',
                'cluster_area' => 'required',
                'is_active' => 'required',
                'journey' => 'required'
            ]);

            $member->first_name = $validatedData['first_name'];
            $member->middle_name = $request->input('middle_name');
            $member->last_name = $validatedData['last_name'];
            $member->gender = strtolower($validatedData['gender']);
            $member->age = $validatedData['age'];
            $member->group_age = $validatedData['group_age'];
            $member->address = $validatedData['address'];
            $member->cluster_area = strtolower($validatedData['cluster_area']);
            $member->birthday = $request->input('birthday');
            $member->contact = $request->input('contact');
            $member->journey = $validatedData['journey'];
            $member->cldp = $request->input('cldp');
            $member->is_active = $validatedData['is_active'];
            $member->remember_token = $request->input('_token');

            $member->email = ($request->input('email') || strlen($request->input('email')) > 0) ? $request->input('email') : null;
//            $member->username = ($request->input('username') || strlen($request->input('username')) > 0) ? $request->input('username') : null;
//
//            if (strlen($request->input('password')) != 0)
//                $member->password = Hash::make($request->input('password'));

            $member->save();

            return redirect('/my-care-group/members/'.$member->id)
                ->with('member', $member)
                ->with('success', "Member Updated Successfully !");
        }

        return redirect('/my-profile')
            ->with('error', 'You don\'t have the privilege.');
    }
}
