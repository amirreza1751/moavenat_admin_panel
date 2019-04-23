<?php

namespace App\Http\Controllers;

use App\cost;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CostController extends Controller
{
    public function store(Request $request){
        $total_cost = 0;
        for($i=1;$i<=$request['number_of_inputs'];$i++){
//            $staff = executiveStaff::where('student_id', $request['student_id'.$i])->first();
//            if ($staff == null){
                 $cost = cost::create([
                    'subject' => $request['subject'.$i],
                    'unit' => $request['unit'.$i],
                    'cost' => $request['cost'.$i],
                    'requested_cost' => $request['requested_cost'.$i],
                    'approved_cost' => $request['approved_cost'.$i],
                     'project_id' => $request['project_id']
                ]);

                 $total_cost += $cost->approved_cost;
        }
        $project = project::find($request['project_id']);
        $project->cost = $total_cost;
        $project->save();

        Session::flash('message', 'ثبت طرح به صورت کامل با موفقیت پایان یافت.');
        Session::flash('alert-class', 'alert-success');
        return redirect('/home');
//        return $request->all();
    }
}
