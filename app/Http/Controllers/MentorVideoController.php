<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\VideoDetails;
use App\Mentor;
use App\Kelas;
use App\Blog;
use DB;
use App\Sertifikat;
use App\Http\Requests\VideoRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MentorVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->where('status', '!=', 'FAILED')
            ->get();
        $video = Video::with('bayar')
            ->get();
        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        $kelaskat = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->where('status','!=', 'FAILED')
            ->get();

        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        foreach($bloge as $query)
        {
            $not =  $query->komentar->count() + $query->balasan->count();
        }

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

        return view('amentor.video.index')
            ->with([
                'kelas'=>$kelas,
                'video'=>$video,
                'kon'=>$kon,
                'kelaskat'=>$kelaskat,
                // 'not'=>$not,
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
        $kelas = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->get();
        $video = Video::with('bayar')
            ->orderBy('id','DESC')
            ->take(5)
            ->get();
        //request status
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
        return view('amentor.video.create')
            ->with([
                'kelas'=>$kelas,
                'kon'=>$kon,
                'video'=>$video,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $data = $request->all();

        $data['products_slug'] = Str::slug($request->products_id);
        Video::create($data);
        return redirect()->route('amentor.video.create')->with('success','Data Berhasil Ditambah');
    }

    public function filtervideo(Request $request)
    {
        $user = Auth::user()->kode_mentor;
        $getkan = $request->get('products_id');
        $query = Video::with('bayar')
                ->where('products_id', $getkan)
                ->get();
        if($query->isEmpty()){
            $obj[] = (object) array("Kosong"=>true);
            return response()->json($obj);
        }else{
            return response()->json($query);
        }
        // $query = DB::select("SELECT v.*, k.kelas, k.mentor_id FROM video v JOIN kelasbaru k ON v.products_id = k.kelas WHERE v.products_id = '$getkan' AND k.mentor_id = '$user'");
        // return response()->json($query);
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
        $video = Video::findOrfail($id);
        //request status
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
        return view('amentor.video.edit')
            ->with([
                'video'=>$video,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
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
            'judul'=>'required'
        ]);
        Video::where('id',$id)
            ->update($data);
        return redirect()->route('amentor.video.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrfail($id);
        $details = VideoDetails::with('video')
            ->where('video_id',$id)
            ->delete();

        Video::destroy($id);

        return redirect()->route('amentor.video.index')->with('success','Data Berhasil Dihapus');
    }

    public function destroy_create($id)
    {
        $video = Video::findOrfail($id);
        $details = VideoDetails::with('video')
            ->where('video_id',$id)
            ->delete();

        Video::destroy($id);

        return redirect()->route('amentor.video.create')->with('success','Data Berhasil Dihapus');
    }


}
