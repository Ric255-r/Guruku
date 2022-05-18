<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Join;
use App\TransactionDetail;
use App\JoinDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('ben')
            ->where('id',Auth::user()->id)
            //->where('status','SUCCESS')
            ->get();
        $trans = Transaction::where('user_id', Auth::user()->id)
            ->get();
        $user = Join::where('user_id',Auth::user()->id)
            ->get();
        $detail = TransactionDetail::with('product','transaction')
            ->get();
        $detail2 = JoinDetail::with('product','join')
            ->get();

        if($detail->count() == 0 AND $detail2->count() == 0){
            $trans = Transaction::where('user_id', Auth::user()->id)
                ->get();
            return view('users.kosong.users2')
                ->with([
                    'trans'=>$trans,
                    'users'=>$users,
                    //'user'=>$user,
                ]);
            //return 'ini bayar atau gratis  ga ada data';
            //ini halaman awal 0
            //bikin dia jadi 0 semua, karna sama2 ga ada data
        }elseif($detail->count() > 0 AND $detail2->count() > 0){
            foreach($detail as $query => $details){
                if($details->transaction->user_id == Auth::user()->id){
                    $total1 = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                    $success = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                    $pending = $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count();
                    $failed = $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count();
                    $pie = [
                        'pending' => $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count(),
                        'failed' => $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count(),
                        'success' => $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count()
                    ];
                }else{
                    $total1 = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                    $success = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                    $pending = $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count();
                    $failed = $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count();
                    $pie = [
                        'pending' => $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count(),
                        'failed' => $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count(),
                        'success' => $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count()
                    ];
                }

                foreach($detail2 as $query)
                {
                    if($query->join->user_id == Auth::user()->id)
                    {
                        $total2 = $query->join->where('user_id',Auth::user()->id)->count();
                    }else{
                        $total2 = $query->join->where('user_id',Auth::user()->id)->count();
                    }
                }

                return view('users')
                    ->with([
                        'trans'=>$trans,
                        'user'=>$user,
                        'total1'=>$total1,
                        'total2'=>$total2,
                        'success'=>$success,
                        'pending'=>$pending,
                        'failed'=>$failed,
                        'pie'=>$pie,
                        'users'=>$users
                    ]);
            }
            //return 'ini bayar dan gratis nya sama2 ada';
            //klo ini 2 2 nya ada data, pake foreach yg awal
        }elseif($detail->count() > 0){
            foreach($detail as $query => $details){
                if($details->transaction->user_id == Auth::user()->id){
                    $total1 = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                    $success = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                    $pending = $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count();
                    $failed = $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count();
                    $pie = [
                        'pending' => $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count(),
                        'failed' => $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count(),
                        'success' => $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count()
                    ];
                }

                //foreach($detail2 as $query)
                //{
                //    if($query->join->user_id == Auth::user()->id)
                //    {
                //        $total2 = $query->join->where('user_id',Auth::user()->id)->count();
                //    }
                //}

                return view('users.kosong.bayar')
                    ->with([
                        'trans'=>$trans,
                        'user'=>$user,
                        'total1'=>$total1,
                        //'total2'=>$total2,
                        'success'=>$success,
                        'pending'=>$pending,
                        'failed'=>$failed,
                        'pie'=>$pie,
                        'users'=>$users
                    ]);
            }
            //return 'cmn bayar yg ada data';
        }elseif($detail2->count() > 0){
            //foreach($detail2 as $query => $details){
                //if($details->join->user_id == Auth::user()->id){
                //    $total1 = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                //    $success = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
                //    $pending = $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count();
                //    $failed = $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count();
                //    $pie = [
                //        'pending' => $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count(),
                //        'failed' => $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count(),
                //        'success' => $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count()
                //    ];
                //}

                foreach($detail2 as $query)
                {
                    if($query->join->user_id == Auth::user()->id)
                    {
                        $total2 = $query->join->where('user_id',Auth::user()->id)->count();
                    }
                    else
                    {
                        $total2 = '0';
                    }
                }

                return view('users.kosong.gratis')
                    ->with([
                        'trans'=>$trans,
                        'user'=>$user,
                        //'total1'=>$total1,
                        'total2'=>$total2,
                        'users'=>$users
                        //'success'=>$success,
                        //'pending'=>$pending,
                        //'failed'=>$failed,
                        //'pie'=>$pie
                    ]);
            //}
            //return 'cuman gratis yg ada data';
        }else{
            return 'gatau';
        }

        //if($detail2->count() == 0){
        //    return 'ini gratis dan ga ada data';
        //}else{

        //}


        //foreach($detail as $query => $details)
        //{
        //    if($detail->count() > 0 OR $detail2->count() > 0)
        //    {
        //        if($details->transaction->user_id == Auth::user()->id)
        //        {
        //            $total1 = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
        //            $success = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
        //            $pending = $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count();
        //            $failed = $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count();
        //            $pie = [
        //                'pending' => $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count(),
        //                'failed' => $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count(),
        //                'success' => $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count()
        //            ];
        //        }

        //        foreach($detail2 as $query)
        //        {
        //            if($query->join->user_id == Auth::user()->id)
        //            {
        //                $total2 = $query->join->where('user_id',Auth::user()->id)->count();
        //            }
        //        }

        //        return view('users')
        //        ->with([
        //            'trans'=>$trans,
        //            'user'=>$user,
        //            'total1'=>$total1,
        //            //'total2'=>$total2,
        //            'success'=>$success,
        //            'pending'=>$pending,
        //            'failed'=>$failed,
        //            'pie'=>$pie
        //        ]);
        //    }
        //}






        //foreach($detail as $query => $details)
        //{
        //    if($details->transaction->user_id == Auth::user()->id)
        //    {
        //        $total1 = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
        //        $success = $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count();
        //        $pending = $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count();
        //        $failed = $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count();
        //        $pie = [
        //            'pending' => $details->transaction->where('transaction_status','PENDING')->where('user_id',Auth::user()->id)->count(),
        //            'failed' => $details->transaction->where('transaction_status','FAILED')->where('user_id',Auth::user()->id)->count(),
        //            'success' => $details->transaction->where('transaction_status','SUCCESS')->where('user_id',Auth::user()->id)->count()
        //        ];
        //    }

        //    foreach($detail2 as $query)
        //    {
        //        if($query->join->user_id == Auth::user()->id)
        //        {
        //            $total2 = $query->join->where('user_id',Auth::user()->id)->count();
        //        }
        //    }

        //    return view('users')
        //    ->with([
        //        'trans'=>$trans,
        //        'user'=>$user,
        //        'total1'=>$total1,
        //        //'total2'=>$total2,
        //        'success'=>$success,
        //        'pending'=>$pending,
        //        'failed'=>$failed,
        //        'pie'=>$pie
        //    ]);
        //}
    }

    public function tampil(Request $request,$id)
    {
        $orang = User::findOrfail($id);
        $trans = Transaction::with('user')
            ->where('user_id',$id)
            ->get();
        return view('users.notif')->with([
            'orang'=> $orang,
            'trans'=> $trans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $trans = Transaction::all();
        // return view('users.notif',compact('trans'));
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
        $item = Transaction::findOrfail($id);
        return view('users.edit',compact('item'));
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
