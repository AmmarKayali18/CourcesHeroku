<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Equipment;
use App\Models\Session;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function allAdmins()
    {
        $admins = User::where('type', 'admin')->get();
        return view('admin.admins', compact('admins'));
    }

    public function allTeachers()
    {
        $teachers = User::where('type', 'teacher')->get();
        return view('admin.teachers', compact('teachers'));
    }
    public function allStudents()
    {
        $students = User::where('type', 'student')->get();
        $equipments = Equipment::where('count','>',0)->get();
        return view('admin.students', compact('students','equipments'));
    }

    public function details($id)
    {
        return User::where('id', $id)->first();
    }

    public function detailsCourses($id)
    {
        return Course::where('teacher_id', $id)->with(['courseCategory', 'class'])->with(array('session' => function ($query) {
            $query->where('done', 1);
        }))->with(array('userCourse' => function ($query) {
            $query->where('continue', 1);
        }))->get();
    }

    public function detailsStudentCourses($id)
    {
       return  UserCourse::where('student_id', $id)->with('course')->get();
    }

    public function detailsStudentTrue($id)
    {
        $equipments = UserCourse::where('student_id',$id)->with(array('equipments' => function ($query) {
                $query->with('equipment');
            }))->get();
        $courses =  UserCourse::where('student_id', $id)->with(array('course' => function ($query) {
            $query->where('equipments',1);
        }))->get();
        return [
            'courses' => $courses,
            'equipments' => $equipments,
            'language' => app()->getLocale(),
        ];
    }

    public function update(Request $request)
    {

        $request->validate([
            'Id' => 'required',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'emailUpdate' => 'required|string|email',
            'mobile' => 'required',
            'address' => 'required|string',
        ]);
        $userId = $request->get('Id');
        $obj = [];
        $obj['name'] = $request->get('name_ar');
        $request->merge(['ar' => $obj]);

        $obj['name'] = $request->get('name_en');
        $request->merge(['en' => $obj]);

        $user  = User::where('id', $userId)->first();

        if ($request->get('emailUpdate') == $user->email) {
            unset($request['emailUpdate']);
        } else {
            if (count(User::where('email', $request->get('emailUpdate'))->get()) > 0) {
                return ['message' => 'This email already exist', 403];
            }
            $request->merge(['email' => $request->get('emailUpdate')]);
        }


        if ($request->get('password') != null) {
            $request->merge(['password' => Hash::make($request->get('password'))]);
        } else {
            unset($request['password']);
        }

        if ($request->hasFile('file')) {
            $image = $request->file("file");
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;

            $type = $request->get('type');
            $path = 'images/' . $type . "s";
            $request["file"]->move($path, $file_name);


            $request->merge(['image_path' => url('/') . "/images/" . $type . "s/" . $file_name]);
        }

        User::find($userId)->fill($request->all())->save();

        return ['message' =>  __('trans.update_' . $type)];
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|string',
            'address' => 'required|string',
            'type' => 'required|string',
            'password' => 'required|string'
        ]);
        $obj = [];
        $obj['name'] = $request->get('name_ar');
        $request->merge(['ar' => $obj]);

        $obj['name'] = $request->get('name_en');
        $request->merge(['en' => $obj]);

        $request->merge(['password' => Hash::make($request->get('password'))]);
        $type = $request->get('type');

        if ($request->hasFile('file')) {
            $image = $request->file("file");
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/' . $type . "s";
            $request["file"]->move($path, $file_name);

            $request->merge(['image_path' => url('/') . "/images/" . $type . "s/" . $file_name]);
        }

        User::create($request->all());


        return ['message' =>  __('trans.add_' . $type)];
    }

    public function addEquipment(Request $request)
    {
        $request->validate([
            'user_course_id' => 'required',
            'equipment_id' => 'required',
        ]);
        $temporary = 0;
        $broken = 1;
        if($request->get('temporary')){
            $temporary = 1;
            $broken = 0;
        }
        DB::table('equipments')
            ->where('id', $request->get('equipment_id'))
            ->update([
                'count' => DB::raw('count -' . 1),
                'temporary_count' => DB::raw('temporary_count +' . $temporary),
                'broken_count' => DB::raw('broken_count +' . $broken),
            ]);
        UserEquipment::create($request->all());
        return ['message' =>  __('trans.assign_equipment_success')];

    }
}
