<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if (
            Auth::user()->type == 'master' ||
            Auth::user()->type == 'admin' ||
            Auth::user()->type == 'department head' ||
            Auth::user()->type == 'cluster head'
        )
            return view('dashboard');

        return redirect('/my-profile');
    }
}
