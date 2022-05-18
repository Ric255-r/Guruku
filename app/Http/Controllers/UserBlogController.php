<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Bookmark;
use App\ModelCommentBlog;
use App\ModelReplyBlog;
use DB;
use App\Http\Controllers\Controller;
use App\TransactionDetail;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('status','PUBLISH')
            ->where('jenis','lainnya')
            ->paginate(9);
        return view('blog.index')
            ->with([
                'blog'=>$blog
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
    //fungsi_komentar
    public function store_comment(Request $request)
    {
        $data = $request->validate([
            'id_blog'=>'required',
            'pesan'=>'required',
            'likes'=>'nullable',
            'blog_slug'=>'required'
        ]);
        $data['id_user'] = Auth::user()->id;

        ModelCommentBlog::create($data);
    }

    public function balas_komen(Request $request, $id_komen)
    {
        $data = $request->validate([
            'id_blog'=>'required',
            'pesan'=>'required',
            'likes'=>'nullable',
            'blog_slug'=>'required'
        ]);
        $data['id_user'] = Auth::user()->id;
        $data['id_comment'] = $id_komen;

        ModelReplyBlog::create($data);
    }

    public function delete_comment(Request $request, $id)
    {
        ModelCommentBlog::where('id', $id)->delete();
        ModelReplyBlog::where('id_comment', $id)->delete();
        return redirect()->back();
    }

    public function delete_reply(Request $request, $id)
    {
        ModelReplyBlog::where('id', $id)->delete();
        return redirect()->back();
    }
    //end fungsi_komentar

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if(Auth::check())
        {
            $blog_slug = $request->slug;
            $blog = Blog::with('mentor','kelas')
                ->where('status','PUBLISH')
                ->where('slug',$id)
                ->first();
            //$gratis = $blog->kelas->jenis == 'gratis';
            $comment = DB::table('comment_blog AS b')
                ->join('users AS u', 'b.id_user', '=', 'u.id')
                ->select('b.*', 'u.name', 'u.file')
                ->where('b.id_blog', $blog->id)
                ->get();

            $reply = DB::table('reply_blog AS r')
                ->join('comment_blog AS b', 'r.id_comment', '=', 'b.id')
                ->join('users AS u', 'r.id_user', '=', 'u.id')
                ->select('r.*', 'u.name', 'u.file')
                ->where('r.id_blog', $blog->id)
                ->get();

            $transaction = TransactionDetail::with('blog')
                ->where('products_id',$blog->kelas_id)
                ->where('user_id',Auth::user()->id)
                //->where($gratis->jenis,'gratis')
                ->get();

            $lain = Blog::where('status','PUBLISH')
                ->where('jenis','lainnya')
                ->get();
            $bloglain = Blog::where('status','PUBLISH')
                ->where('jenis','lainnya')
                ->take(9)
                ->get();
            $bookmark = Bookmark::where('user_id',Auth::user()->id)
                ->where('blog_id',$blog->slug)
                ->get();
            //$bloglain = Blog::all()
            //    ->limit(9);
            return view('blog.show')
                ->with([
                    'blog'=>$blog,
                    'lain'=>$lain,
                    'bloglain'=>$bloglain,
                    'comment'=>$comment,
                    'reply'=>$reply,
                    //validasi
                    'transaction'=>$transaction,
                    'bookmark'=>$bookmark,
                    'blog_slug'=>$blog_slug
                    //'gratis'=>$gratis
                ]);
        }else{
            $blog = Blog::with('mentor','kelas')
                ->where('status','PUBLISH')
                //->where('jenis','lainnya')
                //->orWhere('jenis','kelas')
                ->where('slug',$id)
                ->first();

            $comment = DB::table('comment_blog AS b')
                            ->join('users AS u', 'b.id_user', '=', 'u.id')
                            ->select('b.*', 'u.name', 'u.file')
                            ->where('b.id_blog', $blog->id)
                            ->get();

            $reply = DB::table('reply_blog AS r')
                            ->join('comment_blog AS b', 'r.id_comment', '=', 'b.id')
                            ->join('users AS u', 'r.id_user', '=', 'u.id')
                            ->select('r.*', 'u.name', 'u.file')
                            ->where('r.id_blog', $blog->id)
                            ->get();


            //$jenis_kelas = $blog->jenis == 'kelas';
            //$gratis = $blog->kelas;

            //$jenis_lainnya = $blog->jenis == 'lainnya';
            //$lainnya - $blog->
            //$bayar = $blog->kelas->jenis == 'bayar';

            $transaction = TransactionDetail::with('blog')
                ->get();
            $lain = Blog::where('status','PUBLISH')
                ->where('jenis','lainnya')
                ->get();
            $bloglain = Blog::where('status','PUBLISH')
                ->where('jenis','lainnya')
                ->take(9)
                ->get();
            //$bloglain = Blog::all()
            //    ->limit(9);
            return view('blog.show')
                ->with([
                    'blog'=>$blog,
                    'lain'=>$lain,
                    'bloglain'=>$bloglain,
                    'comment'=>$comment,
                    'reply'=>$reply,
                    //validasi
                    'transaction'=>$transaction,
                    //'gratis'=>$gratis,
                    //'jenis_kelas'=>$jenis_kelas,
                    //'jenis_lainnya'=>$jenis_lainnya
                    //'bayar'=>$bayar
                ]);
            }

    }

    public function cari(Request $request)
    {
        $b = $request->b;
        $blog = Blog::where('title','like',"%".$b."%")
            ->where('status','PUBLISH')
            ->where('jenis','lainnya')
            ->paginate(6);
        return view('blog.index')
            ->with([
                'blog'=>$blog
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
