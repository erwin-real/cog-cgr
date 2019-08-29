<?php

namespace App\Http\Controllers;

use App\Charts\ReportChart;
use App\Group;
use App\Report;
use App\User;
use Carbon\Carbon;
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
                ->with('users', User::all()->count()-1)
                ->with('chart', $this->createChart());
        elseif (Auth::user()->type == 'department head')
            return view('dashboard')
                ->with('reports', Report::where('department', Auth::user()->head_department)->whereNull('date_verified_dh')->count())
                ->with('groups', Group::where('department', Auth::user()->head_department)->count())
                ->with('users', User::where('group_age', Auth::user()->head_department)->count())
                ->with('chart', $this->createChart());
        elseif (Auth::user()->type == 'cluster head')
            return view('dashboard')
                ->with('reports', Report::where('cluster_area', Auth::user()->head_cluster_area)->whereNull('date_verified_ch')->count())
                ->with('groups', Group::where('cluster_area', Auth::user()->head_cluster_area)->count())
                ->with('users', User::where('cluster_area', Auth::user()->head_cluster_area)->count())
                ->with('chart', $this->createChart());

        return redirect('/my-profile');
    }


    public function createChart() {
        $chart = new ReportChart();
        $chart->labels(['January 2019', 'February 2019', 'March 2019', 'April 2019', 'May 2019', 'June 2019', 'July 2019', 'August 2019', 'September 2019', 'October 2019', 'November 2019', 'December 2019']);
        $chart->dataset('Dataset', 'line', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11])->options(['color' => '#3490dc',]);
        $chart->dataset('Dataset 2', 'line', [4, 1, 4, 3, 7, 11, 6, 8, 4, 5, 12, 4])->options(['color' => '#6c757d',]);
        $chart->dataset('Dataset 3', 'line', [10, 5, 2, 6, 8, 4, 2, 6, 9, 12, 7, 1])->options(['color' => '#38c172',]);

        return $chart;
    }


    public function daily() {
        return Report::all()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('M d, Y'); // grouping by days
            });
    }

    public function weekly() {
        return Report::all()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('W Y'); // grouping by weeks with year
            });
    }

    public function monthly() {
        return Report::all()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('M Y'); // grouping by months
            });
    }

}
