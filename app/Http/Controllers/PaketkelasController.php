<?php

namespace App\Http\Controllers;

use App\paketkelas;
use App\VideoPaket;
use App\Kelas;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function paketkelas()
    {
        $paket = Kelas::where('jenis','paket')->get();
        return view('/paketkelas/paketkelas',compact('paket'));
    }

    public function index()
    {
        $paket = DB::table('paketkelas')->get();
        return view('admin.paketkelas.index',compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paketkelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'pelajaran'=>'required',
            'deskripsi'=>'required'
        ]);

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
        $tujuan_upload = 'adminpaket';

        //upload file
        $file->move($tujuan_upload,$nama_file);

        paketkelas::create([
            'file'=>$nama_file,
            'pelajaran'=>$request->pelajaran,
            'deskripsi'=>$request->deskripsi
        ]);

        $file = $request->file('file');

        return redirect()->route('adminpaket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paketkelas  $paketkelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelaspremium = Kelas::findOrfail($id);
        $items = Video::with('bayar')
            ->where('products_id',$id)
            ->get();
        return view('/paketkelas/show')->with([
            'kelaspremium' => $kelaspremium,
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paketkelas  $paketkelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paketkelas = paketkelas::findOrfail($id);
        return view('admin.paketkelas.edit',compact('paketkelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paketkelas  $paketkelas
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request, paketkelas $paketkelas)
    {
        $request->validate([
            'file'=>'required|file|mimes:jpeg,png,jpg|max:2048',
            'pelajaran'=>'required',
            'deskripsi'=>'required'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        $tujuan_upload = 'adminpaket';

        $file->move($tujuan_upload,$nama_file);

        paketkelas::where('id',$paketkelas->id)
            ->update([
                'file'=>$nama_file,
                'pelajaran'=>$request->pelajaran,
                'deskripsi'=>$request->deskripsi
            ]);

        $file = $request->file('file');
        return redirect()->route('adminpaket.index');
    }



    public function update(Request $request, paketkelas $paketkelas)
    {
        $request->validate([
            'file'=>'required|file|mimes:jpeg,png,jpg|max:2048',
            'pelajaran'=>'required',
            'deskripsi'=>'required'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        $tujuan_upload = 'adminpaket';

        $file->move($tujuan_upload,$nama_file);

        paketkelas::where('id',$paketkelas->id)
            ->update([
                'file'=>$nama_file,
                'pelajaran'=>$request->pelajaran,
                'deskripsi'=>$request->deskripsi
            ]);

        $file = $request->file('file');
        return redirect()->route('adminpaket.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paketkelas  $paketkelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        paketkelas::destroy($id);
        return redirect()->route('adminpaket.index');
    }

    public function hapus($id)
    {
        $hapus1 = paketkelas::destroy($id);
        $hapus2 = VideoPaket::with('paket')
            ->where('products_id',$id)
            ->delete();
        return redirect()->route('adminpaket.index');
    }

    public function gallery(Request $request, $id)
    {
        $paket = paketkelas::findOrfail($id);
        $items = VideoPaket::with('paket')
            ->where('products_id', $id)
            ->get();
        return view('admin.video-paket.gallery')->with([
            'paket' => $paket,
            'items' => $items
        ]);
    }
}
