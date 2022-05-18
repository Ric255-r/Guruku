<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Facades\Auth;
use App\kategori;
use App\Topik;
use App\Sertifikat;
use App\User;
use App\Kelas;
use App\Transaction;
use App\ContactUs;
use App\ModelCommentBlog;
use App\ModelReplyBlog;
use DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        $blog = Blog::where('author_id',Auth::user()->kode_mentor)
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

        return view('amentor.blog.index')
            ->with([
                'blog'=>$blog,
                'kategori'=>$kategori,
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
        $kategori = Kategori::all();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
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
        //$topik = Topik::all();
        return view('amentor.blog.create')
            ->with([
                'kategori'=>$kategori,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'kon'=>$kon,
                // 'not'=>$not
                //'topik'=>$topik
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function filter(Request $request)
    {
        $kategori = $request->get('kategori');
        $blog = Blog::where('author_id',Auth::user()->kode_mentor)
                    ->where('kategori',$kategori)
                    ->get();
        return response()->json($blog);
    }

    //notif
    public function notifblog(Request $request)
    {
        $blog = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();

        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
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

        // foreach($blog as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }

        return view('amentor.blog.notif',[
                'blog'=>$blog,
                // 'not'=>$not,
                //'komen'=>$komen,
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'kon'=>$kon
            ]);

        // $komen = DB::table('comment_blog AS c')
        //             ->join('blog AS b', 'c.id_blog', '=', 'b.id')
        //             ->select('c.*', 'b.author_id', 'b.author', 'b.title')
        //             ->where('c.status_mentor', 'unchecked')
        //             ->where('b.status', '=', 'PUBLISH')
        //             ->where('b.author_id', '=', Auth::user()->kode_mentor)
        //             ->get();

        // $reply = DB::table('reply_blog AS r')
        //                 ->join('blog AS b', 'r.id_blog', '=', 'b.id')
        //                 ->join('comment_blog AS c', 'r.id_comment', '=', 'c.id')
        //                 ->join('users AS u', 'r.id_user', '=', 'u.id')
        //                 ->select('r.*', 'u.name', 'u.file','b.author_id', 'b.author', 'b.title')
        //                 ->where('c.status_mentor', 'unchecked')
        //                 ->where('b.status', '=', 'PUBLISH')
        //                 ->where('b.author_id', '=', Auth::user()->kode_mentor)
        //                 ->get();

        // return view('amentor.blog.notif', ['komen'=>$komen, 'blog'=>$blog, 'reply'=>$reply]);
    }

    public function update_status(Request $request, $id)
    {
        $blog = $request->blog_slug;
        ModelCommentBlog::where('id_blog', $id)
                        ->update([
                            'status_mentor'=>'checked'
                        ]);
        ModelReplyBlog::where('id_blog', $id)
                        ->update([
                            'status_mentor'=>'checked'
                        ]);
        return redirect()->route('blog.show', $blog);
    }
    //endnotif

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$input = $request->input();
        $data = $request->validate([
            'file'=>'required',
            'title'=>'required',
            'subtitle'=>'required',
            'isi'=>'required',
            'kategori'=>'required',
            'topik'=>'required',
            'jenis'=>'required',
            'kelas_id'=>'nullable',
            'author'=>'required',
            'author_id'=>'required',
            'jenis'=>'nullable',
            'kelas_id'=>'nullable',
            'status'=>'required|in:PENDING,PUBLISH'
        ]);
        //$request->input('jenis','lainnya');
        //$request->input('kelas_id',NULL);

        $data['slug'] = Str::slug($request->title);

        $data['file'] = $request->file('file')->store(
            'assets/blog', 'public'
        );
        Blog::create($data);
        return redirect()->route('amentor.blog.index');
    }

    public function getKelas(Request $request)
    {
        $kelas = Kelas::where('mentor_id', Auth::user()->kode_mentor)
                        // ->where('status', 'PUBLIC')
                        ->get();
        return response()->json($kelas);
    }

    public function viewblog($id)
    {
        $blog = Blog::findOrfail($id);
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

        return view('amentor.blog.isi')
            ->with([
                'blog'=>$blog,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function blog(Request $request, $id)
    {
        $data = $request->validate([
            'isi'=>'required',
            'status'=>'nullable|in:PENDING,PUBLISH'
        ]);
        Blog::where('id',$id)
            ->update($data);
        return redirect()->route('amentor.blog.view',$id)->with('success','Berhasil save');
    }

    public function setStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|in:PENDING,PUBLISH',
            'publish_date' => 'nullable'
        ]);
        $item = Blog::findOrfail($id);
        //$item->status = $request->status;
        $item->update($data);

        return redirect()->route('amentor.blog.index')->with('success','Status Berhasil Diubah');
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
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('author_id',Auth::user()->kode_mentor)
            ->findOrfail($id);
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
        return view('amentor.blog.show')
            ->with([
                'blog'=>$blog,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        $kategori = Kategori::all();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }
        return view('amentor.blog.edit')
            ->with([
                'blog'=>$blog,
                'kategori'=>$kategori,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'file'=>'nullable',
            'title'=>'required',
            'subtitle'=>'required',
            //'isi'=>'required',
            'kategori'=>'required',
            'topik'=>'required',
            'author'=>'required',
            'author_id'=>'required',
            //'status'=>'required|in:PENDING,PUBLISH'
        ]);
        $data['slug'] = Str::slug($request->title);

        if($request->file('file') != null)
        {
            $data['file'] = $request->file('file')->store(
                'assets/blog', 'public'
            );
        }else{

        }

        Blog::where('id',$id)
            ->update($data);

        return redirect()->route('amentor.blog.index')->with('success','Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->route('amentor.blog.index');
    }
}
