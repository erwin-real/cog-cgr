<?php

namespace App\Http\Controllers;

use App\Group;
use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if (Auth::user()->type == 'master' || Auth::user()->type == 'admin')
            return view('dashboard')
                ->with('reports', Report::all()->count())
                ->with('groups', Group::all()->count())
                ->with('users', User::all()->count());
        elseif (Auth::user()->type == 'department head')
            return view('dashboard')
                ->with('reports', Report::where('department', Auth::user()->head_department)->whereNull('date_verified_dh')->count())
                ->with('groups', Group::where('department', Auth::user()->head_department)->count())
                ->with('users', User::where('group_age', Auth::user()->head_department)->count());
        elseif (Auth::user()->type == 'cluster head')
            return view('dashboard')
                ->with('reports', Report::where('cluster_area', Auth::user()->head_cluster_area)->whereNull('date_verified_ch')->count())
                ->with('groups', Group::where('cluster_area', Auth::user()->head_cluster_area)->count())
                ->with('users', User::where('cluster_area', Auth::user()->head_cluster_area)->count());

        return redirect('/my-profile');
    }
}
