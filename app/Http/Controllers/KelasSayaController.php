<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use App\Kelas;
use App\Video;
use App\Sertifikat;
use App\JoinDetail;
use App\ModelNilai;
use App\ModelSoal;
use App\Modul;
use App\VideoDetails;
use App\User;
use App\ModelRatingKelas;
use App\ModelKuis;
use App\StatusSertifikat;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class KelasSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //buat /slug0
    public function belajar(Request $request, $id, $slug = null)
    {

        $videodetails = VideoDetails::with('kelas','video')
            ->where('products_slug',$id)
            ->orWhere('id',$id)
            ->first();

        $kelas = Kelas::where('slug', $videodetails->products_slug)->first();
        $kuisakhir = ModelKuis::where('kelas_id', $kelas->id)
                                ->where('jenis', 'video_akhir')
                                ->get();
        $nilainya = ModelNilai::where('id_user', Auth::user()->id)->get();

        //$countvideodetails = VideoDetails::where('products_slug', $id)
        //    ->orWhere('id',$id)
        //    ->get();

        $jenis = $videodetails->kelas->jenis;
        //echo ($jenis);
        //dd($jenis);
        $data = $videodetails->kelas->id;

        $transaksi = TransactionDetail::with('transaction','product')
            ->where('user_id',Auth::user()->id)
            ->where('products_id',$data)
            ->get();

        //$modul = Modul::where('videodetails_id',$id)
        //    ->where('products_slug',$slug)
        //    ->get();

        // $unlock = VideoDetails::where('products_slug', $slug)->get();
        // $unlockcount = VideoDetails::where('products_slug',$videodetails->products_slug)->count();
        // $countdone = VideoDetails::where('products_slug',$videodetails->products_slug)
        //                     ->where('status', 'DONE')
        //                     ->count();
        $unlock = VideoDetails::where('products_slug', $videodetails->products_slug)->get();
        $cekserti = StatusSertifikat::where('user_id', Auth::user()->id)->get();
        $serti = StatusSertifikat::where('user_id',Auth::user()->id)
                                ->where('status', 'DONE')
                                ->get();

        foreach($transaksi as $trans)
        {
            if($jenis == 'premium')
            {
                if($trans->transaction->transaction_status == 'SUCCESS')
                {
                    //echo URL::to('telegram.com');
                    //echo URL::current();
                    //echo url()->previous();

                    //$modul = Modul::where('videodetails_id',$id)
                    //    ->where('products_slug',$slug)
                    //    ->get();
                    $modul = Modul::where('products_slug',$id)
                        ->get();

                    $data = $videodetails->kelas->id;
                    $transaksi = TransactionDetail::with('transaction','product')
                        ->where('user_id',Auth::user()->id)
                        ->where('products_id',$data)
                        ->first();
                    $status = $transaksi->transaction;
                    $trans = TransactionDetail::with('product', 'transaction')
                        ->where('user_id', Auth::user()->id)
                        ->where('products_id', $data)
                        ->get();
                    $video = Video::with('bayar', 'details')
                        ->where('products_slug', $id)
                        ->get();
                    $anakvideo = VideoDetails::with('video')
                        ->where('products_slug', $id)
                        ->orderBy('number','ASC')
                        ->get();
                    //$serti = VideoDetails::where($videodetails->video->id,$id)
                    //    ->get();
                    return view('users.course2.index')
                    ->with([
                        'modul'=>$modul,
                        //'serti'=>$serti,
                        'videodetails'=>$videodetails,
                        'video'=>$video,
                        'anakvideo'=>$anakvideo,
                        'trans'=>$trans,
                        'jenis'=>$jenis,
                        // 'unlockcount'=>$unlockcount,
                        // 'countdone'=>$countdone,
                        'unlock'=>$unlock,
                        'cekserti'=>$cekserti,
                        'serti'=>$serti,
                        'kuisakhir'=>$kuisakhir,
                        'nilainya'=>$nilainya,
                        //'join'=>$join,
                        'status'=>$status,
                        //'countvideodetails'=>$countvideodetails
                    ]);
                }elseif($trans->transaction->transaction_status == 'SUCCESS'){
                    return 'access denied';
                }else{
                    return 'access denied';
                }
            }
            //elseif($jenis == 'gratis')
            //{
            //    $data = $videodetails->kelas->id;

            //    $join = JoinDetail::with('product', 'join')
            //        ->where('user_id', Auth::user()->id)
            //        ->where('products_id', $data)
            //        ->get();

            //    $video = Video::with('bayar', 'details')
            //        ->where('products_slug', $id)
            //        ->get();
            //    $anakvideo = VideoDetails::with('video')
            //        ->where('products_slug', $id)
            //        ->get();
            //    return view('users.course2.index')
            //    ->with([
            //        'videodetails'=>$videodetails,
            //        'video'=>$video,
            //        'anakvideo'=>$anakvideo,
            //        'join'=>$join,
            //    ]);
            //}
            //else{

            //}
        }
        if($jenis == 'gratis')
        {
            $data = $videodetails->kelas->id;
            $data2 = $videodetails->id;
            $num = $videodetails->number;

            $modul = Modul::where('products_slug',$id)
                ->get();
            //$modul = Modul::all();

            $join = JoinDetail::with('product', 'join')
                ->where('user_id', Auth::user()->id)
                ->where('products_id', $data)
                ->get();

            $video = Video::with('bayar', 'details')
                ->where('products_slug', $id)
                ->get();
            $anakvideo = VideoDetails::with('video','kelas')
                ->where('products_slug', $id)
                ->orderBy('number','ASC')
                ->get();
            return view('users.course2.index')
            ->with([
                'modul'=>$modul,
                'videodetails'=>$videodetails,
                'video'=>$video,
                'anakvideo'=>$anakvideo,
                'join'=>$join,
                // 'unlockcount'=>$unlockcount,
                // 'countdone'=>$countdone,
                'unlock'=>$unlock,
                'cekserti'=>$cekserti,
                'serti'=>$serti,
                'kuisakhir'=>$kuisakhir,
                'nilainya'=>$nilainya,
                'jenis'=>$jenis
            ]);
        }
        else{

        }

        //if($jenis == 'premium')
        //{
        //    $data = $videodetails->kelas->id;
        //    $transaksi = TransactionDetail::with('transaction','product')
        //        ->where('user_id',Auth::user()->id)
        //        ->where('products_id',$data)
        //        ->first();
        //    $status = $transaksi->transaction;
        //    $trans = TransactionDetail::with('product', 'transaction')
        //        ->where('user_id', Auth::user()->id)
        //        ->where('products_id', $data)
        //        ->get();
        //    $video = Video::with('bayar', 'details')
        //        ->where('products_slug', $id)
        //        ->get();
        //    $anakvideo = VideoDetails::with('video')
        //        ->where('products_slug', $id)
        //        ->get();
        //    return view('users.course2.index')
        //    ->with([
        //        'videodetails'=>$videodetails,
        //        'video'=>$video,
        //        'anakvideo'=>$anakvideo,
        //        'trans'=>$trans,
        //        //'join'=>$join,
        //        'status'=>$status
        //    ]);
        //}
        //elseif($jenis == 'gratis')
        //{
        //    $data = $videodetails->kelas->id;

        //    $join = JoinDetail::with('product', 'join')
        //        ->where('user_id', Auth::user()->id)
        //        ->where('products_id', $data)
        //        ->get();

        //    $video = Video::with('bayar', 'details')
        //        ->where('products_slug', $id)
        //        ->get();
        //    $anakvideo = VideoDetails::with('video')
        //        ->where('products_slug', $id)
        //        ->get();
        //    return view('users.course2.index')
        //    ->with([
        //        'videodetails'=>$videodetails,
        //        'video'=>$video,
        //        'anakvideo'=>$anakvideo,
        //        'join'=>$join,
        //    ]);
        //}
        //else{

        //}

    }

    //buat slug/id
    public function belajarcourse($id, $slug = null)
    {
        $videodetails = VideoDetails::with('video','kelas')
            ->where('products_slug',$id)
            ->orWhere('id',$id)
            ->orWhere('number',$id)
            ->first();
        
        $kelas = Kelas::where('slug', $videodetails->products_slug)->first();
        $kuisakhir = ModelKuis::where('kelas_id', $kelas->id)
                                ->where('jenis', 'video_akhir')
                                ->where('status', 'active')
                                ->get();
        $kuisbiasa = ModelKuis::where('kelas_id', $kelas->id)
                                ->where('jenis', 'video')
                                ->where('status', 'active')
                                ->get();
        $nilainya = ModelNilai::where('id_user', Auth::user()->id)->get();

        $modul = Modul::where('videodetails_id',$id)
            ->where('products_slug',$slug)
            ->get();

        $cek = 'hai';
        //$videodetails = VideoDetails::where('products_slug',$id)
        //    ->orWhere('id',$id)
        //    ->first();
        //$product = VideoDetails::all();
        $video = Video::with('bayar','details')
            ->where('products_slug',$slug)
            ->get(); //koding awal pake with('bayar')
        $anakvideo = VideoDetails::with('video','kelas')
            ->where('products_slug',$slug)
            ->orderBy('number','ASC')
            ->get();
        $maxValue = VideoDetails::with('video','kelas')
            ->where('products_slug',$slug)
            ->orderBy('number','DESC')
            ->max('number');
        $unlock = VideoDetails::where('products_slug', $slug)->get();
        $serti = StatusSertifikat::where('user_id',Auth::user()->id)
                                ->where('status', 'DONE')
                                ->get();
                                
        $cekserti = StatusSertifikat::where('user_id',Auth::user()->id)->get();
        $cekfield = StatusSertifikat::where('videodetails_id', $videodetails->id)
                                ->where('user_id',Auth::user()->id)
                                ->first();

        $cekrating = ModelRatingKelas::where('id_kelas', $kelas->id)
                                ->where('id_user', Auth::user()->id)
                                ->exists();

        // return json_encode($cekfield);
        // $unlockcount = VideoDetails::where('products_slug',$slug)->count();
        // $countdone = VideoDetails::where('products_slug',$slug)
        //                     ->where('status', 'DONE')
        //                     ->count();


        //if ($slug != Str::slug($videodetails->slug))
        //    return Redirect::route('play.show',array('products_slug'=>Str::slug($videodetails->slug), 'number'=>$videodetails->number),301);

        //ini awalnya
        if ($slug != Str::slug($videodetails->products_id))
            return Redirect::route('play.show',array('products_slug'=>Str::slug($videodetails->products_id), 'id'=>$videodetails->id),301);

            //return Redirect::route('play.show',array('id'=>$videodetails->id, 'products_slug'=>Str::slug($videodetails->products_id)),301);

        //ini yang tgl 16nov
        //$details = ModelSoal::where('details_section',$videodetails->nama)
        //    ->get();
        //$nilai = ModelNilai::where('details_section',$videodetails->nama)
        //    ->where('id_guru',$videodetails->kelas->mentor_id)
        //    ->get();

        return view('users.course2.show')
            ->with([
                'modul'=>$modul,
                'videodetails'=>$videodetails,
                'anakvideo'=>$anakvideo,
                'video'=>$video,
                'maxValue'=>$maxValue,
                // 'unlockcount'=>$unlockcount,
                // 'countdone'=>$countdone,
                'unlock'=>$unlock,
                'serti'=>$serti,
                'cekserti'=>$cekserti,
                'cekfield'=>$cekfield,
                'cekrating'=>$cekrating,
                'kuisbiasa'=>$kuisbiasa,
                'kuisakhir'=>$kuisakhir,
                'nilainya'=>$nilainya
                //'details'=>$details,
                //'nilai'=>$nilai
                //'product'=>$product
            ]);
    }

    public function resetCourse(Request $request, $slug)
    {
        $user = Auth::user()->id;
        $q = DB::statement("UPDATE status_serti SET status = 'PENDING' where products_slug = '$slug' AND user_id = '$user'");
        if($q){
            return redirect()->back();
        }
    }

    public function selesaicourse(Request $request, $id)
    {
        $val = VideoDetails::where('id', $id)->first();
        $test = StatusSertifikat::where('videodetails_id', $val->id)
                                ->where('user_id',Auth::user()->id)
                                ->exists();
        if(!$test){
            $lala = StatusSertifikat::create([
                'user_id'=>Auth::user()->id,
                'videodetails_id'=>$val->id,
                'status'=>'DONE',
                'products_slug'=>$val->products_slug
            ]);
            if($lala){
                return redirect()->back();
            }
        }else{
            $lala = StatusSertifikat::where('videodetails_id',$val->id)
                                    ->where('user_id',Auth::user()->id)
                                    ->update([
                                        'status'=>'DONE'
                                    ]);
            if($lala){
                return redirect()->back();
            }
        }
        // $v = $val->status;
        // if($v == 'PENDING' OR $v == 'ALERT'){
        //     $data = [
        //         'status'=>'DONE'
        //     ];
        //     $query = VideoDetails::where('id', $id)->update($data);
        //     if($query){
        //         return redirect()->back();
        //     }
        // }
        // else if($v == 'DONE'){
        //     $data = [
        //         'status'=>'RETRY'
        //     ];
        //     $query = VideoDetails::where('id', $id)->update($data);
        //     if($query){
        //         return redirect()->back();
        //     }
        // }
    }

    public function alert(Request $request, $id)
    {
        $viddetails = VideoDetails::where('id', $id)->first();
        $val = StatusSertifikat::where('videodetails_id', $id)
                                ->where('user_id',Auth::user()->id)
                                ->first();
        if(!isset($val)){
            $lala = StatusSertifikat::create([
                'user_id'=>Auth::user()->id,
                'videodetails_id'=>$id,
                'status'=>'PENDING',
                'alert'=>true,
                'products_slug'=>$viddetails->products_slug
            ]);
            if($lala){
                return redirect()->back();
            }
        }else{
            if($val->status == 'PENDING' || $val->status == 'DONE'){
                if($val->alert == false){
                    $lala = StatusSertifikat::where('videodetails_id', $id)
                                            ->where('user_id',Auth::user()->id)
                                            ->update([
                                                'alert'=>true
                                            ]);
                    if($lala){
                        return redirect()->back();
                    }
                }else if($val->alert == true){
                    $lala = StatusSertifikat::where('videodetails_id', $id)
                                            ->where('user_id',Auth::user()->id)
                                            ->update([
                                                'alert'=>false
                                            ]);
                    if($lala){
                        return redirect()->back();
                    }
                }
            }
        }
        // if($val->status == 'DONE' || $val->status == 'PENDING'){
        //     $data = [
        //         'status'=>'ALERT'
        //     ];
        //     StatusSertifikat::where('videodetails_id',$id)
        //                     ->where('user_id', Auth::user()->id)
        //                     ->update($data);
        //     return redirect()->back();
        // }else if($val->status == 'ALERT'){
        //     $data = [
        //         'status'=>'PENDING'
        //     ];
        //     StatusSertifikat::where('videodetails_id',$id)
        //                     ->where('user_id', Auth::user()->id)
        //                     ->update($data);
        //     return redirect()->back();
        // }
    }

    public function index()
    {
        // $kelas = TransactionDetail::all();
        // $trans = DB::table('transaction')->where('user_id',Auth::user()->id)->get();
        $kelas = TransactionDetail::with('product','transaction')
            ->where('user_id',Auth::user()->id)
            ->get();
        $gratis = JoinDetail::with('join','product')
            ->where('user_id',Auth::user()->id)
            ->get();
        //$nama = Video::with('vid')
        //    ->find($nama_video);
        //$kelas = Kelas::findOrfail($id);
        return view('/users/kelassaya')->with([
            // 'trans'=> $trans,
            'kelas'=> $kelas,
            'gratis'=>$gratis,
            //'nama'=>$nama,
            //'kelas'=>$kelas
        ]);
    }

    public function sertifikat($id, $slug=null)
    {
        $videodetails = VideoDetails::with('video','kelas')
            ->where('products_slug',$id)
            ->orWhere('id',$id)
            //->orWhere('number',$id)
            ->first();
        $sertifikat = Sertifikat::where('user_id',Auth::user()->id)
            ->where('kelas',$videodetails->products_id)
            ->get();
        return view('users.course2.sertifikat')
            ->with([
                'videodetails'=>$videodetails,
                'sertifikat'=>$sertifikat
            ]);
    }

    public function historykuis(){
        $user = Auth::user()->id;
        $nilai = DB::select("SELECT n.id_user, n.id_kuis, n.nilai_awal, n.nilai_akhir, n.waktukerja_awal, n.waktukerja_akhir, k.nama_kuis, k.kategori, k.topic, k.tingkatan, k.slug, u.name AS nama_mentor FROM tbnilai n JOIN tbkuis k ON (n.id_kuis = k.id) JOIN users u ON (k.mentor_id = u.kode_mentor) WHERE n.id_user = '$user'");
        return view('users.historynilai.index', ['nilai'=>$nilai]);
    }

    public function ratingcourse(Request $request, $slug){
        $kelas = Kelas::where('slug', $slug)->first();
        $cek = ModelRatingKelas::where('id_kelas', $kelas->id)
                                ->where('id_user', Auth::user()->id)
                                ->exists();
        if(!$cek){
            $buat = Validator::make($request->all(), [
                'rating'=>'required',
                'pesan'=>'required'
            ]);
            if($buat->fails()){
                // echo "<script>alert('Rating Dan Pesan Masih Kosong'); window.location=document.referrer;</script>";
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script type="text/javascript">
                        setTimeout(function(){
                            swal({
                                title: "Failed!",
                                text: "Rating dan Pesan Masih Kosong",
                                icon: "error",
                            }).then(function(){
                                window.location=document.referrer
                            });
                        }, 100);
                    </script>';
            }else{
                $create = ModelRatingKelas::create([
                    'id_kelas'=>$kelas->id,
                    'id_user'=>Auth::user()->id,
                    'rating'=>$request->rating,
                    'pesan'=>$request->pesan
                ]);
            }

            if($create){
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script type="text/javascript">
                        setTimeout(function(){
                            swal({
                                title: "Sukses!",
                                text: "Terimakasih Atas Rating Anda!",
                                icon: "success",
                            }).then(function(){
                                window.location=document.referrer
                            });
                        }, 100);
                    </script>';

                // echo "<script>alert('TerimaKasih Atas Rating Anda'); window.location=document.referrer;</script>";
            }
        }
    }

    public function les($id)
    {
        $videodetails = VideoDetails::where('products_slug',$id)
            ->orWhere('id',$id)
            ->first();
        $video = Video::with('bayar','details')
            ->where('products_slug',$id)
            ->get(); //koding awal pake with('bayar')
        $anakvideo = VideoDetails::with('video','kelas')
            ->where('products_slug',$id)
            ->get();
        return view('users.course.index')
            ->with([
                'videodetails'=>$videodetails,
                'video'=>$video,
                'anakvideo'=>$anakvideo
            ]);
    }

    public function lesplay($id, $slug = null)
    {
        //$videodetails = VideoDetails::where('video_id',$id)
            //->orWhere('id',$id)
            //->first();
        $videodetails = VideoDetails::findOrfail($id);

        $video = Video::with('bayar','details')
            //->where('products_slug',$id)
            ->get(); //koding awal pake with('bayar')
        $anakvideo = VideoDetails::with('video','kelas')
            //->where('products_slug',$id)
            ->get();

        $kelas = Kelas::all();

        //if ($slug != Str::slug($videodetails->products_id))
        //    return Redirect::route('les.show',array('id'=>$videodetails->id, 'products_slug'=>Str::slug($videodetails->products_id)),301);

        return view('users.course.show')
            ->with([
                'kelas'=>$kelas,
                'videodetails'=>$videodetails,
                'video'=>$video,
                'anakvideo'=>$anakvideo,
                //'details'=>$details
            ]);
    }


    public function course($id)
    {
        $videodetails = VideoDetails::where('products_slug',$id)
            ->orWhere('id',$id)
            ->first();
        $video = Video::with('bayar','details')
            ->where('products_slug',$id)
            ->get(); //koding awal pake with('bayar')
        $anakvideo = VideoDetails::with('video','kelas')
            ->where('products_slug',$id)
            ->get();
        return view('users.course.index')
            ->with([
                'videodetails'=>$videodetails,
                'video'=>$video,
                'anakvideo'=>$anakvideo
            ]);
    }


    public function ambil($id)
    {
        $videodetails = VideoDetails::where('number',$id)
            ->first();
        return view('users.course.show')
            ->with([
                'videodetails'=>$videodetails
            ]);
    }

    //public function courseplay($id ,$slug = null)
    //{
    //    //awalnya
    //    $videodetails = VideoDetails::findOrfail($id);
    //    //$videodetails = VideoDetails::where('video_id',$id)
    //    //    ->orWhere('id',$id)
    //    //    ->first();
    //    //$videodetails = VideoDetails::where('number',$id)
    //    //    //->orWhere('product_slug',$id)
    //    //    ->orWhere('id',$id)
    //    //    ->first();
    //    $video = Video::with('bayar','details')
    //        //->where('products_slug',$id)
    //        ->get(); //koding awal pake with('bayar')
    //    $anakvideo = VideoDetails::with('video')
    //        //->where('products_slug',$id)
    //        ->get();

    //    $kelas = Kelas::all();

    //    //if ($slug != Str::slug($videodetails->products_id))
    //    //    return Redirect::route('course.show',array('id'=>$videodetails->id, 'products_slug'=>Str::slug($videodetails->products_id)),301);
    //    return view('users.course.show')
    //        ->with([
    //            'kelas'=>$kelas,
    //            'videodetails'=>$videodetails,
    //            'video'=>$video,
    //            'anakvideo'=>$anakvideo,
    //            //'details'=>$details
    //        ]);
    //}



    public function playing($id)
    {
        //$kelas = Kelas::where('slug',$id)
        //    ->first();
        //$videodetails = VideoDetails::where('id', $id)
        //    ->orWhere('products_slug',$id)
        //    ->first();  //ini yang kepake
        //$videodetails = VideoDetails::where('id',$id)
        //    ->orWhere('products_slug',$id)
        //    ->first();
        //$videodetails = VideoDetails::findOrfail($id);
        $videodetails = VideoDetails::where('products_slug',$id)
            ->orWhere('id',$id)
            ->first();
        //if ($slug != Str::slug($videodetails->products_id))
        //    return Redirect::route('bljr.show', array('id' => $videodetails->id, 'products_slug' => Str::slug($videodetails->products_id)), 301);
        //if(!$videodetails){
        //    $videodetails = VideoDetails::where('products_slug',$id)->firstOrFail();
        //}
        //if ($slug != Str::slug($kelas->kelas))
        //    return Redirect::route('kelas.show', array('id' => $kelas->id, 'slug' => Str::slug($kelas->kelas)), 301);

        $kedua = Video::with('vid')
            ->where('products_id',$id)
            ->get();
        $namavideo = Video::with('vid')
            ->where('products_slug',$id)
            ->get();
        $video = Video::with('bayar')
            ->where('products_slug',$id)
            ->orWhere('id',$id) //id
            ->get(); //koding awal pake with('bayar')
        $anakvideo = VideoDetails::with('video','kelas')
            ->where('products_slug',$id)
            ->orWhere('id',$id)
            ->get();
        //$kedua = Video::with('vid')
        //    ->where('products_id',$id)
        //    ->orderBy('products_id', 'ASC')
        //    ->limit(1)
        //    ->get();
        return view('/users/playingvideo')
            ->with([
                'videodetails'=> $videodetails,
                'kedua'=> $kedua,
                'namavideo'=>$namavideo,
                'video'=>$video,
                'anakvideo'=>$anakvideo
                //'videoId'=>$videoId
            ]);

        // $kelas = Kelas::findOrfail($id);
        // $kedua = VIdeo::with('vid')
        //         ->where('id','products_id')
        //         ->get();
        // return view('/users/playingvideo')
        //         ->with([
        //             'kelas' =>$kelas,
        //             'kedua'=> $kedua
        //         ]);

            // $video = Kelas::findOrfail($id);
            // $items = Video::with('bayar')
            //     ->where('products_id',$id)
            //     ->get();
            // return view('admin.video.gallery')->with([
            //     'video' => $video,
            //     'items' => $items
            // ]);
    }

    //$gratis = adminkelas::findOrfail($id);
    //    $items = VideoGratis::with('gratis')
    //        ->where('products_id',$id)
    //        ->get();
    //    return view('admin.video-gratis.gallery')->with([
    //        'gratis' => $gratis,
    //        'items' => $items
    //    ]);
    public function bljr(Request $request, $id, $slug = null)
    {
        $videodetails = VideoDetails::where('id', $id)
            ->orWhere('products_slug',$id)
            ->firstOrFail();
        //$videodetails = VideoDetails::where('id',$id)
        //    ->orWhere('products_slug',$id)
        //    ->first();
        //$kelas =
        //if(!$videodetails){
        //    $videodetails = VideoDetails::where('products_slug',$id)->firstOrFail();
        //}

        if ($slug != Str::slug($videodetails->products_id))
            return Redirect::route('bljr.show', array('id' => $videodetails->id, 'products_slug' => Str::slug($videodetails->products_id)), 301);
        //if(!$videodetails){
        //    $videodetails = VideoDetails::where('products_slug','=',$id)->firstOrFail();
        //}
        //$details = VideoDetails::findOrfail($id);
        //$videodetails = VideoDetails::findOrfail($id);
        //if ($slug != Str::slug($videodetails->products_id))
        //    return Redirect::route('bljr.show', array('id' => $videodetails->id, 'slug' => Str::slug($videodetails->products_id)), 301);
        //$videodetails = VideoDetails::findOrfail($id);
        //$kelas = Kelas::findOrfail($id);
        //$kelas = Kelas::find
        $video = Video::with('bayar')
            ->where('products_slug',$id)
            ->orWhere('id',$id) //id
            ->get(); //koding awal pake with('bayar')
        $anakvideo = VideoDetails::with('video','kelas')
            ->where('products_slug',$id)
            ->orWhere('id',$id)
            ->get();
        return view('users.video')
            ->with([
                //'kelas'=>$kelas,
                'videodetails'=>$videodetails,
                'video'=>$video,
                'anakvideo'=>$anakvideo,
                //'details'=>$details
            ]);
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
