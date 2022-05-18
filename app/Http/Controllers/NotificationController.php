<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\ModelCommentBlog;
use App\ModelReplyBlog;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif = Transaction::where('user_id',Auth::user()->id)->get();
        $komen = ModelCommentBlog::where('id_user', Auth::user()->id)->get();
        $reply = DB::table('reply_blog AS r')
                    ->join('comment_blog AS c', 'r.id_comment', '=', 'c.id')
                    ->join('users AS uu', 'c.id_user', '=', 'uu.id')
                    ->join('users AS u', 'r.id_user', '=', 'u.id')
                    ->select('r.*', 'u.name', 'uu.name AS orang_intikomen')
                    ->where('r.status_user', 'unchecked')
                    ->get();
        // return view('/users/notif',compact('notif'));
        return view('/users/notif',['notif'=>$notif, 'komen'=>$komen, 'reply'=>$reply]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //notifkomen
    public function update_status(Request $request, $id)
    {
        $blog = $request->blog_slug;
        $user = $request->id_user_balas;
        ModelCommentBlog::where('id', $id)
                        ->update([
                            'status_user'=>'checked'
                        ]);
        ModelReplyBlog::where('id_comment', $id)
                        ->where('id_user', $user)
                        ->update([
                            'status_user'=>'checked'
                        ]);
        return redirect()->route('blog.show', $blog);
    }
    //endnotifkomen
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
        $item = Transaction::with('details.product')->findOrFail($id);
        return view('users.show',compact('item'));
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
