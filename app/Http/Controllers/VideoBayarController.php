<?php

namespace App\Http\Controllers;

use App\VideoBayar;
use App\Video;
use App\kelaspremium;
use App\Http\Requests\VideoBayarRequest;
use Illuminate\Http\Request;

class VideoBayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = VideoBayar::all();
        return view('admin.video-bayar.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = kelaspremium::all();
        return view('admin.video-bayar.create',compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function tabah(VideoBayarRequest $request)
    {
        $data = $request->all();
        $data['video'] = $request->file('video')->store(
            'assets/videobayar','public'
        );
        VideoBayar::create($data);
        return redirect()->route('videobayar.index');
    }

    public function store(VideoBayarRequest $request)
    {
        $data = $request->all();
        $data['video'] = $request->file('video')->store(
            'assets/videobayar','public'
        );
        $hapus1 = VideoBayar::create($data);
        $hapus2 = Video::with('vidpay')
            ->where('products_id','id')
            ->create();
        return redirect()->route('adminkelaspremium.index');
    }

    // public function hapus($id)
    // {
    //     $hapus1 = kelaspremium::destroy($id);
    //     $hapus2 = VideoBayar::with('bayar')
    //         ->where('products_id',$id)
    //         ->delete();
    //     return redirect()->route('adminkelaspremium.index');
    // }


    // public function store(VideoBayarRequest $request, $id)
    // {
    //     $data = $request->all();
    //     $bayar = Video::findOrfail($id);
    //     $items = VideoBayar::with('vidpay')
    //         ->where('products_id',$id)
    //         ->store(
    //             'assets/videobayar','public'
    //         );
    //     VideoBayar::create($data);
    //     return redirect()->route('videobayar.index');
    // }



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
        //
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
        VideoBayar::destroy($id);
        return redirect()->route('videobayar.index');
    }
}
