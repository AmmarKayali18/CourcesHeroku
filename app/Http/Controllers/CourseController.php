<?php

namespace App\Http\Controllers;

use App\Models\ClassHall;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function teacherCourses()
    {
        $userId = Auth::id();
        $courses =  Course::where('teacher_id',$userId)->with(['courseCategory','class'])->with(array('session' => function($query) {
            $query->where('done', 1);
        }))->with(array('userCourse' => function($query) {
            $query->where('continue', 1);
        }))->get();
        // return $courses;
        return view('teacher.courses',compact('courses'));
    }

    public function detailsTeacherCourses($id)
    {
        return Course::where('id', $id)->with(array('userCourse' => function($query) {
            $query->where('continue', 1)->with('user');
        }))->first();
    }


    public function myCourses(Request $request)
    {
        $courses = Course::where('id',$request->get('id'))->with(['courseCategory','teacher','class'])->get();
        $categories = CourseCategory::all();
        $teachers = User::where('type','teacher')->get();
        $classes = ClassHall::all();
        return view('my_courses',compact('courses','categories','teachers','classes'));
    }

    public function allCoursesStudent()
    {
        $courses = Course::with(['courseCategory','teacher','class'])->get();
        $categories = CourseCategory::all();
        $teachers = User::where('type','teacher')->get();
        $classes = ClassHall::all();
        return view('courses',compact('courses','categories','teachers','classes'));
    }
    
    public function allCourses()
    {
        $courses = Course::with(['courseCategory','teacher','class'])->get();
        $categories = CourseCategory::all();
        $teachers = User::where('type','teacher')->get();
        $classes = ClassHall::all();
        return view('admin.courses',compact('courses','categories','teachers','classes'));
    }

    public function details($id)
    {
        return Course::where('id', $id)->first();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'course_category_id' => 'required',
            'teacher_id' => 'required',
            'class_id' => 'required',
            'duration' => 'required',
            'sessions_count' => 'required',
            'start' => 'required',
            'end' => 'required',
            'price' => 'required',
            'file' => 'required',

        ]);
        $obj = [];
        $obj['title'] = $request->get('name_ar');
        $obj['description'] = $request->get('description_ar');
        $request->merge(['ar' => $obj]);

        $obj['title'] = $request->get('name_en');
        $obj['description'] = $request->get('description_en');
        $request->merge(['en' => $obj]);

        if ($request->hasFile('file')) {
            $image = $request->file("file");
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'images/courses';
            $request["file"]->move($path, $file_name);

            $request->merge(['image_path' => url('/') . "/images/courses/" . $file_name]);
        }

        Course::create($request->all());


        return ['message' =>  __('trans.add_course')];
    }


    public function update(Request $request)
    {
        $request->validate([
            'Id' => 'required',
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'course_category_id' => 'required',
            'teacher_id' => 'required',
            'class_id' => 'required',
            'duration' => 'required',
            'sessions_count' => 'required',
            'start' => 'required',
            'end' => 'required',
            'price' => 'required',
        
        ]);

        $obj = [];
        $obj['title'] = $request->get('name_ar');
        $obj['description'] = $request->get('description_ar');
        $request->merge(['ar' => $obj]);

        $obj['title'] = $request->get('name_en');
        $obj['description'] = $request->get('description_en');
        $request->merge(['en' => $obj]);


        if ($request->hasFile('file')) {
            $image = $request->file("file");
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;

            $type = $request->get('type');
            $path = 'images/courses';
            $request["file"]->move($path, $file_name);


            $request->merge(['image_path' => url('/') . "/images/courses/" . $file_name]);
        }
        $Id = $request->get('Id');

        Course::find($Id)->fill($request->all())->save();

        return ['message' =>  __('trans.update_course')];
    }
}
