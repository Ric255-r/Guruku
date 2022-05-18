<?php

namespace App\Http\Controllers;

use App\auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        request()->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }
        return Redirect::to('login')->withSuccess('Username atau Password Salah');
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'username'=>'required',
            'email'=>'required|email|unique:auth',
            'password'=>'required|min:6'
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return Redirect::to('dashboard')->withSuccess('Berhasil Login');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return Redirect::to('login')->withSuccess('Gagal Login');
    }

    public function create(array $data)
    {
        return auth::create([
            'username'=>$data['username'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(auth $auth)
    {
        //
    }
}
