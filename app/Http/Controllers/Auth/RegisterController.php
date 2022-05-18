<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telp' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles'=> ['required','string','max:255','in:USERS,MENTOR'],
            'status' => ['required','string','max:255','in:FAILED,PENDING,SUCCESS'],
            'cv'=>['nullable','file','mimes:pdf'],
            'ktp'=>['nullable','file','mimes:jpg,jpeg,png'],
            'alamat'=>['nullable','string'],
            'bidang'=>['nullable','string'],
            'alasan'=>['nullable','string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        if($request->file('cv') == null OR $request->file('ktp') == null)
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telp' => $data['telp'],
                'password' => Hash::make($data['password']),
                'roles'=> $data['roles'],
                'status' => $data['status'],
                //'cv'=>$data['cv'],
                //'ktp'=>$data['ktp'],
                'alamat'=>$data['alamat'],
                'bidang'=>$data['bidang'],
                'alasan'=>$data['alasan']
            ]);
        }
        else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telp' => $data['telp'],
                'password' => Hash::make($data['password']),
                'roles'=> $data['roles'],
                'status' => $data['status'],
                'cv'=>$data['cv'] = $request->file('cv')->store(
                    'assets/users','public'
                ),
                'ktp'=>$data['ktp'] = $request->file('ktp')->store(
                    'assets/users','public'
                ),
                'alamat'=>$data['alamat'],
                'bidang'=>$data['bidang'],
                'alasan'=>$data['alasan']
            ]);
        }
    }
}
