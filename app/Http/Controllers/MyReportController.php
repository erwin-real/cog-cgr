<?php

namespace App\Http\Controllers;

use App\Group;
use App\Report;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyReportController extends Controller
{
    public function __construct() { $this->middleware('auth'); }

    public function index() {
        return view('pages.myreports.index')->with('reports', Auth::user()->reports);
    }

    public function create(Request $request) {
        $group = Group::find($request->get('cg_id'));
        if (count($group->members) > 0)
            return view('pages.myreports.create')->with('group', $group);

        return redirect('/my-profile')->with('error', 'Cannot create report without any members');
    }

    public function store(Request $request) {
        if (!$request->has('present'))
            return redirect()->back()->with('error', "Please add present member/s !")->withInput();

        $my_arr = $request->get('present');
        $dups = $new_arr = array();
        foreach ($my_arr as $key => $val) {
            if (!isset($new_arr[$val])) $new_arr[$val] = $key;
            else {
                if (isset($dups[$val])) $dups[$val][] = $key;
                else $dups[$val] = array($key);
            }
        }
        if ($dups)
            return redirect()->back()->with('error', 'Cannot create the report because it has duplicate present members!')->withInput();

        $validatedData = $request->validate([
            'leader_id' => 'required',
            'cg_id' => 'required',
            'day_cg' => 'required',
            'time_cg' => 'required',
            'venue' => 'required',
            'topic' => 'required',
        ]);

        $group = Group::find($validatedData['cg_id']);
        $report = new Report(array(
            'leader_id' => $validatedData['leader_id'],
            'cg_id' => $validatedData['cg_id'],
            'day_cg' => $validatedData['day_cg'],
            'time_cg' => $validatedData['time_cg'],
            'venue' => $validatedData['venue'],
            'cluster_area' => $group->cluster_area,
            'department' => $group->department,
            'type' => $group->type,
            'topic' => $validatedData['topic'],
            'offering' => $request->get('offering')
        ));

        $report->date_submitted = Carbon::now();
        $report->consolidation_report = $request->get('consolidation_report');

        $present = '';
        for ($i = 0; $i < count($request->input('present')); $i++) {
            $present .= $request->input('present')[$i];
            if (($i+1) < count($request->input('present'))) $present .= ',';
        }

        $report->present = $present;

        $membersID = array();
        foreach ($group->members as $member) array_push($membersID,$member->id);

        for ($i = 0; $i < count($request->input('present')); $i++) {
            foreach ($group->members as $member) {
                if ($request->input('present')[$i] == $member->id)
                    $membersID = \array_diff($membersID, [$member->id]);
            }
        }

        $absent = '';
        foreach ($membersID as $item) {
            $absent .= $item;
            if (next($membersID)) $absent .= ',';
        }

        $report->absent = strlen($absent) > 0 ? $absent : null;
        $report->save();

        return redirect('/my-reports/'.$report->id)
            ->with('report', $report)
            ->with('success', 'Report Created Successfully!');
    }

    public function show($id) {
        $report = Report::find($id);
        return view('pages.myreports.show')
            ->with('absents', User::find(explode(",", $report->absent)))
            ->with('presents', User::find(explode(",", $report->present)))
            ->with('report', $report);
    }

    public function edit($id) {
        $report = Report::find($id);
        return view('pages.myreports.edit')
            ->with('presents', User::find(explode(",", $report->present)))
            ->with('group', $report->group)
            ->with('report', $report);
    }

    public function update(Request $request, $id) {
        if (!$request->has('present'))
            return redirect()->back()->with('error', "Please add present member/s !")->withInput();

        $my_arr = $request->get('present');
        $dups = $new_arr = array();
        foreach ($my_arr as $key => $val) {
            if (!isset($new_arr[$val])) $new_arr[$val] = $key;
            else {
                if (isset($dups[$val])) $dups[$val][] = $key;
                else $dups[$val] = array($key);
            }
        }
        if ($dups)
            return redirect()->back()->with('error', 'Cannot create the report because it has duplicate present members!')->withInput();

        $validatedData = $request->validate([
            'leader_id' => 'required',
            'cg_id' => 'required',
            'day_cg' => 'required',
            'time_cg' => 'required',
            'venue' => 'required',
            'topic' => 'required',
        ]);

        $group = Group::find($validatedData['cg_id']);
        $report = Report::find($id);
        $report->leader_id = $validatedData['leader_id'];
        $report->cg_id = $validatedData['cg_id'];
        $report->day_cg = $validatedData['day_cg'];
        $report->time_cg = $validatedData['time_cg'];
        $report->venue = $validatedData['venue'];
        $report->cluster_area = $group->cluster_area;
        $report->department = $group->department;
        $report->topic = $validatedData['topic'];
        $report->offering = $request->get('offering');
        $report->consolidation_report = $request->get('consolidation_report');

        $present = '';
        for ($i = 0; $i < count($request->input('present')); $i++) {
            $present .= $request->input('present')[$i];
            if (($i+1) < count($request->input('present'))) $present .= ',';
        }

        $report->present = $present;

        $membersID = array();
        foreach ($group->members as $member) array_push($membersID,$member->id);

        for ($i = 0; $i < count($request->input('present')); $i++) {
            foreach ($group->members as $member) {
                if ($request->input('present')[$i] == $member->id)
                    $membersID = \array_diff($membersID, [$member->id]);
            }
        }

        $absent = '';
        foreach ($membersID as $item) {
            $absent .= $item;
            if (next($membersID)) $absent .= ',';
        }

        $report->absent = strlen($absent) > 0 ? $absent : null;
        $report->save();

        return redirect('/my-reports/'.$report->id)
            ->with('report', $report)
            ->with('success', 'Report Updated Successfully!');
    }

    public function destroy($id) {
        $report = Report::find($id);
        $report->forceDelete();

        return redirect('/my-reports')
            ->with('success', 'Report Deleted Successfully!');
    }
}
