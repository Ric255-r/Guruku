<?php

namespace App\Http\Controllers;

use App\kelaspremium;
use App\VideoBayar;
use App\Video;
use App\Kelas;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Concerns\HidesAttributes;


class KelaspremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kelaspre() //index
    {
        // $bayar = kelaspremium::findOrfail($id);
        // $items = VideoBayar::with('bayar')
        //     ->where('products_id',$id)
        //     ->get();
        // return view('admin.video-bayar.gallery')->with([
        //     'bayar' => $bayar,
        //     'items' => $items
        // ]);
        $kelas = Kelas::where('jenis','bayar')->paginate(8);
        $item = TransactionDetail::with('product','transaction')
            ->where('user_id',Auth::user()->id)
            ->get();
        return view('/kelaspre/kelaspremium')->with([
            'kelas'=>$kelas,
            'item'=>$item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //create
    {
        // $kelas = DB::table('kelaspre')->paginate(6);
        // return view('admin.adminkelaspremium.index',compact('kelas'));
    }

    public function create()
    {
        // return view('admin.adminkelaspremium.create');
    }

    public function detail()
    {
        $kelas = DB::table('kelasbaru')->paginate(12);
        return view('/kelaspre/detail',compact('kelas'));
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
            'harga' =>'required',
            'deskripsi'=>'required'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //ekstensi file
        echo 'File Extention: '.$file->getClientOriginalExtension();
        echo '<br>';

        //real path
        echo 'File Real Path:' .$file->getRealPath();
        echo '<br>';

        //ukuran file
        echo 'File Size:' .$file->getSize();
        echo '<br>';

        //tipe mime
        echo 'File Mime Type:' .$file->getMimeType();

        //tujuan uplaod
        $tujuan_upload = 'adminkelaspremium';

        //upload file
        $file->move($tujuan_upload,$nama_file);

        kelaspremium::create([
            'file'=>$nama_file,
            'pelajaran'=>$request->pelajaran,
            'harga' => $request->harga,
            'deskripsi'=>$request->deskripsi
        ]);

        $file = $request->file('file');
        return redirect('/kelaspremium');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $kelas = DB::table('kelasbaru')
            ->where('kelas','like',"%".$cari."%")
            ->paginate();
        return view('/kelaspre/kelaspremium',compact('kelas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelaspremium  $kelaspremium
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelaspremium  $kelaspremium
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $premium = kelaspremium::findOrfail($id);
        // return view('pages.products.edit',compact('item'));
        return view('/admin/adminkelaspremium/edit',compact('premium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelaspremium  $kelaspremium
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request, kelaspremium $kelaspremium)
    {
        $request->validate([
            'file'=>'required|file|mimes:jpeg,png,jpg|max:2048',
            'pelajaran'=>'required',
            'harga' => 'required',
            'deskripsi'=>'required'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        $tujuan_upload = 'adminkelaspremium';

        $file->move($tujuan_upload,$nama_file);

        kelaspremium::where('id',$kelaspremium->id)
            ->update([
                'file'=>$nama_file,
                'pelajaran'=>$request->pelajaran,
                'deskripsi'=>$request->deskripsi
            ]);
        $file = $request->file('file');
        return redirect()->route('adminkelaspremium.index');
    }

    // public function ubah(Request $request, $id)
    // {
    //     $request->validate([
    //         'file'=>'required|file|image|mimes:jpeg,png,jpg|max:2048',
    //         'pelajaran'=>'required',
    //         'deskripsi'=>'required'
    //     ]);

    //     $file = $request->file('file');
    //     $nama_file = time(). "_".$file->getClientOriginalName();

    //     $tujuan_upload = 'adminkelaspre';

    //     $file->move($tujuan_upload,$nama_file);

    //     DB::table('kelaspre')->where($id)
    //         ->update([
    //             'file'=>$nama_file,
    //             'pelajaran'=>$request->pelajaran,
    //             'deskripsi'=>$request->deskripsi
    //         ]);
    //     $file = $request->file('file');
    //     return redirect('/admin/adminkelaspremium');
    // }

    public function show($id)
    {
        $item = TransactionDetail::with('product','transaction')
            ->where('user_id',Auth::user()->id)
            ->get();
        $kelaspremium = Kelas::findOrfail($id);
        $items = Video::with('bayar')
            ->where('products_id',$id)
            ->get();
        return view('/kelaspre/dtlkelaspre')->with([
            'kelaspremium' => $kelaspremium,
            'items' => $items,
            'item' => $item
        ]);

        // $kelaspremium = Kelas::findOrfail($id);
        // return view('/kelaspre/dtlkelaspre',compact('kelaspremium'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelaspremium  $kelaspremium
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kelaspremium::destroy($id);
        return redirect('/admin/adminkelaspremium');
    }

    public function hapus($id)
    {
        $hapus1 = kelaspremium::destroy($id);
        $hapus2 = VideoBayar::with('bayar')
            ->where('products_id',$id)
            ->delete();
        return redirect()->route('adminkelaspremium.index');
    }

    public function gallery(Request $request, $id)
    {
        $bayar = kelaspremium::findOrfail($id);
        $items = VideoBayar::with('bayar')
            ->where('products_id',$id)
            ->get();
        return view('admin.video-bayar.gallery')->with([
            'bayar' => $bayar,
            'items' => $items
        ]);
    }
}
