<?php

namespace App\Http\Controllers;

use App\forum;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showCharts()
    {
        $counter['amuzeshi'] = project::where('type', 'آموزشی')->get()->count();
        $counter['tarviji'] = project::where('type', 'ترویجی')->get()->count();
        $counter['mosabeghei'] = project::where('type', 'مسابقه ای')->get()->count();


        $counter['linier'] = DB::table('projects')
            ->select('forums.name', DB::raw('SUM(cost) as total'))
            ->join('forums', 'forums.id', '=', 'projects.forum_id')
            ->groupBy('forums.name')
            ->get();

        return view('charts', compact('counter'));
    }

    public function loadCharts() {
        $counter['amuzeshi'] = project::where('type', 'آموزشی')->get()->count();
        $counter['tarviji'] = project::where('type', 'ترویجی')->get()->count();
        $counter['mosabeghei'] = project::where('type', 'مسابقه ای')->get()->count();


        $counter['linier'] = DB::table('projects')
            ->select('forums.name', DB::raw('SUM(cost) as total'))
            ->join('forums', 'forums.id', '=', 'projects.forum_id')
            ->groupBy('forums.name')
            ->get();

        return response()->json($counter);
    }


}
