<?php

namespace App\Http\Controllers;

use App\Topik;
use App\kategori;
use App\User;
use App\ContactUs;
use App\Transaction;
use App\Kelas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topik = Topik::get();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/adminkelasbaru/topik/index')
            ->with([
                'topik'=>$topik,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/adminkelasbaru/topik/create')
            ->with([
                'kategori'=>$kategori,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'topik'=>'required',
            'kategori_id'=>'required'
        ]);

        $data['kategori_slug'] = Str::slug($request->kategori_id);

        $data['slug'] = Str::slug($request->topik);

        Topik::create($data);
        return redirect()->route('topik.index')->with('success','Data Berhasil Ditambah');
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
        $topik = Topik::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/adminkelasbaru/topik/edit')
            ->with([
                'topik'=>$topik,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
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
        $data = $request->validate([
            'topik'=>'required'
        ]);
        $data['slug'] = Str::slug($request->topik);

        Topik::where('id',$id)
            ->update($data);
        return redirect()->route('topik.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topik::destroy($id);
        return redirect()->route('topik.index')->with('success','Data Berhasil Dihapus');
    }
}
