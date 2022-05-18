<?php

namespace App\Http\Controllers;

use App\kategori;
use App\Topik;
use App\ContactUs;
use App\User;
use App\Kelas;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::get();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/adminkelasbaru/kategori/index')
            ->with([
                'kategori'=>$kategori,
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
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/adminkelasbaru/kategori/create')
            ->with([
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
            'kategori'=>'required',
            //'slug'=>'required'
        ]);

        $data['slug'] = Str::slug($request->kategori);

        kategori::create($data);
        return redirect()->route('kategori.index')->with('success','Data Berhasil Ditambah');
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
        $kategori = kategori::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin/adminkelasbaru/kategori/edit')
            ->with([
                'kategori'=>$kategori,
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
            'kategori'=>'required'
        ]);
        $data['slug'] = Str::slug($request->kategori);

        kategori::where('id',$id)
            ->update($data);

        return redirect()->route('kategori.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::findOrfail($id);
        $slug = $kategori->slug;
        $topik = Topik::with('topic')
            ->where('kategori_slug',$slug)
            ->delete();

        Kategori::destroy($id);

        return redirect()->route('kategori.index')->with('success','Data Berhasil Dihapus');
    }

    public function gallery(Request $request, $id)
    {
        $kategori = Kategori::where('slug',$id)
            ->first();
        $topik = Topik::with('topic')
            ->where('kategori_slug',$id)
            ->paginate(10);
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/adminkelasbaru/kategori/gallery')
            ->with([
                'kategori'=>$kategori,
                'topik'=>$topik,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    public function hapus($id)
    {
        Topik::destroy($id);
        return redirect()->route('kategori.gallery');
    }
}
