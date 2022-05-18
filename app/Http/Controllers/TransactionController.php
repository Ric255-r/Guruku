<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Transaction;
use App\TransactionDetail;
use App\User;
use App\ContactUs;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Transaction::all();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.transactions.index',compact('item','itung','pen','bls','req'));
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
        $item = Transaction::with('details.product')->findOrFail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.transactions.show',compact('item','itung','pen','bls','req'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrfail($id);
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.transactions.edit',compact('item','itung','pen','bls','req'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'bukti' => 'required'
        ]);
        $data = $request->all();
        $item = Transaction::findOrfail($id);
        $item->update($data);
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::destroy($id);
        TransactionDetail::with('transaction')
            ->where('transaction_id', $id)
            ->delete();
        return redirect()->route('transactions.index');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,FAILED,SUCCESS'
        ]);
        $item = Transaction::findOrfail($id);

        $item->transaction_status = $request->status;
        $item->save();

        return redirect()->route('transactions.index')->with('success','Status Berhasil Diubah');
    }
}
