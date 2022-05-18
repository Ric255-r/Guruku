<?php

namespace App\Http\Controllers;

use App\Join;
use App\Kelas;
use App\JoinDetail;
use App\Http\Requests\JoinRequest;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function berhasil()
    {
        return view('join.berhasil');
    }

    public function store(JoinRequest $request)
    {
        $data = $request->except('join_details');
        $join = Join::create($data);

        foreach((array)$request->join_details as $product)
        {
            $details[] = new JoinDetail([
                'join_id' => $join->id,
                'products_id' => $product,
                'user_id' => $join->user_id,
            ]);
            Kelas::find($product)->increment('murid');
        }
        $join->details()->saveMany($details);
        return redirect()->route('join.berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function show(Join $join)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function edit(Join $join)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Join $join)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function destroy(Join $join)
    {
        //
    }
}
