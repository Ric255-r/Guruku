<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gambaradminguru;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UploadGuruController extends Controller
{
    public function adminguru(){
        // $gambaradminguru = gambaradminguru::all();
        $gambaradminguru = DB::table('gambaradminguru')->paginate(8);
        return view('/guru/guru', compact('gambaradminguru'));
    }

    public function index()
    {
        $gambar = DB::table('gambaradminguru')->paginate(6);
        return view('admin.adminguru.index',compact('gambar'));
        // return view('admin.adminguru',compact('gambar'));
    }

    public function create()
    {
        return view('admin.adminguru.create');
    }
    public function cari(Request $request){
        $cari = $request->cari;
        $gambaradminguru = DB::table('gambaradminguru')
            ->where('keterangan','like',"%".$cari."%")
            ->paginate();
        return view('/guru/guru',compact('gambaradminguru'));
    }

    public function store(Request $request){ //adminguru_proses
        $this->validate($request,[
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
            'kategori'=>'required',
            'namamentor'=>'required',
            'jam'=>'required',
            'hari'=>'required',
            'deskripsi'=>'required'
        ]);
        // $request->validate([
        //     'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        //     'keterangan' => 'required',
        //     'kategori'=>'required',
        //     'namamentor'=>'required'
        // ]);
        //menyimpan data file yang di upload ke variable $file
        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        //nama file
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //ekstensi file
        echo 'File Extention: '.$file->getClientOriginalExtension();
        echo '<br>';

        //real path
        echo 'File Real Path :'.$file->getRealPath();
        echo '<br>';

        //ukuran file
        echo 'File Size :'.$file->getSize();
        echo '<br>';

        //tipe mime
        echo 'File Mime Type :'.$file->getMimeType();

        //isi dengan nama folder tempat kemana file di upload
        $tujuan_upload = 'adminguru';

        //upload file
        $file->move($tujuan_upload,$nama_file);

        gambaradminguru::create([
            'file'=>$nama_file,
            'keterangan'=>$request->keterangan,
            'kategori'=>$request->kategori,
            'namamentor'=>$request->namamentor,
            'hari'=>$request->hari,
            'jam'=>$request->jam,
            'deskripsi'=>$request->deskripsi
        ]);
        // gambaradminguru::create($request->all());

        //menyimpan data file yang diupload ke variable $file
        $file = $request->file('file');

        return redirect()->route('adminguru.index');
    }

    public function edit($id)
    {
        $gambaradminguru = gambaradminguru::findOrfail($id);
        return view('/admin/adminguru/edit',compact('gambaradminguru'));
    }

    // public function ubah(Request $request, gambaradminguru $gambaradminguru)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:jpeg,png,jpg|max:2048',
    //         'keterangan' => 'required',
    //         'kategori'=>'required',
    //         'namamentor'=>'required',
    //         'jam'=>'required',
    //         'hari'=>'required',
    //         'deskripsi'=>'required'
    //     ]);

    //     $file = $request->file('file');
    //     $nama_file = time(). "_".$file->getClientOriginalName();

    //     $tujuan_upload = 'adminguru';

    //     $file->move($tujuan_upload,$nama_file);

    //     gambaradminguru::where('id',$gambaradminguru->id)
    //         ->update([
    //             'file'=>$nama_file,
    //             'keterangan'=>$request->keterangan,
    //             'kategori'=>$request->kategori,
    //             'namamentor'=>$request->namamentor,
    //             'jam'=>$request->jam,
    //             'hari'=>$request->hari,
    //             'deskripsi'=>$request->deskripsi
    //         ]);

    //     $file = $request->file('file');
    //     return redirect()->route('adminguru.index');
    // }


    public function ubah(Request $request, gambaradminguru $gambaradminguru)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
            'kategori'=>'required',
            'namamentor'=>'required',
            'jam'=>'required',
            'hari'=>'required',
            'deskripsi'=>'required'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        $tujuan_upload = 'adminguru';

        $file->move($tujuan_upload,$nama_file);

        gambaradminguru::where('id',$gambaradminguru->id)
            ->update([
                'file'=>$nama_file,
                'keterangan'=>$request->keterangan,
                'kategori'=>$request->kategori,
                'namamentor'=>$request->namamentor,
                'jam'=>$request->jam,
                'hari'=>$request->hari,
                'deskripsi'=>$request->deskripsi
            ]);

        $file = $request->file('file');
        return redirect()->route('adminguru.index');
    }

    public function show($id)
    {
        $gambaradminguru = gambaradminguru::findOrFail($id);
        return view('guru.show',compact('gambaradminguru'));
        // gambaradminguru::find($id);
        // return view('guru.show',compact('guru'));
    }
    public function destroy($id){
        gambaradminguru::destroy($id);
        return redirect('/admin/adminguru');
    }

}
