<?php

namespace App\Http\Controllers;

use App\VideoPaket;
use App\paketkelas;
use App\Http\Requests\VideoPaketRequest;
use Illuminate\Http\Request;

class VideoPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = VideoPaket::with('paket')->get();
        return view('admin.video-paket.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = paketkelas::all();
        return view('admin.video-paket.create',compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoPaketRequest $request)
    {
        $data = $request->all();
        $data['video'] = $request->file('video')->store(
            'assets/videopaket', 'public'
        );
        VideoPaket::create($data);
        return redirect()->route('videopaket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VideoPaket::destroy($id);
        return redirect()->route('videopaket.index');
    }
}
