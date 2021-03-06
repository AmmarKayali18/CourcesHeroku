<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Equipment;
use App\Models\Session;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function allAdmins()
    {
        $admins = User::where('type', 'admin')->get();
        $teachersCount = User::where('type', 'teacher')->get()->count();
        $studentsCount = User::where('type', 'student')->get()->count();
        $categoriesCount = CourseCategory::all()->count();
        $coursesUnfinishedCount = Course::where('done', 1)->get()->count();
        $coursesFinishedCount = Course::where('done', 0)->get()->count();

        return view('admin.admins', compact('admins', 'teachersCount', 'studentsCount', 'coursesUnfinishedCount', 'coursesFinishedCount', 'categoriesCount'));
    }

    public function allTeachers()
    {
        $teachers = User::where('type', 'teacher')->get();
        return view('admin.teachers', compact('teachers'));
    }
    public function allStudents()
    {
        $students = User::where('type', 'student')->get();
        $equipments = Equipment::where('count', '>', 0)->get();
        return view('admin.students', compact('students', 'equipments'));
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
        $equipments = UserCourse::where('student_id', $id)->with(array('equipments' => function ($query) {
            $query->with('equipment');
        }))->get();
        $courses =  UserCourse::where('student_id', $id)->with(array('course' => function ($query) {
            $query->where('equipments', 1);
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
        if ($request->get('temporary')) {
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

    public function subscriptionCourse(Request $request)
    {
        $courseId = $request->get('id');

        $findCourse = UserCourse::where([['course_id', $courseId], ['student_id', Auth::id()]])->get()->first();
        
        if (isset($findCourse)) {
            return redirect('my-courses');
        }

        $course = Course::where('id', $courseId)->get()->first();
        $teachersCount = User::where('type', 'teacher')->get()->count();
        $studentsCount = User::where('type', 'student')->get()->count();
        $categoriesCount = CourseCategory::all()->count();
        $coursesCount = Course::all()->count();
        return view('subscription', compact('course', 'teachersCount', 'studentsCount', 'categoriesCount', 'coursesCount'));
    }


    public function payCourse(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'first_name' => 'required|string',
            'email' => 'required|string|email',
            'number' => 'required',
            'country_code' => 'required',
            'source_id' => 'required|string',
        ]);
        /// change this token (sk_test_8QOeqJlWVPrDjXS6mYKBInG3) to get records in you account 
        $headers = [
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer sk_test_8QOeqJlWVPrDjXS6mYKBInG3',
        ];

        $client = new GuzzleClient([
            'headers' => $headers
        ]);
        $findCourse = UserCourse::where([['course_id', $request->get('course_id')], ['student_id', Auth::id()]])->get()->first();
        
        if (isset($findCourse)) {
            return redirect('categories');
        }
        $course = Course::where('id', $request->get('course_id'))->get()->first();
        $date = Carbon::now();
        $userCourse = new UserCourse();
        $userCourse->course_id = $course->id;
        $userCourse->student_id = Auth::id();
        $userCourse->done = 0;
        $userCourse->continue = 1;
        $userCourse->mark = 0;
        $userCourse->register_date = $date->format('Y-m-d');;
        $userCourse->taken_equipment = 0;
        $userCourse->is_paid = 1;
        $userCourse->save();

        // $r = $client->request('POST', 'https://api.tap.company/v2/charges', [
        //     'form_params' => [
        //         "amount" => 1,
        //         "currency" => "KWD",
        //         "threeDSecure" => true,
        //         "save_card" => false,
        //         "description" => "Test Description",
        //         "statement_descriptor" => "Sample",
        //         "customer" => [
        //             "first_name" => "test",
        //             "middle_name" => "test",
        //             "last_name" => "test",
        //             "email" => "test@test.com",
        //             "phone" =>
        //             [
        //                 "country_code" => "965",
        //                 "number" => "50000000"
        //             ]
        //         ],
        //         "source" => [
        //             "id" => "src_kw.knet"
        //         ],
        //         "redirect" => [
        //             "url" => "www.google.com"
        //         ],
        //     ]
        // ]);
        $r = $client->request('POST', 'https://api.tap.company/v2/charges', [
            'form_params' => [
                "amount" => 1,
                "currency" => "KWD",
                "threeDSecure" => true,
                "save_card" => false,
                "description" => "Test Description",
                "statement_descriptor" => "Sample",
                "customer" => [
                    "first_name" => $request->get('first_name'),
                    "middle_name" => "test",
                    "last_name" => "test",
                    "email" => $request->get('email'),
                    "phone" =>
                    [
                        "country_code" => $request->get('country_code'),
                        "number" => $request->get('number')
                    ]
                ],
                "source" => [
                    "id" => $request->get('source_id')
                ],
                "redirect" => [
                    "url" => "www.google.com"
                ],
            ]
        ]);
        // Get data from result 
        // $result = $r->getBody()->getContents();
        // return $result;
        return redirect('categories');
    }
}
