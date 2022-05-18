<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Transaction;
use App\User;
use App\Kelas;
use App\ContactUs;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.bank.index')
            ->with([
                'bank'=>$bank,
                'itung'=>$itung,
                'pen'=>$pen,
                'bls'=>$bls,
                'req'=>$req
            ]);
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
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.bank.create')
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
        $data = $request->validate([
            'namabank'=>'required',
            'file'=>'required|file|mimes:png,jpg,svg,jpeg'
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/bank','public'
        );

        Bank::create($data);
        return redirect()->route('bank.index')->with('success','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.bank.edit')
            ->with([
                'bank'=>$bank,
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
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'namabank'=>'required',
            'file'=>'required|file|mimes:png,jpg,svg,jpeg'
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/bank','public'
        );

        Bank::where('id',$id)
            ->update($data);

        return redirect()->route('bank.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::destroy($id);
        return redirect()->route('bank.index')->with('success','Data Berhasil Dihapus');
    }
}
