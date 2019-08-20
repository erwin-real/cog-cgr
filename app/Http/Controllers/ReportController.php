<?php

namespace App\Http\Controllers;

use App\Group;
use App\Report;
use App\User;
use Carbon\Carbon;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        if (Auth::user()->type == 'admin' || Auth::user()->type == 'master')
            return view('pages.reports.index')->with('reports', Report::all());
        else if (Auth::user()->type == 'department head')
            return view('pages.reports.index')->with('reports', Auth::user()->departmentReports);
        else if (Auth::user()->type == 'cluster head')
            return view('pages.reports.index')->with('reports', Auth::user()->clusterReports);

        return redirect('/my-profile')->with('error', 'Cannot show all reports.');
    }

    public function show($id) {
        $report = Report::find($id);
        return view('pages.reports.show')
            ->with('absents', User::find(explode(",", $report->absent)))
            ->with('presents', User::find(explode(",", $report->present)))
            ->with('report', $report);
    }

    public function updateStatus($id, Request $request) {
        $report = Report::find($id);
        if (Auth::user()->type == 'cluster head' && !$report->date_verified_ch && $report->clusterHead->id == Auth::id()) {
            $report->comment_ch = $request->get('comment');
            $report->date_verified_ch = Carbon::now();
            $report->save();

            return redirect('/reports/'.$id)->with('success', 'Validated Report Successfully!');
        } elseif (Auth::user()->type == 'department head' && !$report->date_verified_dh && $report->date_verified_ch && $report->departmentHead->id == Auth::user()->id) {
            $report->comment_dh = $request->get('comment');
            $report->date_verified_dh = Carbon::now();
            $report->save();

            return redirect('/reports/'.$id)->with('success', 'Validated Report Successfully!');
        }

        return redirect('/my-profile')->with('error', 'You don\'t have the privilege to validate reports!');
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

//    public function create(Request $request) {
//        $group = Group::find($request->get('cg_id'));
//        if (count($group->members) > 0)
//            return view('pages.reports.create')->with('group', $group);
//
//        return redirect('/my-profile')->with('error', 'Cannot create report without any members');
//    }

//    public function store(Request $request) {
//        if (!$request->has('present'))
//            return redirect()->back()->with('error', "Please add present member/s !");
//
//        $my_arr = $request->get('present');
//        $dups = $new_arr = array();
//        foreach ($my_arr as $key => $val) {
//            if (!isset($new_arr[$val])) $new_arr[$val] = $key;
//            else {
//                if (isset($dups[$val])) $dups[$val][] = $key;
//                else $dups[$val] = array($key);
//            }
//        }
//        if ($dups)
//            return redirect()->back()->with('error', 'Cannot create the report because it has duplicate present members!');
//
//        $validatedData = $request->validate([
//            'leader_id' => 'required',
//            'cg_id' => 'required',
//            'day_cg' => 'required',
//            'time_cg' => 'required',
//            'venue' => 'required',
//            'topic' => 'required',
//        ]);
//
//        $group = Group::find($validatedData['cg_id']);
//        $report = new Report(array(
//            'leader_id' => $validatedData['leader_id'],
//            'cg_id' => $validatedData['cg_id'],
//            'day_cg' => $validatedData['day_cg'],
//            'time_cg' => $validatedData['time_cg'],
//            'venue' => $validatedData['venue'],
//            'cluster_area' => $group->cluster_area,
//            'topic' => $validatedData['topic'],
//            'offering' => $request->get('offering')
//        ));
//
//        $report->date_submitted = Carbon::now();
//        $report->consolidation_report = $request->get('consolidation_report');
//
//        $present = '';
//        for ($i = 0; $i < count($request->input('present')); $i++) {
//            $present .= $request->input('present')[$i];
//            if (($i+1) < count($request->input('present'))) $present .= ',';
//        }
//
//        $report->present = $present;
//
//        $membersID = array();
//        foreach ($group->members as $member) array_push($membersID,$member->id);
//
//        for ($i = 0; $i < count($request->input('present')); $i++) {
//            foreach ($group->members as $member) {
//                if ($request->input('present')[$i] == $member->id)
//                    $membersID = \array_diff($membersID, [$member->id]);
//            }
//        }
//
//        $absent = '';
//        for ($i = 0; $i < count($membersID); $i++) {
//            if (isset($membersID[$i])) {
//                $absent .= $membersID[$i];
//                if (($i+1) < count($membersID)) $absent .= ',';
//            }
//        }
//
//        $report->absent = strlen($absent) > 0 ? $absent : null;
//        $report->save();
//
//        return redirect('/my-reports/'.$report->id)
//            ->with('report', $report)
//            ->with('success', 'Report Created Successfully!');
//    }

}
