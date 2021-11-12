<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use App\Models\UserCourse;
use App\Models\UserEquipment;
use App\Models\UserSession;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function allSessions()
    {
        $sessions = Session::with(['course'])->get();
        $courses = Course::where('done', 0)->get();
        return view('admin.sessions', compact('sessions', 'courses'));
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
        // id course_id
        // present = [1 , 2 , 3]  ids of users present this session.
        $courseId = $request->get('Id');
        $present = $request->get('present');
        $session = Session::where([['course_id', $courseId], ['done', 0]])->get()->first();
        $students = UserCourse::where('course_id', $courseId)->get();
        $studentsPrensented = 0;
        foreach ($students as $key => $student) {
            $newSession = new UserSession();
            $newSession->user_id = $student->student_id;
            $newSession->session_id = $session->id;
            $flag = false;
            foreach ($present as $key => $value) {
                if ($value == $student->student_id) {
                    $newSession->present = 1;
                    $newSession->save();
                    $flag = true;
                    $studentsPrensented = $studentsPrensented + 1;
                    break;
                }
            }
            if (!$flag) {
                $newSession->present = 0;
                $newSession->save();
            }
        }
        $session->count = $studentsPrensented;
        $session->done = 1;
        $session->save();
        $countSessions = Session::where([['course_id', $courseId], ['done', 1]])->get()->count();
        $course = Course::where([['sessions_count', $countSessions], ['done', 0]])->get()->first();
        if (isset($course)) {
            $course->done = 1;
            $course->save();
            $date = new DateTime();
            foreach ($students as $key => $student) {
                $equipments = UserEquipment::where('user_course_id', $student->id)->get();
                foreach ($equipments as $key => $equipment) {
                    if ($equipment->temporary == "yes") {
                        DB::table('equipments')
                            ->where('id', $equipment->equipment_id)
                            ->update([
                                'count' => DB::raw('count +' . 1),
                                'temporary_count' => DB::raw('temporary_count -' . 1),
                            ]);
                    }
                }
            }
            DB::table('user_courses')
                ->where('course_id', $courseId)
                ->update([
                    'done' => 1,
                    'end_date' => $date->format('Y-m-d'),
                ]);
        }
        return ['message' =>  __('trans.save_session_count') . $countSessions];
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
