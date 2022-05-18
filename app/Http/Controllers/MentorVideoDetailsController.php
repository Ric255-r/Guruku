<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoDetails;
use App\Kelas;
use App\Modul;
use DB;
use App\ModelKuis;
use App\Video;
use App\Blog;
use App\Sertifikat;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MentorVideoDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vid = Kelas::where('mentor_id',Auth::user()->kode_mentor)->get();
        $video = VideoDetails::with('kelas','video')
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
        return view('amentor.videodetails.index')
            ->with([
                'video'=>$video,
                'vid'=>$vid,
                'kon'=>$kon,
                // 'not'=>$not
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
        $video = Video::all();
        $kelas = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->get();
        // $kuis = ModelKuis::where('mentor_id', Auth::user()->kode_mentor)
        //     //->where('status','active')
        //     ->where(function($q){
        //         $q->where('jenis', 'video')
        //             ->orWhere('jenis', 'video_akhir');
        //     })->get();
        $videodetails = VideoDetails::with('kelas','video')
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
        return view('amentor.videodetails.create')
            ->with([
                'video'=>$video,
                'kelas'=>$kelas,
                'kon'=>$kon,
                // 'kuis'=>$kuis,
                'videodetails'=>$videodetails,
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
    public function filter(Request $request){
        $user = Auth::user()->kode_mentor;
        $getkan = $request->get('products_id');
        // $query = VideoDetails::with('kelas')
        //                     ->where('products_id',$getkan)
        //                     ->get();
        $query = DB::select("SELECT vd.nama, vd.file, vd.number, vd.id, vd.number, k.kelas, k.mentor_id, v.judul FROM videodetails vd JOIN kelasbaru k ON (vd.products_id = k.kelas) JOIN video v ON (vd.video_id = v.id) WHERE k.mentor_id = :m AND vd.products_id = :prod ORDER BY vd.number ASC", ['m'=>$user, 'prod'=>$getkan]);
        return response()->json($query);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'video_id'=>'required|exists:video,id',
            'file'=>'required',
            'nama'=>'required',
            'products_id'=>'required|exists:kelasbaru,kelas',
            'number'=>'string',
            //'modul'=>'nullable|file|mimes:pdf',
            //'namamodul'=>'string',
            'kuis'=>'nullable',
            'link_kuis'=>'nullable',
            'blog'=>'nullable',
            'link_blog'=>'nullable',
            'status'=>'required'
        ]);
        if(!isset($request->link_kuis)){
            $data['link_kuis'] = "-";
        }else{
            $data['link_kuis'] = $request->link_kuis;
        }

        $data['products_slug'] = Str::slug($request->products_id);

        VideoDetails::create($data);

        return redirect()->route('amentor.videodetails.create')->with('success','Data Berhasil Ditambah');
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

    public function getKuis(Request $request)
    {
        $products_id = $request->get('products_id');
        $kelas = Kelas::where('kelas', $products_id)
                        ->where('mentor_id', Auth::user()->kode_mentor) //
                        ->first();
        // $kuis = ModelKuis::where('mentor_id', Auth::user()->kode_mentor)
        //                 ->where('status','active')
        //                 ->where('kelas_id', $kelas->id)
        //                 ->where(function($q){
        //                     $q->where('jenis', 'video')
        //                         ->orWhere('jenis', 'video_akhir');
        //                 })->get();

        
        // if($kuis->isEmpty()){
        //     $obj[] = (object) array('Kosong'=>true);
        //     return response()->json($obj);
        // }else{
        //     return response()->json($kuis);
        // }

        $kuis = DB::select("SELECT nama_kuis, slug, jenis FROM tbkuis WHERE slug NOT IN 
                    (SELECT link_kuis FROM videodetails WHERE products_slug = :slug) 
                        AND mentor_id = :m
                        AND status = :s 
                        AND kelas_id = :k 
                        AND (jenis = :v OR jenis = :va)", [   
                            'slug'=>$kelas->slug,
                            'm'=>Auth::user()->kode_mentor, 
                            's'=>'active', 
                            'k'=>$kelas->id,
                            'v'=>'video',
                            'va'=>'video_akhir'
                        ]);

        if(empty($kuis)){
            $obj[] = (object) array('Kosong'=>true);
            return response()->json($obj);
        }else{
            return response()->json($kuis);
        }
    }

    public function getNumber(Request $request)
    {
        $products_id = $request->get('products_id');
        // $video = VideoDetails::with(["gurunya"=>function($q){
        //     $q->where("mentor_id", "=", Auth::user()->kode_mentor);
        // }])->where('products_id',$products_id)
        //     ->get();

        $video = DB::table('videodetails AS vd')
                    ->join('kelasbaru AS k', 'vd.products_slug', 'k.slug')
                    ->select(DB::raw('vd.*'), 'k.mentor_id')
                    ->where('vd.products_id', $products_id)
                    ->where('k.mentor_id', Auth::user()->kode_mentor)
                    ->max('number');
        if(!isset($video)){
            $obj[] = (object) array('Kosong'=>true);
            return response()->json($obj);
        }else{
            $obj[] = (object) array('number'=>intval($video) + 1);
            return response()->json($obj);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = VideoDetails::findOrfail($id);
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
        return view('amentor.videodetails.show')
            ->with([
                'video'=>$video,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = VideoDetails::findOrfail($id);
        $kelas = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->get();
        // $kuis = ModelKuis::where('mentor_id', Auth::user()->kode_mentor)
        //                     ->where('jenis', 'video')
        //                     ->orWhere('jenis','video_akhir')
        //                     //->orWhere('status', 'active')
        //                     ->get();
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
        return view('amentor.videodetails.edit')
            ->with([
                'video'=>$video,
                'kelas'=>$kelas,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
                // 'kuis'=>$kuis
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
        $data = $this->validate($request,[
            'video_id'=>'required|exists:video,id',
            'file'=>'nullable',
            'nama'=>'required',
            'products_id'=>'required|exists:kelasbaru,kelas',
            'kuis'=>'nullable|boolean',
            'link_kuis'=>'nullable|string',
            'blog'=>'nullable|boolean',
            'link_blog'=>'nullable|string',
            'number'=>'string',
            //'modul'=>'file|mimes:pdf',
            //'namamodul'=>'string'
        ]);
        if(!isset($request->link_kuis)){
            $data['link_kuis'] = "-";
        }else{
            $data['link_kuis'] = $request->link_kuis;
        }
        //if($request->file('modul') == null)
        //{

        //}else{
        //    $data['modul'] = $request->file('modul')->store(
        //        'assets/videodetails','public'
        //    );
        //    $data['namamodul'] = $request->file('modul')->getClientOriginalName();
        //}

        $data['products_slug'] = Str::slug($request->products_id);

        VideoDetails::where('id',$id)
            ->update($data);

        return redirect()->route('amentor.videodetails.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VideoDetails::destroy($id);
        return redirect()->route('amentor.videodetails.index')->with('success','Data Berhasil Dihapus');
    }

    public function destroy_create($id)
    {
        VideoDetails::destroy($id);
        return redirect()->route('amentor.videodetails.create')->with('success','Data Berhasil Dihapus');
    }

    public function modul($id)
    {
        $video = VideoDetails::findOrfail($id);
        $modul = Modul::where('videodetails_id',$id)
            ->get();
        $kelas = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->get();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }

        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();

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
        return view('amentor.videodetails.modul')
            ->with([
                'video'=>$video,
                'modul'=>$modul,
                'kelas'=>$kelas,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function addmodul(Request $request)
    {
        $videodetails = $request->videodetails_id;
        //$video = Modul::findOrfail($id);
        //foreach($video as $query)
        //{
        //    $aidi = $query->videodetails_id;
        //}
        $data = $request->validate([
            'video'=>'required|exists:video,id',
            'videodetails_id'=>'required|exists:videodetails,id',
            'file'=>'required|file|mimes:png,jpg,pdf,docx,doc,txt,zip,ppt,pptx,mp4,jpeg,xlsx,rar',
            'kode_mentor'=>'required|exists:users,kode_mentor',
            'nama_modul'=>'string',
            'products_id'=>'required|string|exists:kelasbaru,kelas',
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/modul_details','public'
        );
        $data['nama_modul'] = $request->file('file')->getClientOriginalName();

        $data['products_slug'] = Str::slug($request->products_id);

        Modul::create($data);
        //$request->session()->put(['modul',$modul]);
        //return Redirect::route('amentor.videodetails.modul',['modul' => base64_encode($modul)]);
        return redirect()->route('amentor.videodetails.modul',$videodetails)->with('success','Modul Berhasil Ditambah');
    }


}
