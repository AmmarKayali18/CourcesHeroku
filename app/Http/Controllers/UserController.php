<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('admin.students', compact('students'));
    }

    public function details($id)
    {
        return User::where('id', $id)->first();
    }

    public function detailsCourses($id)
    {
        return Course::where('teacher_id',$id)->with(['courseCategory','class'])->with(array('session' => function($query) {
            $query->where('done', 1);
        }))->with(array('userCourse' => function($query) {
            $query->where('continue', 1);
        }))->get();
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
}
