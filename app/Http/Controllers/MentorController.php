<?php

namespace App\Http\Controllers;

use App\Mentor;
use App\User;
use App\Kelas;
use App\Blog;
use App\Transaction;
use App\ContactUs;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = User::with('ben')
            ->where('roles','MENTOR')
            ->get();
        //$mentor->currentPage();
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        $user = User::with('ben')
            ->where('roles','USERS')
            ->get();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.mentor.index')
            ->with([
                'mentor'=>$mentor,
                'user'=>$user,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    public function cari(Request $request)
    {
        //menangkap data pencarian
        $carimentor = $request->carimentor;

        //mengambil data dari database
        $user = User::where('roles','USERS')
            ->get(10);
        $mentor = User::where('name','like',"%".$carimentor."%")
            ->where('roles','MENTOR')
            ->paginate(10);
        return view('admin.mentor.index')
            ->with([
                'mentor'=>$mentor,
                'user'=>$user
            ]);

    }

    public function cariuser(Request $request)
    {
        $cariuser = $request->cariuser;
        $mentor = User::where('roles','MENTOR')
            ->get();
        $user = User::where('name','like',"%".$cariuser."%")
            ->where('roles','USERS')
            ->get();
        return view('admin.mentor.index')
            ->with([
                'user'=>$user,
                'mentor'=>$mentor
            ]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,FAILED,SUCCESS'
        ]);
        $item = User::findOrfail($id);

        $item->status = $request->status;
        $item->save();

        return redirect()->route('mentor.index')->with('success','Status Berhasil Diubah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.mentor.create')
            ->with([
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
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
        //$data = $request->validate([
        //    'user_id'=>'required|exists:users,id',
        //    'file'=>'required|mimes:png,jpg,jpeg',
        //    'bidang'=>'required',
        //    'deskripsi'=>'required',
        //]);
        //$data['file'] = $request->file('file')->store(
        //    'assets/mentor','public'
        //);
        //Mentor::create($data);
        //return redirect()->route('mentor.index')->with('success','Data Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentor = User::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.mentor.show')
            ->with([
                'mentor'=>$mentor,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentor = User::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.mentor.edit')
            ->with([
                'mentor'=>$mentor,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = $this->validate($request,[
            'kode_mentor'=>'required'
        ]);

        User::where('id',$id)
            ->update($data);

        return redirect()->route('mentor.index')->with('success','Kode Mentor Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mentor::destroy($id);
        return redirect()->route('mentor.index')->with('success','Data Berhasil Dihapus');
    }
}
