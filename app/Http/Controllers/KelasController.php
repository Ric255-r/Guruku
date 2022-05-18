<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Video;
use App\kategori;
use App\Topik;
use App\Transaction;
use App\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\ContactUs;
//use Illuminate\Support\Update;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('mentor')->get();
        //mentor
        $itung = User::where('roles','MENTOR')
            ->where('kode_mentor',null)
            ->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.adminkelasbaru.index',compact('kelas','itung','pen','bls','req'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $las = Kelas::all();
        $kategori = kategori::all();
        $mentor = User::where('roles','MENTOR')
            ->where('status','SUCCESS')
            ->get();
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
        // $topik = Topik::with('topic')
            // ->where('id','kategori_id')
            // ->get();
        // $priorityID = $request->get('kategori');
        // dd($priorityID);
        // echo '<script> alert("'.$priorityID.'")</script>';
        return view('admin.adminkelasbaru.create')
            ->with([
                'mentor'=>$mentor,
                'kategori'=>$kategori,
                'las'=>$las,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
                // 'topik'=>$topik,
                // 'priorityID'=>$priorityID
            ]);
    }

    public function dropdown(Request $request)
    {
        $kategori_id = $request->get('kategori_id');
        $topik = Topik::with('topic')
            ->where('kategori_id',$kategori_id)
            ->get();
        return response()->json($topik);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'file'=>'required|file|image|mimes:jpeg,png,jpg',
            'kelas'=>' required',
            //'slug'=>'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'murid' => 'nullable',
            'jenis' => 'required|in:gratis,premium,paket',
            'kategori'=> 'required',
            'sertifikat' => 'required',
            // 'konsultansi' => 'required',
            'link_konsul'=>'nullable',
            'tingkat' =>'required|in:Pemula,Lanjutan',
            'materi'=>'required|in:SD,SMP,SMA SMK,Semua Tingkatan',
            'topik'=>'required',
            'mentor_id'=>'required|exists:users,kode_mentor',
            'status'=>'required|in:FAILED,REQUEST,PENDING,PUBLISH'
        ]);

        //$file = $request->file('file');
        //$nama_file = time(). "_".$file->getClientOriginalName();

        //echo 'File Name: '.$file->getClientOriginalName();
        //echo '<br>';

        ////ekstensi file
        //echo 'File Extention: '.$file->getClientOriginalExtension();
        //echo '<br>';

        ////real path
        //echo 'File Real Path:' .$file->getRealPath();
        //echo '<br>';

        ////ukuran file
        //echo 'File Size:' .$file->getSize();
        //echo '<br>';

        ////tipe mime
        //echo 'File Mime Type:' .$file->getMimeType();

        ////tujuan uplaod
        //$tujuan_upload = 'adminkelasbaru';

        ////upload file
        //$file->move($tujuan_upload,$nama_file);

        //$data = time().'.'.$request->image->getClientOriginalExtension();
        //$request->file->move(public_path('/adminkelasbaru'), $data);

        //$data = $request->file('file');
        //$nama_file = time(). "_".$data->getClientOriginalName();
        $data['konsultansi'] = false;

        $data['file'] = $request->file('file')->store(
            'assets/adminkelasbaru', 'public'
            // 'penyimpanan','public'
        );

        $data['slug'] = Str::slug($request->kelas);

        $data['kategori_slug'] = Str::slug($request->kategori);

        $data['topik_slug'] = Str::slug($request->topik);


        //Kelas::create([
        //    'file'=>$request->file,
        //    'kelas'=> $request->kelas,
        //    'slug'=>$request->data,
        //    'deskripsi' => $request->deskripsi,
        //    'harga' => $request->harga,
        //    'jenis' => $request->jenis,
        //    'kategori' => $request->kategori,
        //    'sertifikat'=> $request->sertifikat,
        //    'konsultansi'=> $request->konsultansi,
        //    'tingkat'=> $request->tingkat,
        //    'topik'=>$request->topik,
        //    'mentor_id'=>$request->mentor_id
        //]);

        Kelas::create($data);
        //$file = $request->file('file');
        return redirect()->route('adminkelasbaru.index')->with('success','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Kelas::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.adminkelasbaru.show',compact('item','itung','pen','bls','req'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrfail($id);
        $mentor = User::where('roles','MENTOR')
            ->where('status','SUCCESS')
            ->get();
        $kate = kategori::all();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.adminkelasbaru.edit')
            ->with([
                'kelas'=>$kelas,
                'kate'=>$kate,
                'mentor'=>$mentor,
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
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $this->validate($request,[
            'file'=>'required|file|mimes:jpeg,png,jpg|max:2048',
            'kelas'=>' required',
            'deskripsi' => 'required',
            'harga' => 'nullable',
            'jenis' => 'required|in:gratis,premium,paket',
            'kategori'=> 'required',
            'sertifikat' => 'required',
            'konsultansi' => 'required',
            'link_konsul'=>'nullable',
            'tingkatan' =>'required|in:Pemula,Lanjutan,Semua tingkatan',
            'topik'=>'required',
            'mentor_id'=>'required|exists:users,kode_mentor'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        $tujuan_upload = 'adminkelasbaru';

        $file->move($tujuan_upload,$nama_file);

        Kelas::where('id',$kelas->id)
            ->update([
                'file'=>$nama_file,
                'kelas'=>$request->kelas,
                'deskripsi'=>$request->deskripsi,
                'harga'=> $request->harga,
                'jenis'=>$request->jenis,
                'kategori' => $request->kategori,
                'sertifikat'=> $request->sertifikat,
                'konsultansi'=> $request->konsultansi,
                'tingkatan'=> $request->tingkatan,
                'topik'=>$request->topik,
                'mentor_id'=>$request->mentor_id
            ]);
        $file = $request->file('file');
        return redirect()->route('adminkelasbaru.index');
    }

    public function ubah(Request $request,$id)
    {
        $data = $this->validate($request,[
            'file'=>'nullable|file|mimes:jpeg,png,jpg,svg',
            'kelas'=>' required',
            'deskripsi' => 'required',
            'harga' => 'nullable',
            'jenis' => 'required|in:gratis,premium,paket',
            'kategori'=> 'required',
            'sertifikat' => 'required',
            // 'konsultansi' => 'required',
            'link_konsul'=>'nullable',
            'tingkat' =>'required|in:Pemula,Lanjutan',
            'materi'=>'required|in:SD,SMP,SMA SMK,Semua Tingkatan',
            'topik'=>'required',
            'mentor_id'=>'required|exists:users,kode_mentor',
            'status'=>'required|in:FAILED,REQUEST,PENDING,PUBLISH'
        ]);

        if($request->file('file') == null)
        {

        }else{
            $data['file'] = $request->file('file')->store(
                'assets/adminkelasbaru', 'public'
                // 'penyimpanan','public'
            );
        }
        $data['konsultansi'] = false;

        $data['slug'] = Str::slug($request->kelas);

        //$data = new Video();

        Kelas::where('id',$id)
            ->update($data);

        return redirect()->route('adminkelasbaru.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        Video::with('bayar')
            ->where('products_id', $id)
            ->delete();
        return redirect()->route('adminkelasbaru.index')->with('success','Data Berhasil Dihapus');
    }

    public function hapus($id)
    {
        Video::destroy($id);
        return redirect()->route('video.index')->with('success','Data Berhasil Dihapus');
    }

    public function gallery(Request $request, $id, $slug=null)
    {
        $video = Kelas::where('slug',$id)
            ->orWhere('id',$id)
            ->first();
        $items = Video::with('bayar')
            ->where('products_slug',$id)
            ->get();
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
        return view('admin.video.gallery')->with([
            'video' => $video,
            'items' => $items,
            'itung'=>$itung,
            'pen'=>$pen,
            'bls'=>$bls,
            'req'=>$req
        ]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:FAILED,REQUEST,PENDING,PUBLISH'
        ]);
        $item = Kelas::findOrfail($id);
        $item->status = $request->status;
        $item->save();

        return redirect()->route('adminkelasbaru.index')->with('success','Status Berhasil Diubah');
    }
}
