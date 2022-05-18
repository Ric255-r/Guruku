<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Bookmark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //$blog = Blog::findOrfail($id);
        $aidi = $request->blog_id;
        //$blog = $request->input('slug');
        //echo $blog;

        $data = $request->validate([
            'blog_id'=>'required',
            'user_id'=>'required',
            'status'=>'required'
        ]);
        Bookmark::create($data);
        return redirect()->route('blog.show',$aidi)->with('success_tambah','Berhasil menambahkan ke favorit list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $aidi = $request->blog_id;

        $data = $request->validate([
            'blog_id'=>'required',
            'user_id'=>'required',
            'status'=>'required'
        ]);
        Bookmark::where('id',$id)
            ->update($data);
        return redirect()->route('blog.show',$aidi)->with([
            'success'=>'Berhasil menambahkan kedalam favorit list',
            'success2'=>'Berhasil menghapus dari favorit list'
        ]);
    }

    public function update_user(Request $request, $id)
    {
        $data = $request->validate([
            'blog_id'=>'required',
            'user_id'=>'required',
            'status'=>'required'
        ]);
        Bookmark::where('id',$id)
            ->update($data);
        return redirect()->route('blog.favorite')->with([
            'success'=>'Berhasil menghapus blog dari favorit list',
            //'success2'=>'Berhasil menghapus dari favorit list'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}
