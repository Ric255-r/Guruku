<?php

namespace App\Http\Controllers;

// use App\Checkout;
use App\Kelas;
use App\Transaction;
use App\TransactionDetail;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $check = Kelas::findOrfail($id)->where('jenis','bayar');
        // return view('checkout.create',compact('check'));
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
    public function store(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['tfid'] = 'ASD' . mt_rand(10000,99999) . mt_rand(10000,99999);
        $data['bukti'] = $request->file('bukti')->store(
            'assets/bukti','public'
        );
        $transaction = Transaction::create($data);

        foreach((array)$request->transaction_details as $product)
        {
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'products_id' => $product,
                'user_id' => $transaction->user_id,
                // 'transaction_status' => $transaction->transaction_status
            ]);
            Kelas::find($product)->increment('murid');
            // Kelas::with('murid')
            //     ->find($product)
            //     ->where('transaction_status','SUCCESS')
            //     ->increment('murid');
        }
        $transaction->details()->saveMany($details);

        // if($request->transaction_status == 'SUCCESS')
        // {
        //     $many = new Kelas([
        //         'transaction_status' => $transaction->transaction_status
        //     ]);
        //     kelas::find($many)->increment();
        // }
        // $transaction->siswa()->increment($many);
        // if($request->transaction_status == 'SUCCESS')
        // {
        //     $murid = new Kelas::find()->increment('murid');
        //     Kelas::find($product)->increment('murid');
        // }

        return redirect()->route('checkout.pending');
    }

    public function pending()
    {
        return view('checkout.pending');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check = Kelas::with('mentor')
            ->where('slug',$id)
            ->orWhere('id',$id)
            ->first();
        $trans = TransactionDetail::with('product','transaction')
            ->where('user_id',Auth::user()->id)
            ->where('products_id',$check->id)
            ->get();
        //$check = Kelas::with('mentor')
        //    ->findOrfail($id);

        // $check2 = DB::table('kelasbaru')->where('jenis','paket')->find($id);
        // $kode = '123';
        // $total = Kelas::find($id)->where('harga')->increment($kode);
        return view('checkout.create')->with([
            'check' => $check,
            'trans'=>$trans
            // 'check2' => $check2
            // 'kode' => $kode,
            // 'total' => $total
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
