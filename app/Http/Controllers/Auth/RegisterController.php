<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('guest');
    }*/

    public function index(Request $role)
    {

        $data = [];
        $supervisors = User::where('role_id', 2)->get();


        if ($role == "student") {
            $data['role'] = 1;
            return view('auth.register', array('role' => $data, 'supervisors' => $supervisorsphp ));
        } elseif ($role == "supervisor" && auth()->user()->role_id == 2) {
            return view('auth.register', array('role' => $data, 'proposals' => 'na'));
            $data['role'] = 2;
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|regex:/(.*)@edgehill\.ac\.uk/|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'student_no' => 'string|min:8|max:8',
            '_token' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => $data['_token'],
            'student_no' => $data['student_no'],
            'role_id' => $data['role_id']
        ]);

        return view('home', array('newregistration' => true));
    }
}
