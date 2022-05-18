<?php

namespace App\Http\Controllers;

use App\JoinDetail;
use App\Blog;
//use App\Join;
use Illuminate\Http\Request;
use App\Mentor;
//use App\Sertifikat;
use App\TransactionDetail;
use App\User;
use DB;
use App\ContactUs;
use App\Sertifikat;
use App\Transaction;
use Illuminate\Database\Eloquent\Builder;
use illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class AdminMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coba()
    {
        return view('coba');
    }

    public function sertifikat()
    {
        $sertifikat = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
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
        return view('amentor.sertifikat')
            ->with([
                'sertifikat'=>$sertifikat,
                'kon'=>$kon,
                // 'not'=>$not
                'totalkomen'=>$totalkomen,
                'totalreply'=>$totalreply
            ]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS'
        ]);

        $item = Sertifikat::findOrfail($id);

        $item->status = $request->status;
        $item->save();

        return redirect()->route('amentor.sertifikat')->with('success','Status Berhasil Diubah');
    }

    public function dex()
    {
        $users = User::with('ben')
            ->where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','SUCCESS')
            ->get();
        $bls = ContactUs::where('status','PENDING')
            ->count();
        $transaction = TransactionDetail::with('product','transaction')
            ->get();
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();


        if($transaction->count() == 0)
        {
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
            return view('amentor.kosong')
                ->with([
                    'users'=>$users,
                    'transaction'=>$transaction,
                    'kon'=>$kon,
                    'totalkomen'=>$totalkomen,
                    'totalreply'=>$totalreply
                ]);
        }

        foreach($transaction as $query)
        {
            if($transaction->count() > 0)
            {
                if($query->product->mentor_id == Auth::user()->kode_mentor && $query->transaction->user_id == $query->user_id)
                {
                    $mentor = $query->product;
                    $tran = $query->transaction->user_id;
                    $user = $query->user_id;
                    $hasil = $query->transaction->where('transaction_status','SUCCESS')->where('mentor_id',Auth::user()->kode_mentor)->sum('transaction_total');
                    $sukses = $query->transaction->where('transaction_status','SUCCESS')->where('mentor_id',Auth::user()->kode_mentor)->count();
                    $pending = $query->transaction->where('transaction_status','PENDING')->where('mentor_id',Auth::user()->kode_mentor)->count();
                    $gagal = $query->transaction->where('transaction_status','FAILED')->where('mentor_id',Auth::user()->kode_mentor)->count();
                    $join = JoinDetail::with('product','join')
                        ->get();
                    $bls = ContactUs::where('status','PENDING')
                        ->count();
                    //request sertifikat
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

                    return view('amentor.index')
                        ->with([
                            'users'=>$users,
                            'transaction'=>$transaction,
                            'join'=>$join,
                            'hasil'=>$hasil,
                            'join'=>$join,
                            'sukses'=>$sukses,
                            'pending'=>$pending,
                            'gagal'=>$gagal,
                            'bls'=>$bls,
                            'kon'=>$kon,
                            // 'not'=>$not
                            'totalkomen'=>$totalkomen,
                            'totalreply'=>$totalreply
                            //'tion'=>$tion
                            //'total'=>$total
                        ]);
                }
                else
                {
                    //return 'data kosong';
                    $mentor = $query->product;
                    $tran = $query->transaction->user_id;
                    $user = $query->user_id;
                    $hasil = $query->transaction->where('transaction_status','SUCCESS')->where('mentor_id',Auth::user()->kode_mentor)->sum('transaction_total');
                    $sukses = $query->transaction->where('transaction_status','SUCCESS')->where('mentor_id',Auth::user()->kode_mentor)->count();
                    $pending = $query->transaction->where('transaction_status','PENDING')->where('mentor_id',Auth::user()->kode_mentor)->count();
                    $gagal = $query->transaction->where('transaction_status','FAILED')->where('mentor_id',Auth::user()->kode_mentor)->count();
                    $join = JoinDetail::with('product','join')
                        ->get();
                    $bls = ContactUs::where('status','PENDING')
                        ->count();
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

                    return view('amentor.index')
                        ->with([
                            'users'=>$users,
                            'transaction'=>$transaction,
                            'join'=>$join,
                            'hasil'=>$hasil,
                            'join'=>$join,
                            'sukses'=>$sukses,
                            'pending'=>$pending,
                            'gagal'=>$gagal,
                            'bls'=>$bls,
                            'kon'=>$kon,
                            // 'not'=>$not,
                            'totalkomen'=>$totalkomen,
                            'totalreply'=>$totalreply
                            //'tion'=>$tion
                            //'total'=>$total
                        ]);
                }
            }
        }
    }

    public function index()
    {
        $users = User::with('ben')
            ->where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','SUCCESS')
            ->get();
        $transaction = TransactionDetail::with('product','transaction')
            ->get();
        foreach($transaction as $query)
        {
            if($query->product->mentor_id == Auth::user()->kode_mentor && $query->transaction->user_id == $query->user_id)
            {
                $mentor = $query->product;
                $tran = $query->transaction->user_id;
                $user = $query->user_id;
                $hasil = $query->transaction->where('transaction_status','SUCCESS')->where('mentor_id',Auth::user()->kode_mentor)->sum('transaction_total');
                $sukses = $query->transaction->where('transaction_status','SUCCESS')->where('mentor_id',Auth::user()->kode_mentor)->count();
                $pending = $query->transaction->where('transaction_status','PENDING')->where('mentor_id',Auth::user()->kode_mentor)->count();
                $gagal = $query->transaction->where('transaction_status','FAILED')->where('mentor_id',Auth::user()->kode_mentor)->count();
                $join = JoinDetail::with('product','join')
                    ->get();
                return view('amentor.coba')
                    ->with([
                        'users'=>$users,
                        'transaction'=>$transaction,
                        'join'=>$join,
                        'hasil'=>$hasil,
                        'join'=>$join,
                        'sukses'=>$sukses,
                        'pending'=>$pending,
                        'gagal'=>$gagal
                        //'total'=>$total
                    ]);
            }
        }

        //$join = JoinDetail::with('product','join')
        //    ->get();
        //return view('amentor.index')
        //    ->with([
        //        'users'=>$users,
        //        'transaction'=>$transaction,
        //        'join'=>$join,
        //        'itung'=>$itung,
        //    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$user = User::where('id',Auth::user()->id)
        //    ->findOrfail($id);
        $users = User::where('id',Auth::user()->id)
            ->get();
        $mentor = Mentor::with('user')
            ->where('user_id',Auth::user()->id)
            ->get();
        //request serti
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //$men = Mentor::find($mentor);
        return view('amentor.create')
            ->with([
                //'user'=>$user,
                'users'=>$users,
                'mentor'=>$mentor,
                'kon'=>$kon
                //'men'=>$men
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'=>'required',
            'file'=>'required',
            'bidang'=>'required',
            'deskripsi'=>'required',
            'github_profile'=>'required',
            'dribbble_profile'=>'required'
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/mentor','public'
        );

        Mentor::create($data);
        //Mentor::create([
        //    'user_id'=>$request->user_id,
        //    'file'=>$data['file'] = $request->file('file')->store(
        //        'assets/mentor','public'
        //    ),
        //    'bidang'=>$request->bidang,
        //    'deskripsi'=>$request->deskripsi,
        //    'github_profile'=>$request->github_profile,
        //    'dribbble_profile'=>$request->dribbble_profile
        //]);
        return redirect()->route('amentor.index')->with('success','Data Berhasil Ditambah');
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'user_id'=>'required',
            'file'=>'required|mimes:png,jpg,jpeg',
            'bidang'=>'required',
            'deskripsi'=>'required',
            'github_profile'=>'required',
            'dribbble_profile'=>'required'
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/mentor','public'
        );
        Mentor::create($data);
        return redirect()->route('amentor.index')->with('success','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',Auth::user()->id)
            ->findOrfail($id);
        $users = User::where('id',Auth::user()->id)
            ->get();
        $mentor = Mentor::with('user')
            ->get();
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //$men = Mentor::find($mentor);
        return view('amentor.create')
            ->with([
                'user'=>$user,
                'users'=>$users,
                'mentor'=>$mentor,
                'kon'=>$kon
                //'men'=>$men
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
        $user = User::where('id',Auth::user()->id)
            ->findOrfail($id);
        $users = User::where('id',Auth::user()->id)
            ->get();
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        return view('amentor.create')
            ->with([
                'user'=>$user,
                'users'=>$users,
                'kon'=>$kon
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
            'user_id'=>'required|exists:users,id|file|image',
            'file'=>'required|mimes:png,jpg,jpeg',
            'bidang'=>'required',
            'deskripsi'=>'required',
            'github_profile'=>'required',
            'dribbble_profile'=>'required'
        ]);
        $data['file'] = $request->file('file')->store(
            'assets/mentor','public'
        );
        Mentor::where('id',$id)
            ->update($data);
        return redirect()->route('amentor.edit')->with('success','Data Berhasil Diubah');
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
