<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Video;
use App\Blog;
use App\Sertifikat;
use App\Transaction;
use App\TransactionDetail;
use App\VideoDetails;
use App\Mentor;
use Illuminate\Support\Str;
use App\kategori;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class MentorKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->orderByRaw("(status = 'PUBLISH'),(status = 'PENDING'), (status = 'FAILED'), (status = 'REQUEST') DESC")
            ->get();
        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            //->orWhere('status','REQUEST')
            ->count();
        //card
        $total = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->count();
        $publish = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->where('status','PUBLISH')
            ->count();
        $pending = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        $request = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->where('status','REQUEST')
            ->count();
        $failed = Kelas::where('mentor_id',Auth::user()->kode_mentor)
            ->where('status','FAILED')
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

        return view('amentor.kelas.index')
            ->with([
                'kelas'=>$kelas,
                'kon'=>$kon,
                'total'=>$total,
                'publish'=>$publish,
                'pending'=>$pending,
                'request'=>$request,
                'failed'=>$failed,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function gallery(Request $request, $id)
    {
        $video = Kelas::where('slug',$id)
            ->orWhere('id',$id)
            ->first();
        $items = Video::with('bayar')
            ->where('products_slug',$id)
            ->get();
        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //$items = Video::with('bayar')
        //    ->where('products_slug',$id)
        //    ->get();
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

        return view('amentor.kelas.gallery')->with([
            'video' => $video,
            'items' => $items,
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
        $item = Kelas::findOrfail($id);
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
        return view('amentor.kelas.show',compact('item','kon','totalkomen', 'totalreply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrfail($id);
        $mentor = User::where('roles','MENTOR')->get();
        $kate = kategori::all();
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
        return view('amentor.kelas.edit')
            ->with([
                'kelas'=>$kelas,
                'kate'=>$kate,
                'mentor'=>$mentor,
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
        $data = $this->validate($request,[
            'file'=>'nullable|file|mimes:jpeg,png,jpg,svg',
            'kelas'=>' required',
            'deskripsi' => 'required',
            'harga' => 'nullable',
            'jenis' => 'required|in:gratis,premium,paket',
            'kategori'=> 'required',
            'sertifikat' => 'required',
            'konsultansi' => 'required',
            'link_konsul'=>'nullable',
            'tingkat' =>'required|in:Pemula,Lanjutan,Semua tingkatan',
            'topik'=>'required',
            'mentor_id'=>'required',
        ]);

        if($request->file('file') == null)
        {

        }else{
            $data['file'] = $request->file('file')->store(
                'assets/adminkelasbaru', 'public'
                // 'penyimpanan','public'
            );
        }

        $data['slug'] = Str::slug($request->kelas);

        Kelas::where('id',$id)
            ->update($data);

        return redirect()->route('amentor.kelas.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        Video::with('bayar')
            ->where('products_id', $id)
            ->delete();
        return redirect()->route('amentor.kelas.index')->with('success','Data Berhasil Dihapus');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,PUBLISH'
        ]);
        $item = Kelas::findOrfail($id);
        $item->status = $request->status;
        $item->save();

        return redirect()->route('amentor.kelas.index')->with('success','Status Berhasil Diubah');
    }
}
