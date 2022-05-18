<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\User;
use App\Kelas;
use App\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index()
    {
        //contact
        $contact = ContactUs::all();
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //transaksi dan mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        return view('admin.contact.index')
            ->with([
                'contact'=>$contact,
                'bls'=>$bls,
                'itung'=>$itung,
                'pen'=>$pen,
                'req'=>$req
            ]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS'
        ]);
        $item = ContactUs::findOrfail($id);
        $item->status = $request->status;
        $item->save();
        return redirect()->route('admin.contact.index')->with('success','Status Berhasil Diubah');
    }
}
