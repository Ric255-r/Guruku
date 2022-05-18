<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Kelas;
use App\ContactUs;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{
    public function admin()
    {
        //status transaksi
        $pen = Transaction::where('transaction_status','PENDING')->count();
        //status contact
        $bls = ContactUs::where('status','PENDING')
            ->count();
        //request kelas
        $req = Kelas::where('status','REQUEST')
            ->count();
        //mentor
        $itung = User::where('roles','MENTOR')->where('kode_mentor',null)->count();
        $duit = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');
        $total = Transaction::all()->where('transaction_status','SUCCESS')->count();
        //$tran = Transaction::all();
        //$total = $tran->groupBy('transaction_status')->map->count();
        $item = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status','PENDING')->count(),
            'failed' => Transaction::where('transaction_status','FAILED')->count(),
            'success' => Transaction::where('transaction_status','SUCCESS')->count()
        ];
        return view('dashboard')->with([
            'duit'=> $duit,
            'total'=> $total,
            'item'=> $item,
            'pie'=> $pie,
            'itung'=>$itung,
            'pen'=>$pen,
            'bls'=>$bls,
            'req'=>$req
        ]);
    }

    public function users()
    {
        $trans = Transaction::all();
        return view('users',compact('trans'));
    }

    // public function show()
    // {
    //     $trans = Transaction::all();
    //     return view('users.notif',compact('trans'));
    // }
    // public function lihat($id)
    // {
    //     $lihat = Transaction::findOrfail($id);
    //     return view('users.lihat',compact('lihat'));
    // }
}
