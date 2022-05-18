<?php

namespace App\Http\Controllers;

use App\saya;
use Illuminate\Http\Request;

class SayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pengguna = saya::findOrfail($id);
        return view('/users/users');
    }

    public function awal()
    {
        return view('/users/users');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\saya  $saya
     * @return \Illuminate\Http\Response
     */
    public function show(saya $saya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\saya  $saya
     * @return \Illuminate\Http\Response
     */
    public function edit(saya $saya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\saya  $saya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, saya $saya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\saya  $saya
     * @return \Illuminate\Http\Response
     */
    public function destroy(saya $saya)
    {
        //
    }
}
