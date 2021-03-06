<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', [App\Http\Controllers\UserController::class, 'payCourse'])->name('test');


// Route::get('/test', function () {
//     return view('test');
// })->name('HHH');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect']], function () {
    // admin
    Route::group(['middleware' => ['auth', 'userRedirect']], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/admins', [App\Http\Controllers\UserController::class, 'allAdmins'])->name('all-admins');
            Route::get('/teachers', [App\Http\Controllers\UserController::class, 'allTeachers'])->name('all-teachers');
            Route::get('/students', [App\Http\Controllers\UserController::class, 'allStudents'])->name('all-students');

            Route::post('/add', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
            Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
            Route::get('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteUser');
            Route::post('/add/equipment', [App\Http\Controllers\UserController::class, 'addEquipment'])->name('addEquipment');

            Route::get('/details/{id}', [App\Http\Controllers\UserController::class, 'details'])->name('detailsUser');
            Route::get('/details/courses/{id}', [App\Http\Controllers\UserController::class, 'detailsCourses'])->name('detailsUserCourses');
            Route::get('/details/student-courses/{id}', [App\Http\Controllers\UserController::class, 'detailsStudentCourses'])->name('detailsStudentCourses');
            Route::get('/details/student-courses-true/{id}', [App\Http\Controllers\UserController::class, 'detailsStudentTrue'])->name('detailsStudentTrue');
        });

        /// categories course
        Route::group(['prefix' => 'category-course'], function () {
            Route::get('/', [App\Http\Controllers\CategoryController::class, 'categories'])->name('categories');
            Route::post('/add', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
            Route::post('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
            Route::get('/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');
            Route::get('/details/{id}', [App\Http\Controllers\CategoryController::class, 'details'])->name('detailsCategory');
        });

        /// courses
        Route::group(['prefix' => 'course'], function () {
            Route::get('/', [App\Http\Controllers\CourseController::class, 'allCourses'])->name('courses');
            Route::post('/add', [App\Http\Controllers\CourseController::class, 'store'])->name('storeCourse');
            Route::post('/update', [App\Http\Controllers\CourseController::class, 'update'])->name('updateCourse');
            Route::get('/delete', [App\Http\Controllers\CourseController::class, 'delete'])->name('deleteCourse');
            Route::get('/details/{id}', [App\Http\Controllers\CourseController::class, 'details'])->name('detailsCourse');
        });

        /// equipments
        Route::group(['prefix' => 'equipment'], function () {
            Route::get('/', [App\Http\Controllers\EquipmentController::class, 'allEquipments'])->name('equipments');
            Route::post('/add', [App\Http\Controllers\EquipmentController::class, 'store'])->name('storeEquipment');
            Route::post('/update', [App\Http\Controllers\EquipmentController::class, 'update'])->name('updateEquipment');
            Route::get('/delete', [App\Http\Controllers\EquipmentController::class, 'delete'])->name('deleteEquipment');
            Route::get('/details/{id}', [App\Http\Controllers\EquipmentController::class, 'details'])->name('detailsEquipment');
        });

        /// halls
        Route::group(['prefix' => 'halls'], function () {
            Route::get('/', [App\Http\Controllers\HallController::class, 'allHalls'])->name('halls');
            Route::post('/add', [App\Http\Controllers\HallController::class, 'store'])->name('storeHall');
            Route::post('/update', [App\Http\Controllers\HallController::class, 'update'])->name('updateHall');
            Route::get('/delete', [App\Http\Controllers\HallController::class, 'delete'])->name('deleteHall');
            Route::get('/details/{id}', [App\Http\Controllers\HallController::class, 'details'])->name('detailsHall');
        });

        /// sessions
        Route::group(['prefix' => 'sessions'], function () {
            Route::get('/', [App\Http\Controllers\SessionController::class, 'allSessions'])->name('sessions');
            Route::post('/add', [App\Http\Controllers\SessionController::class, 'store'])->name('storeSession');
            Route::post('/update', [App\Http\Controllers\SessionController::class, 'update'])->name('updateSession');
            Route::get('/delete', [App\Http\Controllers\SessionController::class, 'delete'])->name('deleteSession');
            Route::get('/details/{id}', [App\Http\Controllers\SessionController::class, 'details'])->name('detailsSession');
        });
    });

    // teacher
    Route::group(['middleware' => ['auth', 'teacherRedirect']], function () {
        Route::get('/teacher-courses', [App\Http\Controllers\CourseController::class, 'teacherCourses'])->name('teacherCourses');
        Route::get('/details-course-teacher/{id}', [App\Http\Controllers\CourseController::class, 'detailsTeacherCourses'])->name('details-teacher-courses');
        Route::get('/student-course/{id}', [App\Http\Controllers\CourseController::class, 'studentsCourse'])->name('student-course');
        Route::post('/add-marker', [App\Http\Controllers\CourseController::class, 'addMarker'])->name('add-marker');
    
    });

    // student
    Route::group(['middleware' => ['auth', 'studentRedirect']], function () {
        Route::get('/my-courses', [App\Http\Controllers\CourseController::class, 'myCourses'])->name('my-courses');
        // Route::get('/teachers', [App\Http\Controllers\UserController::class, 'allTeachers'])->name('all-teachers');
        Route::get('/subscription-course', [App\Http\Controllers\UserController::class, 'subscriptionCourse'])->name('subscription-course');
        Route::post('/payCourse', [App\Http\Controllers\UserController::class, 'payCourse'])->name('pay-course');
    });


    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'allCategories'])->name('all-categories');
    Route::get('/courses', [App\Http\Controllers\CourseController::class, 'allCoursesStudent'])->name('all-courses');
    Route::get('/details-course/{id}', [App\Http\Controllers\CourseController::class, 'details'])->name('detailsCourse');

    Route::post('/set-session', [App\Http\Controllers\SessionController::class, 'setSession'])->name('setSession');


    Route::get('/', function () {
        return redirect()->route('all-categories');
    });

    Route::get('/permissions', function () {
        return "Your account does not have permissions";
    })->name('permissions');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
