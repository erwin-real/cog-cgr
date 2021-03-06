<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function myProfile() { return view('pages.guides.my-profile'); }

    public function myReports() { return view('pages.guides.my-reports'); }

    public function myCareGroup() { return view('pages.guides.my-care-group'); }

    public function clusterCareGroup() { return view('pages.guides.cluster-care-group'); }

    public function departmentCareGroup() { return view('pages.guides.department-care-group'); }

    public function caregroups() {
        if (Auth::user()->type == 'master' ||Auth::user()->type == 'admin')
            return view('pages.guides.department-care-group');

        return redirect('/my-profile');
    }

    public function reports() {
        if (Auth::user()->type == 'master' ||Auth::user()->type == 'admin' || Auth::user()->type == 'cluster head' || Auth::user()->type == 'department head')
            return view('pages.guides.reports');

        return redirect('/my-profile');
    }

    public function users() {
        if (Auth::user()->type == 'master' || Auth::user()->type == 'admin' || Auth::user()->type == 'department head')
            return view('pages.guides.users');

        return redirect('/my-profile');
    }
}
