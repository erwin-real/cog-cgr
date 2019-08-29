<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function myProfile() {
        return view('pages.guides.my-profile');
    }

    public function reports() {
        return view('pages.guides.reports');
    }

    public function users() {
        if (Auth::user()->type == 'master' || Auth::user()->type == 'admin' || Auth::user()->type == 'department head')
            return view('pages.guides.users');

        return redirect('/my-profile');
    }
}
