<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoDetailsRequest;
use App\VideoDetails;
use App\Video;
use App\Kelas;
use App\Transaction;
use App\User;
use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = VideoDetails::all();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/video_details/index')
            ->with([
                'video'=>$video,
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
        $video = Video::all();
        $kelas = Kelas::all();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('/admin/video_details/create')
            ->with([
                'video'=>$video,
                'kelas'=>$kelas,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    public function dependent(Request $request)
    {
        $products_id = $request->get('products_id');
        $video = Video::with('bayar')
            ->where('products_id',$products_id)
            ->get();
        return response()->json($video);

        //$products_id = $request->get('products_id');
        //$judul = Video::with('bayar')
        //    ->where('products_id',$products_id)
        //    ->get();
        //return response()->json($judul);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        $data = $this->validate($request,[
            'video_id'=>'required|exists:video,id',
            'file'=>'required',
            'nama'=>'required',
            'products_id'=>'required|exists:kelasbaru,kelas',
            'number'=>'string',
            'modul'=>'file|mimes:pdf,doc,docx',
            'namamodul'=>'string',
            'kuis'=>'required',
            'linkkuis'=>'nullable'
        ]);

        //upload file

        $modul = $request->file('modul');
        if($modul == null)
        {

        }else{
            $data['modul'] = $request->file('modul')->store(
                'assets/videodetails','public'
            );
            $data['namamodul'] = $request->file('modul')->getClientOriginalName();
        }

        $data['products_slug'] = Str::slug($request->products_id);

        VideoDetails::create($data);

        //VideoDetails::create([
        //    'video_id'=>$request->video_id,
        //    'file'=>$request->file,
        //    'products_slug'=>$data['products_slug'] = Str::slug($request->products_id),
        //    'nama'=>$request->nama,
        //    'products_id'=>$request->products_id,
        //    'number'=>$request->number,
        //    'modul'=>$original
        //]);

        //$file = $request->file('modul');

        return redirect()->route('videodetails.index')->with('success','Data Berhasil Ditambah');

        //$data = $request->all();
        //$data['modul'] = $request->file('file')->store(
        //    'assets/videodetails','public'
        //);
        //$data['products_slug'] = Str::slug($request->products_id);
        //VideoDetails::create($data);
        //return redirect()->route('videodetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoDetails  $videoDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = VideoDetails::findOrfail($id);
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
        return view('admin.video_details.show')
            ->with([
                'video'=>$video,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);

        //pertama kau count dlu ada berapa yg benar
        //$count = VideoDetails::all()->where('cekjawabanbenar','cekjawabanuser')->count();
        //lalu baru kau sum
        //$total = VideoDetails::where('cekjawabanbenar','cekjawabanuser')->sum($count);
        //klo mau bikin dia yg salah berarti bedakan di tanda doang
        //$total2 = VideoDetails::where('cekjawabanbenar','!=','cekjawabanuser')->sum($count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoDetails  $videoDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = VideoDetails::findOrfail($id);
        $kelas = Kelas::all();
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.video_details.edit')
            ->with([
                'video'=>$video,
                'kelas'=>$kelas,
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
     * @param  \App\VideoDetails  $videoDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
            'video_id'=>'required|exists:video,id',
            'file'=>'required',
            'nama'=>'required',
            'products_id'=>'required|exists:kelasbaru,kelas',
            'number'=>'string',
            'modul'=>'file|mimes:pdf',
            'namamodul'=>'string'
        ]);
        $data['modul'] = $request->file('modul')->store(
            'assets/videodetails','public'
        );
        $data['namamodul'] = $request->file('modul')->getClientOriginalName();

        $data['products_slug'] = Str::slug($request->products_id);

        VideoDetails::where('id',$id)
            ->update($data);

        return redirect()->route('videodetails.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoDetails  $videoDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VideoDetails::destroy($id);
        return redirect()->route('videodetails.index')->with('success','Data Berhasil Dihapus');
    }
}
