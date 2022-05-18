<?php

namespace App\Http\Controllers;

use App\Bank;
use App\User;
use App\Blog;
use App\Sertifikat;
use App\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
use DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ProfileMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('ben')
            ->where('id',Auth::user()->id)
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

        return view('amentor.profile.index')
            ->with([
                'user'=>$user,
                'kon'=>$kon,
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
        $path = Route::currentRouteName();
        $user = User::findOrfail($id);
        $bank = Bank::all();
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

        return view('amentor.profile.edit')
            ->with([
                'user'=>$user,
                'bank'=>$bank,
                'path'=>$path,
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
        $path = Route::currentRouteName();
        $statustelp = $request->statustelp;
        //echo $path;
        if($path == 'amentor.profile.edit'){
            if(!isset($statustelp)){
                $data = $request->validate([
                    //'name'=>'required',
                    //'email'=>'required',
                    //'roles'=>'required',
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'bank'=>'nullable|exists:bank,id',
                    'no_rek'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                ]);
            }else if($statustelp == false){
                $data = $request->validate([
                    //'name'=>'required',
                    //'email'=>'required',
                    //'roles'=>'required',
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'telp'=>'required',
                    'statustelp'=>'required',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'bank'=>'nullable|exists:bank,id',
                    'no_rek'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                ]);
                $data['telp'] = $request->telp;
                $data['statustelp'] = true;
            }

            $data['file'] = $request->file('file')->store(
                'assets/users','public'
            );

            User::where('id',$id)
                ->update($data);

            return redirect()->route('amentor.profile.index')->with('success','Data Berhasil Diubah');
        }else{
            if(!isset($statustelp)){
                $data = $request->validate([
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'bank'=>'nullable|exists:bank,id',
                    'no_rek'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                ]);
            }else if($statustelp == false){
                $data = $request->validate([
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'telp'=>'required',
                    'statustelp'=>'required',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'bank'=>'nullable|exists:bank,id',
                    'no_rek'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                ]);
                $data['telp'] = $request->telp;
                $data['statustelp'] = true;
            }

            if($request->file == null)
            {
                User::where('id',$id)
                    ->update($data);
                return redirect()->route('amentor.profile.index')->with('success','Data Berhasil Diubah');
            }else{
                $data['file'] = $request->file('file')->store(
                    'asset/users','public'
                );

                User::where('id',$id)
                    ->update($data);
                return redirect()->route('amentor.profile.index')->with('success','Data Berhasil Diubah');
            }

            //$data['file'] = $request->file('file')->store(
            //    'asset/users','public'
            //);

            //User::where('id',$id)
            //    ->update($data);
            //return redirect()->route('amentor.profile.index')->with('success','Foto Berhasil Diupload');
        }
    }

    public function updatefoto($id)
    {
        $user = User::findOrfail($id);
        $path = Route::currentRouteName();
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
        return view('amentor.profile.updatefoto')
            ->with([
                'user'=>$user,
                'path'=>$path,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function prosesupload(Request $request, $id)
    {
        $data = $request->validate([
            'file'=>'required|mimes:png,jpg,jpeg'
        ]);

        $data['file'] = $request->file('file')->store(
            'asset/users','public'
        );

        User::where('id',$id)
            ->update($data);
        return redirect()->route('amentor.profile.index')->with('success','Foto Berhasil Diupload');
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
