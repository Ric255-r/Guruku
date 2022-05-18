<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modul;
use App\Kelas;
use App\Blog;
use App\Sertifikat;
use Auth;
use DB;
use App\VideoDetails;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modul = Modul::with('vidi','details')
            ->get();
        $kelas = Kelas::where('mentor_id', Auth::user()->kode_mentor)
            ->where('status', '!=', 'FAILED')
            ->get();
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }

        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        return view('amentor.modul.index')
            ->with([
                'modul'=>$modul,
                'kelas'=>$kelas,
                // 'not'=>$not,
                'kon'=>$kon,
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
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
    public function store(Request $request)
    {
        //
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
        $modul = Modul::with('vidi')
            ->findOrfail($id);
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }

        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();
        return view('amentor.modul.edit')
            ->with([
                'modul'=>$modul,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function getKelas(Request $request)
    {
        $g = $request->get('products_slug');
        // $modul = Modul::with('vidi','details')
        //     ->where('products_slug', $g)
        //     ->where('kode_mentor', Auth::user()->kode_mentor)
        //     ->get();

        $modul = DB::table('modul AS m')
                    ->join('video AS v', 'm.video', '=', 'v.id')
                    ->join('videodetails AS vd', 'm.videodetails_id', '=', 'vd.id')
                    ->join('kelasbaru AS k', 'm.products_slug', '=', 'k.slug')
                    ->select('m.*', 'v.judul', 'vd.nama')
                    ->where('m.products_slug', '=', $g)
                    ->where('m.kode_mentor', '=', Auth::user()->kode_mentor)
                    ->where('k.status', '!=', 'FAILED')
                    ->get();

        if($modul->isEmpty()){
            $obj[] = (object) array("empty"=>true);
            return response()->json($obj);
        }else{
            return response()->json($modul);
        }
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
        $video = Modul::findOrfail($id);
        //foreach($video as $query)
        //{
        //    $aidi = $query->id;
        //}

        $data = $request->validate([
            'video'=>'required|exists:video,id',
            'videodetails_id'=>'required|exists:videodetails,id',
            'file'=>'required|file|mimes:png,jpg,pdf,PDF,docx,doc,txt,zip,ppt,pptx,mp4,jpeg,xlsx,rar',
            'kode_mentor'=>'required|exists:users,kode_mentor',
            'nama_modul'=>'string'
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/modul_details','public'
        );
        $data['nama_modul'] = $request->file('file')->getClientOriginalName();

        Modul::where('id',$id)
            ->update($data);
        //$request->session()->put(['modul',$modul]);
        //return Redirect::route('amentor.videodetails.modul',['modul' => base64_encode($modul)]);
        return redirect()->route('amentor.videodetails.modul',$video->videodetails_id)->with('success','Modul Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Modul::findOrfail($id);
        //foreach($video as $query)
        //{
        //    $aidi = $query->id;
        //}

        Modul::destroy($id);
        return redirect()->route('amentor.videodetails.modul',$video->videodetails_id)->with('success','Data Berhasil Dihapus');
    }
}
