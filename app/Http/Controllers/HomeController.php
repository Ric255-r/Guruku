<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\kategori;
use App\ModelRatingKelas;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $kelas = Kelas::with('mentor')
            ->get();
            //->limit(5);
            //->random(1);
        $kategori = Kategori::all();
        $gratis = Kelas::where('kelas','like',"%".$keyword."%")
            ->orWhere('jenis','like',"%".$keyword."%")
            ->where('jenis','gratis')
            ->paginate(12);
        //if (!$gratis || !$gratis->count()) {
        //    Session::flash('failed', 'Oops kelas yang anda cari tidak tersedia');
        //}
        $bayar = Kelas::where('kelas','like',"%".$keyword."%")
            ->orWhere('jenis','like',"%".$keyword."%")
            ->where('jenis','bayar')
            ->paginate(12);
        //if (!$bayar || !$bayar->count()) {
        //    Session::flash('gagal', 'Oops kelas yang anda cari tidak tersedia');
        //}
        $paket = Kelas::where('kelas','like',"%".$keyword."%")
            ->orWhere('jenis','like',"%".$keyword."%")
            ->paginate(12);
        $rating = ModelRatingKelas::with('kls')
            ->get();
        return view('index')
            ->with([
                'kelas'=>$kelas,
                'kategori'=>$kategori,
                'gratis'=>$gratis,
                'bayar'=>$bayar,
                'paket'=>$paket,
                'kategori'=>$kategori,
                'rating'=>$rating
            ]);
    }

    public function dexbaru()
    {
        return view('desainbaru.index');
    }
    //public function random()
    //{
        //$rand = Kelas::all()
        //    ->random(6);
        //return view('index')
        //    ->with([
        //        'rand'=>$rand
        //    ]);
    //}
}
