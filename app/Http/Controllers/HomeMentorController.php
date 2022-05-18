<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class HomeMentorController extends Controller
{
    public function index()
    {
        $mentor = User::where('roles','MENTOR')
            ->where('status','SUCCESS')
            ->paginate(9);
        return view('mentor.index')
            ->with([
                'mentor'=>$mentor
            ]);
    }

    public function show($id)
    {
        $mentor = User::where('roles','MENTOR')
            ->where('kode_mentor',$id)
            ->first();
        $kelas = Kelas::where('mentor_id',$id)
            ->where('status','PUBLISH')
            ->paginate(6);
        //p
        $kuis = DB::select("SELECT k.id, k.gambar, k.nama_kuis, k.deskripsi, k.kategori, k.topic, k.mentor_id, k.tingkatan, k.slug, DATE(k.created_at) AS tanggalbuat, u.name AS nama_mentor, u.file AS foto_mentor, u.bidang FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.status = 'active' AND k.mentor_id = '$mentor->kode_mentor'");

        $blog = Blog::where('author_id',$id)
            ->where('status','PUBLISH')
            ->get();
        return view('mentor.show')
            ->with([
                'mentor'=>$mentor,
                'kelas'=>$kelas,
                'kuis'=>$kuis,
                'blog'=>$blog
            ]);
    }

    public function cari(Request $request)
    {
        $s = $request->s;
        $mentor = User::where('name','like',"%".$s."%")
            ->where('roles','MENTOR')
            ->paginate(6);
        return view('mentor.index')
            ->with([
                'mentor'=>$mentor
            ]);
    }
}
