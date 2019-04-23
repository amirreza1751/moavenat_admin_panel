<?php

namespace App\Http\Controllers;

use App\forum;
use App\project;
use App\standard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Jalalian;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = project::with('forum')->latest()->paginate(10);
//        return Auth()->user()->getDirectPermissions();
//        $role =  Auth::user()->role()->first()->name;
        return view('projects', compact('projects'));
    }

    public function store(Request $request)
    {
        $check_letter_number = project::where('letter_number', $request['letter_number'])->get();
        if (count($check_letter_number) > 0) {
            Session::flash('message', '.این شماره نامه قبلا ثبت شده است');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $str = explode("/", $request['start_date']);
//        $start_date = $str[2] . "/" . $str[1] . "/" . $str[0];
//        return $start_date;
        $start_date = (new Jalalian($str[2], $str[1], $str[0]))->toCarbon()->toDateString();

        $str = explode("/", $request['end_date']);
//        $end_date = $str[2] . "/" . $str[1] . "/" . $str[0];
        $end_date = (new Jalalian($str[2], $str[1], $str[0]))->toCarbon()->toDateString();

        $forum = forum::where('name', $request['forum_name'])->first();
//        $date_time = $request['start_date'] . " " . $request['start_time'];

        $start_time = str_replace(' ', '', $request['start_time']);
        $end_time = str_replace(' ', '', $request['end_time']);
//return $end_time;
        $project = new project();
        $project->name = $request['name'];
        $project->type = $request['type'];
        $project->place = $request['place'];
        $project->level = $request['level'];
        $project->capacity = $request['capacity'];
        $project->master = $request['master'];
        $project->start_date = $start_date;
        $project->start_time = $start_time;
        $project->end_date = $end_date;
        $project->end_time = $end_time;
        $project->total_hours = $request['total_hours'];
        $project->forum_id = $forum->id;
        $project->purpose = $request['purpose'];
        $project->sideway_programs = $request['sideway_programs'];
        $project->detailed_programs = $request['detailed_programs'];
        $project->innovation = $request['innovation'];
        $project->sponsors = $request['sponsors'];
        $project->description = $request['descripion'];
        $project->letter_number = $request['letter_number'];
        $project->manager_sign = $request['manager_sign'];
        $project->expert_sign = $request['expert_sign'];
        $project->save();
        Session::flash('message', '.طرح با موفقیت ثبت شد');
        Session::flash('alert-class', 'alert-success');
        return view('createStaff', compact('project'));
    }


    public function add(Request $request)
    {
        $forums = forum::all();
        return view('createProject', compact('forums'));
    }

    public function show($id)
    {
//        $project = project::where('id', $id)->first();
        $project = project::with('forum', 'costs', 'executiveStaff')->where('id', $id)->get(['name', DB::raw('pdate(start_date) as start_date'), 'forum_id', 'id', 'type', DB::raw('pdate(end_date) as end_date'), 'place', 'purpose', 'sideway_programs', 'detailed_programs', 'innovation', 'sponsors', 'description', 'letter_number', 'manager_sign', 'expert_sign', 'level', 'capacity', 'cost', 'final_cost', 'suggest_form', 'final_report', 'documentation', 'grade', 'master', 'forum_id', 'start_time', 'end_time', 'total_hours'])->first();
//        $project = project::all('name', DB::raw('pdate(start_date)'))->first();
        $forums = forum::all();
        $project_types = ['ترویجی', 'آموزشی' ,'مسابقه ای'];
        return view('editProject', compact('project', 'forums', 'project_types'));
//        return $project;
    }


    public function edit(project $project, Request $request)
    {
        $request = $request->all();
        $temp = array();
        array_push($temp, $request);
        $temp = $temp[0];

        $str = explode("/", $temp['start_date']);
        $temp['start_date'] = (new Jalalian($str[2], $str[1], $str[0]))->toCarbon()->toDateString();
        $str = explode("/", $temp['end_date']);
        $temp['end_date'] = (new Jalalian($str[2], $str[1], $str[0]))->toCarbon()->toDateString();


        $temp['start_time'] = str_replace(' ', '', $temp['start_time']);
        $temp['end_time'] = str_replace(' ', '', $temp['end_time']);
        $project->update($temp);
        $project->end_time = $temp['end_time'];
        $project->save();
        Session::flash('message', '.با موفقیت ویرایش شد');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

}
