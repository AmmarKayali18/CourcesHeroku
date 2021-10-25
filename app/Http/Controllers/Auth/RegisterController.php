<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        // Log::debug('data : '.print_r($data,true));
        // dd($data);
        return Validator::make($data, [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'mobile' => ['required','min:10','max:10'],
            'address' => ['required', 'string', 'min:5'],
            'image_path' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //    Log::debug('data : '.print_r($data,true));

        $image = $data["image_path"];
        $file_extension = $image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/students';
        $data["image_path"]->move($path,$file_name);
        // $image_path = url() . 'images/' . $file_name;

        $obj = [];
        $objAr['name'] = $data['name_ar'];
        $objEn['name'] = $data['name_en'];

        return User::create([
            'ar' => $objAr,
            'en' => $objEn,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'image_path' => url('/') . '/images/students/' . $file_name,
            'type' => "student",
        ]);
    }
}
