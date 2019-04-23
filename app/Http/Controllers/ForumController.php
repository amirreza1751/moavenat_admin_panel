<?php

namespace App\Http\Controllers;

use App\college;
use App\forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    public function add(){
        $colleges = college::all();
        return view('createForum', compact('colleges'));
    }

    public function edit_forum_view(forum $forum)
    {
        $forum = forum::with('college')->where('id', $forum->id)->first();
        $colleges = college::all();
        return view('editForum', compact('forum','colleges'));
    }

    public function edit_forum(forum $forum, Request $request)
    {
         $forum->update($request->all());
         return back();
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:forums,name'
        ]);
        $forum = forum::create([
            'name' => $request['name'],
            'forum_history' => $request['forum_history'],
            'forum_statute' => $request['forum_statute'],
            'college_id' => $request['college_id'],
        ]);
        Session::flash('message', '.با موفقیت ثبت شد');
        Session::flash('alert-class', 'alert-success');
        return view('createForumStaff', compact('forum'));
//        return $request->all();

    }

    public function index(){
        $forums = forum::all();
        return view('forums', compact('forums'));
    }
    public function show($id){
        $forum = forum::with('executive_staff')->where('id', $id)->first();
       $staffs = $forum->executive_staff;
        return view('staffs', compact('staffs', 'forum'));
    }
}
