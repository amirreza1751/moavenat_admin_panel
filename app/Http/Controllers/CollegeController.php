<?php

namespace App\Http\Controllers;

use App\college;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CollegeController extends Controller
{
    public function add(){
        return view('createCollege');
    }

    public function edit_college_view(college $college)
    {

        return view('editCollege', compact('college'));
    }

    public function edit_college(college $college, Request $request)
    {
        $college->update($request->all());
        Session::flash('message', '.با موفقیت ثبت شد');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function store(Request $request){
        $this->validate(request(), [
           'name' => 'required|unique:colleges,name'
        ]);
        college::create([
            'name' => $request['name']
        ]);
        Session::flash('message', '.با موفقیت ثبت شد');
        Session::flash('alert-class', 'alert-success');
        return redirect('/colleges');

    }

    public function index(){
        $colleges = college::all();
        return view('colleges', compact('colleges'));
    }
}
