<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function allSessions()
    {
        $sessions = Session::with(['course'])->get();
        $courses = Course::where('done',0)->get();
        return view('admin.sessions',compact('sessions','courses'));
    }

    public function details($id)
    {
        return Session::where('id', $id)->first();
    }


    public function store(Request $request)
    {
        $request->validate([ 
            'course_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'date' => 'required',
        ]);
     
    

        Session::create($request->all());


        return ['message' =>  __('trans.add_session')];
    }


    public function setSession(Request $request)
    {
        return $request->all();
    }

    public function update(Request $request)
    {
        $request->validate([
            'Id' => 'required',
            'course_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'date' => 'required',        
        ]);

        $Id = $request->get('Id');

        Session::find($Id)->fill($request->all())->save();

        return ['message' =>  __('trans.update_session')];
    }
}
