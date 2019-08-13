<?php

namespace App\Http\Controllers;

use App\Group;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function index() {
        return view('pages.reports.index')->with('reports', Report::all());
    }

    public function create(Request $request) {
        return view('pages.reports.create')->with('group', Group::find($request->get('cg_id')));
    }

    public function store(Request $request) {
        if (!$request->has('present'))
            return redirect()->back()->with('error', "Please add present member/s !");

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
            return redirect()->back()->with('error', 'Cannot create the report because it has duplicate present members!');

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
            'topic' => $validatedData['topic'],
            'offering' => $request->get('offering')
        ));

        $temp = '';
        for ($i = 0; $i < count($request->input('present')); $i++) {
            $temp .= $request->input('present')[$i];
            if (($i+1) < count($request->input('present'))) $temp .= ',';
        }
        $report->present = $temp;

        dd($report);
    }

    public function show($id) {
        //
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
}
