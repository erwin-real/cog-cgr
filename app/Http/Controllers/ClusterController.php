<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClusterController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if(
            Auth::user()->is_leader == 1 &&
            (Auth::user()->type == 'cluster head' || Auth::user()->type == 'department head' || Auth::user()->type == 'admin' || Auth::user()->type == 'master')
        )
            return view('pages.cluster.index')->with('groups', Auth::user()->clusterCareGroups);

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see Cluster Care Groups.');
    }

    public function show($id) {
        if(
            Auth::user()->is_leader == 1 &&
            (Auth::user()->type == 'cluster head' || Auth::user()->type == 'department head' || Auth::user()->type == 'admin' || Auth::user()->type == 'master')
        )
            return view('pages.cluster.show')->with('group', Group::find($id));

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to see Cluster Care Groups.');
    }
}
