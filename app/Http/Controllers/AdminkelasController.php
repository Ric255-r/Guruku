<?php

namespace App\Http\Controllers;

use App\adminkelas;
use App\JoinDetail;
use App\kategori;
use App\VideoGratis;
use App\Topik;
use App\ModelRatingKelas;
use App\Kelas;
use App\Video;
use App\VideoDetails;
use App\ModelKuis;
use App\Blog;
use App\ModelNilai;
//use Carbon\Carbon;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HidesAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Carbon;
//use Illuminate\Support\Facades\Auth;

class AdminkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminkelas() //buat tembak ke index
    {
        $kelas = Kelas::where('jenis','gratis')->paginate(6);
        // $kelas = kelas::all();
        return view('kelas/kelasgratis',compact('kelas'));
    }

    //public function getKey()
    //{
    //    $attributes = [];
    //    foreach ($this->getKeyName() as $key) {
    //        $attributes[$key] = $this->getAttribute($key);
    //    }
    //    return $attributes;
    //}

    public function index()
    {
        // $kelas = Kelas::all();
        // $rating = ModelRatingKelas::with('kls')
        //     ->get();

        //asli

        $user = TransactionDetail::with('product')
           ->get();
        $join = JoinDetail::with('product')
           ->get();
        $kelas = Kelas::all();
        $rating = ModelRatingKelas::with('kls')
           ->get();
        $gratis = Kelas::with('mentor')
            ->where('jenis','gratis')
            ->where('status','PUBLISH')
            ->paginate(12);
        // $cekrating = ModelRatingKelas::avg('rating');
        //bayar
        $bayar = Kelas::with('check','mentor')
           ->where('jenis','premium')
           ->where('status','PUBLISH')
           ->paginate(12);
        //paket
        $paket = Kelas::where('jenis','paket')->paginate(12);
        //kategori
        $kategori = kategori::all();
        foreach($kelas as $query)
        {
            return view('/kelasbaru/index')->with([
            //gratis
                // 'jumlah'=>$jumlah,
                'kelas'=>$kelas,
                'user'=>$user,
                //'user2'=>$user2,
                'gratis'=>$gratis,
                'bayar'=>$bayar,
                'rating'=>$rating,
                //'bayar2'=>$bayar2,
                'paket'=>$paket,
                'rating'=>$rating,
                'join'=>$join,
                'kategori'=>$kategori,
            ]);
            //}
        }

    }

    public function filtermateri(Request $request)
    {
        $sd = $request->get('materi_sd');
        $smp = $request->get('materi_smp');
        $sma = $request->get('materi_sma');
        $semua = $request->get('semua');
        $kelas = Kelas::all();
        $kategori = kategori::all();

        if($sd != "null" && $smp != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'SMP')
                        ->orWhere('materi', 'SMA SMK')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();
            // $join = DB::table('join_details AS jd')
            //             ->join('kelasbaru AS k', 'jd.products_id', '=', 'k.id')
            //             ->join('users AS u', 'u.kode_mentor', '=', 'k.mentor_id')
            //             ->select('jd.join_id', 'jd.products_id','jd.user_id', 'k.*', 'u.file AS foto_mentor', 'u.name AS nama_mentor', 'u.bidang')
            //             ->where(function($q){
            //                 $q->where('k.materi','=', 'SD')
            //                     ->orWhere('k.materi','=', 'SMP')
            //                     ->orWhere('k.materi','=', 'SMA SMK')
            //                     ->orWhere('k.materi','=', 'Semua Tingkatan');
            //             })->get();


            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'SMP')
                            ->orWhere('materi', 'SMA SMK')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null" && $smp != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'SMP')
                        ->orWhere('materi', 'SMA SMK');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'SMP')
                            ->orWhere('materi', 'SMA SMK');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null" && $smp != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'SMP')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'SMP')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'SMA SMK')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'SMA SMK')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($smp != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SMP')
                        ->orWhere('materi', 'SMA SMK')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SMP')
                            ->orWhere('materi', 'SMA SMK')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SMA SMK')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SMA SMK')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($smp != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SMP')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SMP')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($smp != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SMP')
                        ->orWhere('materi', 'SMA SMK');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SMP')
                            ->orWhere('materi', 'SMA SMK');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null" && $smp != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'SMP');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'SMP');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'SMA SMK');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'SMA SMK');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where(function($q){
                    $q->where('materi', 'SD')
                        ->orWhere('materi', 'Semua Tingkatan');
                })
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where(function($q){
                        $q->where('materi', 'SD')
                            ->orWhere('materi', 'Semua Tingkatan');
                    })
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sd != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where('materi', 'SD')
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where('materi', 'SD')
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($smp != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where('materi', 'SMP')
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where('materi', 'SMP')
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where('materi', 'SMA SMK')
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where('materi', 'SMA SMK')
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);

        }else if($semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where('materi', 'Semua Tingkatan')
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where('materi', 'Semua Tingkatan')
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);
        }else{
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                ->where('jenis','gratis')
                ->where('status','PUBLISH')
                ->paginate(12);

            $user = TransactionDetail::with('product')
                    ->get();
            $join = JoinDetail::with('product')
                    ->get();

            $bayar = Kelas::with('check','mentor')
                    ->where('jenis','premium')
                    ->where('status','PUBLISH')
                    ->paginate(12);
        }
        return view('/kelasbaru/tingkatan')->with([
        //gratis
            // 'jumlah'=>$jumlah,
            'kelas'=>$kelas,
            'user'=>$user,
            //'user2'=>$user2,
            'gratis'=>$gratis,
            'bayar'=>$bayar,
            'rating'=>$rating,
            //'bayar2'=>$bayar2,
            'rating'=>$rating,
            'join'=>$join,
            'kategori'=>$kategori,
        ]);

    }

    public function filmaterikategori(Request $request)
    {
        $getkat = $request->get('kategori');
        $sd = $request->get('materi_sd');
        $smp = $request->get('materi_smp');
        $sma = $request->get('materi_sma');
        $semua = $request->get('semua');

        $kategori = kategori::where('slug',$getkat)
            ->orWhere('id',$getkat)
            ->firstOrFail();

        $topik = Topik::with('topic')
            ->where('kategori_slug',$kategori->kategori)
            ->get();

        if($sd != "null" && $smp != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null" && $smp != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null" && $smp != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);

            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($smp != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($smp != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SMP')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($smp != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null" && $smp != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMA SMK');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sd != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('materi', 'SD')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('materi', 'SD')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SD')
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('materi', 'SD')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SD')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SD')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($smp != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('materi', 'SMP')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('materi', 'SMP')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SMP')
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('materi', 'SMP')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SMP')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SMP')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('materi', 'SMA SMK')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('materi', 'SMA SMK')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SMA SMK')
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('materi', 'SMA SMK')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SMA SMK')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'SMA SMK')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid

        }else if($semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('materi', 'Semua Tingkatan')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('materi', 'Semua Tingkatan')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'Semua Tingkatan')
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('materi', 'Semua Tingkatan')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'Semua Tingkatan')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where('materi', 'Semua Tingkatan')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid
        }else{
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            // $total = 0;
            // $counter = 0;
            // $arr = [];
            // $arrRating = [];
            // foreach($gratis as $g){
            //     foreach($rating as $r){
            //         if($g->id == $r->id_kelas){
            //             $id_kelas = $g->id;
            //             $klss = Kelas::with(['mentor', 'kel'])
            //                         ->where('kategori_slug',$getkat)
            //                         // ->where('jenis','gratis')
            //                         ->whereIn('id', [$id_kelas])
            //                         ->where('status','PUBLISH')
            //                         ->get();
            //         }
            //     }
            // }
            // for ($i=0; $i < intval($gratis->count()); $i++) { 
                
            // }

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $muridgrat = Kelas::where('kategori_slug',$getkat)
                                ->where('jenis','gratis')
                                ->where('status','PUBLISH')
                                ->orderBy('murid', 'DESC')
                                ->take(8)
                                ->get(); //untuk terpopuler

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

            $muridbayar = Kelas::where('kategori_slug',$getkat)
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('murid','DESC')
                                ->take(8)
                                ->get(); //untuk yg murid
        }

        return view('/kelasbaru/kategori/tingkatan')->with([
            'kategori'=>$kategori,
            'topik'=>$topik,
            'gratis'=>$gratis,
            'terbarugrat'=>$terbarugrat,
            'muridgrat'=>$muridgrat,
            'bayar'=>$bayar,
            'terbarubayar'=>$terbarubayar,
            'muridbayar'=>$muridbayar,
            'rating'=>$rating
        ]);
    }

    public function filmateritopik(Request $request)
    {
        $getkat = $request->get('kategori');
        $getpik = $request->get('topik');
        $sd = $request->get('materi_sd');
        $smp = $request->get('materi_smp');
        $sma = $request->get('materi_sma');
        $semua = $request->get('semua');

        $topik = Topik::where('slug',$getpik)
            ->first();

        if($sd != "null" && $smp != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru


            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru


        }else if($sd != "null" && $smp != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru



        }else if($sd != "null" && $smp != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);

            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sd != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru


            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($smp != "null" && $sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sma != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SMA SMK')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMA SMK')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SMA SMK')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($smp != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SMP')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($smp != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SMP')
                                ->orWhere('materi', 'SMA SMK');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SMP')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SMP')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sd != "null" && $smp != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMP');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMP');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMP');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sd != "null" && $sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'SMA SMK');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'SMA SMK');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'SMA SMK');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sd != "null" && $semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where(function($q){
                            $q->where('materi', 'SD')
                                ->orWhere('materi', 'Semua Tingkatan');
                        })
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where(function($q){
                                $q->where('materi', 'SD')
                                    ->orWhere('materi', 'Semua Tingkatan');
                            })
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where(function($q){
                                    $q->where('materi', 'SD')
                                        ->orWhere('materi', 'Semua Tingkatan');
                                })
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sd != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where('materi', 'SD')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'SD')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('topik_slug', $getpik)
                            ->where('kategori_slug',$getkat)
                            ->where('materi', 'SD')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where('materi', 'SD')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($smp != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where('materi', 'SMP')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'SMP')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'SMP')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where('materi', 'SMP')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($sma != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where('materi', 'SMA SMK')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'SMA SMK')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'SMA SMK')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where('materi', 'SMA SMK')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else if($semua != "null"){
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where('materi', 'Semua Tingkatan')
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'Semua Tingkatan')
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('materi', 'Semua Tingkatan')
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where('materi', 'Semua Tingkatan')
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }else{
            $rating = ModelRatingKelas::with('kls')
                    ->get();

            $gratis = Kelas::with('mentor')
                        ->where('kategori_slug',$getkat)
                        ->where('topik_slug', $getpik)
                        ->where('jenis','gratis')
                        ->where('status','PUBLISH')
                        ->paginate(12);

            $terbarugrat = Kelas::where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('jenis','gratis')
                            ->where('status','PUBLISH')
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get(); //untuk terbaru

            $bayar = Kelas::with('check','mentor')
                            ->where('kategori_slug',$getkat)
                            ->where('topik_slug', $getpik)
                            ->where('jenis','premium')
                            ->where('status','PUBLISH')
                            ->paginate(12);


            $terbarubayar = Kelas::where('kategori_slug',$getkat)
                                ->where('topik_slug', $getpik)
                                ->where('jenis','premium')
                                ->where('status','PUBLISH')
                                ->orderBy('id','DESC')
                                ->take(6)
                                ->get(); //untuk yang terbaru

        }

        return view('/kelasbaru/topik/tingkatan')->with([
            'topik'=>$topik,
            'gratis'=>$gratis,
            'terbarugrat'=>$terbarugrat,
            'bayar'=>$bayar,
            'terbarubayar'=>$terbarubayar,
            'rating'=>$rating
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $kelas = Kelas::all();
        $user = TransactionDetail::with('product')
            ->get();
        $join = JoinDetail::with('product')
            ->get();
        $kategori = Kategori::all();
        $rating = ModelRatingKelas::with('kls')
           ->get();
        $gratis = Kelas::where('kelas','like',"%".$keyword."%")
            ->orWhere('jenis','like',"%".$keyword."%")
            //->where('status','PUBLISH')
            ->paginate(12);
        //if (!$gratis || !$gratis->count()) {
        //    Session::flash('failed', 'Oops kelas yang anda cari tidak tersedia');
        //}
        $bayar = Kelas::where('kelas','like',"%".$keyword."%")
            ->orWhere('jenis','like',"%".$keyword."%")
            //->where('status','PUBLISH')
            ->paginate(12);
        //if (!$bayar || !$bayar->count()) {
        //    Session::flash('gagal', 'Oops kelas yang anda cari tidak tersedia');
        //}
        $paket = Kelas::where('kelas','like',"%".$keyword."%")
            ->orWhere('jenis','like',"%".$keyword."%")
            ->paginate(12);

        return view('kelasbaru.index')
            ->with([
                'kelas'=>$kelas,
                'kategori'=>$kategori,
                'gratis'=>$gratis,
                'bayar'=>$bayar,
                'paket'=>$paket,
                'user'=>$user,
                'join'=>$join,
                'rating'=>$rating
            ]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        //$kelas = Kelas::where('kelas','like',"%".$cari."%")
        //    ->paginate();
        $rating = ModelRatingKelas::with('kls')
           ->get();

        $gratis = Kelas::where('kelas','like',"%".$cari."%")
            ->paginate();
        $bayar = Kelas::where('kelas','like',"%".$cari."%")
            ->paginate();
        $paket = Kelas::where('kelas','like',"%".$cari."%")
            ->paginate();
        $kategori = Kategori::all();
        return view('/kelasbaru/index')
            ->with([
                //'kelas'=>$kelas,
                'kategori'=>$kategori,
                'gratis'=>$gratis,
                'bayar'=>$bayar,
                'paket'=>$paket,
                'rating'=>$rating
            ]);
    }

    public function detail()
    {
        $kelas = DB::table('kelas')->paginate(12);
        return view('/kelas/detail',compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\adminkelas  $adminkelas
     * @return \Illuminate\Http\Response
     */

    public function drupdun(Request $request)
    {
        $video_id = $request->get('video_id');
        $videos = VideoDetails::with('deoo')
            ->where('video_id',$video_id)
            ->get();
        return response()->json($videos);
    }

    public function show(Request $request, $id, $slug = null)
    {
        if(Auth::check())
        {
            $kelas = Kelas::where('slug', $id)
                ->firstOrFail();
            $rating = ModelRatingKelas::with('kls')
                    ->get();
            $cekrating = ModelRatingKelas::where('id_kelas', $kelas->id)
                ->avg('rating');

            $kuis = ModelKuis::where('jenis', 'kelas')
                                ->where('kelas_id', $kelas->id)
                                ->where('status', 'active')
                                ->get();
            $blog = Blog::where('jenis','kelas')
                            ->where('kelas_id', $kelas->id)
                            // ->where('status','PUBLISH')
                            ->get();
            $nilai = ModelNilai::where('id_user', Auth::user()->id)->get();

            $video = Video::with('bayar')
                ->where('products_slug',$id)
                ->get();
            $anakvideo = VideoDetails::with('video')
                ->where('products_slug',$id)
                ->get();
            $video_id = $request->get('video_id');
            $videos = VideoDetails::with('video')
                ->where('video_id',$video_id)
                ->get();
            $materi = Video::where('products_slug',$id)
                ->count();
            $submateri = VideoDetails::where('products_slug',$id)
                ->count();
            $videoasc = Video::with('bayar')
                ->where('products_id',$id)
                ->orderby('id','ASC')
                ->take(1)
                ->get();
            $videodetails = VideoDetails::with('video')
                ->where('products_slug',$id)
                ->where('number',0)
                ->get();

            $lain = Kelas::all();

            $user = TransactionDetail::with('product','transaction')
                ->where('user_id',Auth::user()->id)
                ->where('products_id',$kelas->id)
                ->get();
            $ikut = JoinDetail::with('product')
                ->where('user_id',Auth::user()->id)
                ->where('products_id',$kelas->id)
                ->get();
            $semua = Kelas::all();

            $rate = ModelRatingKelas::where('id_kelas',$kelas->id)
                ->count();

            foreach ($semua as $query)
            {
                $jumlah = ModelRatingKelas::where('id_kelas', $query->id)
                    ->get();

                return view('/kelasbaru/show')
                    ->with([
                        //'sukses'=>$sukses,
                        'rate'=>$rate,
                        'jumlah'=>$jumlah,
                        'kelas'=>$kelas,
                        'video'=>$video,
                        'videodetails'=>$videodetails,
                        'videoasc'=>$videoasc,
                        'lain'=>$lain,
                        'materi'=>$materi,
                        'submateri'=>$submateri,
                        'anakvideo'=>$anakvideo,
                        'videos'=>$videos,
                        'user'=>$user,
                        'semua'=>$semua,
                        'ikut'=>$ikut,
                        'kuis'=>$kuis,
                        'nilai'=>$nilai,
                        'cekrating'=>$cekrating,
                        'rating'=>$rating,
                        'blog'=>$blog
                    ]);
            }

            //return view('/kelasbaru/show')
            //    ->with([
            //        'jumlah'=>$jumlah,
            //        'kelas'=>$kelas,
            //        'video'=>$video,
            //        'videodetails'=>$videodetails,
            //        'videoasc'=>$videoasc,
            //        'lain'=>$lain,
            //        'materi'=>$materi,
            //        'submateri'=>$submateri,
            //        'anakvideo'=>$anakvideo,
            //        'videos'=>$videos,
            //        'user'=>$user,
            //        'semua'=>$semua,
            //        'ikut'=>$ikut,
            //        'cekrating'=>$cekrating,
            //        'rating'=>$rating
            //    ]);
        }
        else
        {
            $kelas = Kelas::where('slug', $id)
                ->firstOrFail();
            $rating = ModelRatingKelas::with('kls')
                ->get();
            $cekrating = ModelRatingKelas::where('id_kelas', $kelas->id)->avg('rating');

            $kuis = ModelKuis::where('jenis', 'kelas')
                                ->where('kelas_id', $kelas->id)
                                ->where('status', 'active')
                                ->get();

            $blog = Blog::where('jenis','kelas')
                            ->where('kelas_id', $kelas->id)
                            // ->where('status','PUBLISH')
                            ->get();

            $video = Video::with('bayar')
                ->where('products_slug',$id)
                ->get();
            $anakvideo = VideoDetails::with('video')
                ->where('products_slug',$id)
                ->get();
            $video_id = $request->get('video_id');
            $videos = VideoDetails::with('video')
                ->where('video_id',$video_id)
                ->get();
            $materi = Video::where('products_slug',$id)
                ->count();
            $submateri = VideoDetails::where('products_slug',$id)
                ->count();
            $videoasc = Video::with('bayar')
                ->where('products_id',$id)
                ->orderby('id','ASC')
                ->take(1)
                ->get();
            $videodetails = VideoDetails::with('video')
                ->where('products_slug',$id)
                ->where('number',0)
                ->get();

            $lain = Kelas::all();

            $user = TransactionDetail::with('product')
                ->get();
            $ikut = JoinDetail::with('product')
                ->get();
            $semua = Kelas::all();

            $rate = ModelRatingKelas::where('id_kelas',$kelas->id)
                ->count();

            foreach ($semua as $query)
            {
                $jumlah = ModelRatingKelas::where('id_kelas', $query->id)
                    ->get();

                return view('/kelasbaru/show')
                    ->with([
                        'rate'=>$rate,
                        'jumlah'=>$jumlah,
                        'kelas'=>$kelas,
                        'video'=>$video,
                        'videodetails'=>$videodetails,
                        'videoasc'=>$videoasc,
                        'lain'=>$lain,
                        'materi'=>$materi,
                        'submateri'=>$submateri,
                        'anakvideo'=>$anakvideo,
                        'videos'=>$videos,
                        'user'=>$user,
                        'semua'=>$semua,
                        'ikut'=>$ikut,
                        'kuis'=>$kuis,
                        'rating'=>$rating,
                        'cekrating'=>$cekrating,
                        'blog'=>$blog
                    ]);
            }
        }
    }

    //public function kategori($id)
    //{
    //    //$kategori = kategori::findOrfail($id);
    //    $kategori = kategori::where('slug',$id)
    //        ->orWhere('id',$id)
    //        ->firstOrFail();
    //        //->orWhere('id',$id)
    //        //->first();

    //    $topik = Topik::with('topic')
    //        ->where('kategori_id',$id)
    //        ->get();

    //    $gratis = Kelas::where('kategori',$id)
    //        ->where('jenis','gratis')
    //        ->paginate(12);

    //    $terbarugrat = Kelas::where('kategori',$id)
    //        ->where('jenis','gratis')
    //        ->where('status','PUBLISH')
    //        ->orderBy('id', 'DESC')
    //        ->take(6)
    //        ->get(); //untuk terbaru

    //    $muridgrat = Kelas::where('kategori',$id)
    //        ->where('jenis','gratis')
    //        ->where('status','PUBLISH')
    //        ->orderBy('murid', 'DESC')
    //        ->take(8)
    //        ->get(); //untuk terpopuler

    //    //premium
    //    $bayar = Kelas::where('kategori',$id)
    //        ->where('jenis','premium')
    //        ->where('status','PUBLISH')
    //        ->paginate(12); //ambil kelas premium
    //    $terbarubayar = Kelas::where('kategori',$id)
    //        ->where('jenis','premium')
    //        ->where('status','PUBLISH')
    //        ->orderBy('id','DESC')
    //        ->take(6)
    //        ->get(); //untuk yang terbaru
    //    $muridbayar = Kelas::where('kategori',$id)
    //        ->where('jenis','premium')
    //        ->where('status','PUBLISH')
    //        ->orderBy('murid','DESC')
    //        ->take(8)
    //        ->get(); //untuk yg murid
    //    //paket
    //    $paket = Kelas::where('kategori',$id)
    //        ->where('jenis','paket')
    //        ->paginate(12);
    //    $terbarupaket = Kelas::where('kategori',$id)
    //        ->where('jenis','paket')
    //        ->orderBy('id','DESC')
    //        ->take(15)
    //        ->get();
    //    $muridpaket = Kelas::where('kategori',$id)
    //        ->where('jenis','paket')
    //        ->orderBy('murid','DESC')
    //        ->take(8)
    //        ->get();
    //    return view('/kelasbaru/kategori/index')->with([
    //        'kategori'=>$kategori,
    //        'topik'=>$topik,
    //        'gratis'=>$gratis,
    //        'terbarugrat'=>$terbarugrat,
    //        'muridgrat'=>$muridgrat,
    //        'bayar'=>$bayar,
    //        'terbarubayar'=>$terbarubayar,
    //        'muridbayar'=>$muridbayar,
    //        'paket'=>$paket,
    //        'terbarupaket'=>$terbarupaket,
    //        'muridpaket'=>$muridpaket
    //    ]);
    //}

    public function kategoribaru($id)
    {
        //$kategori = kategori::findOrfail($id);
        $kategori = kategori::where('slug',$id)
            ->orWhere('id',$id)
            ->firstOrFail();
            //->orWhere('id',$id)
            //->first();
        $rating = ModelRatingKelas::with('kls')
           ->get();

        $topik = Topik::with('topic')
            ->where('kategori_slug',$id)
            ->get();

        $gratis = Kelas::where('kategori_slug',$id)
            ->where('jenis','gratis')
            ->where('status','PUBLISH')
            ->paginate(12);

        $terbarugrat = Kelas::where('kategori_slug',$id)
            ->where('jenis','gratis')
            ->where('status','PUBLISH')
            //->where('created_at','>',Carbon::now())
            ->orderBy('created_at', 'DESC')
            ->take(6)
            ->get(); //untuk terbaru

        $muridgrat = Kelas::where('kategori_slug',$id)
            ->where('jenis','gratis')
            ->where('status','PUBLISH')
            ->orderBy('murid', 'DESC')
            ->take(8)
            ->get(); //untuk sedang-populer

        //premium
        $bayar = Kelas::where('kategori_slug',$id)
            ->where('jenis','premium')
            ->where('status','PUBLISH')
            ->paginate(12); //ambil kelas premium

        $terbarubayar = Kelas::where('kategori_slug',$id)
            ->where('jenis','premium')
            ->where('status','PUBLISH')
            ->orderBy('id','DESC')
            ->take(6)
            ->get(); //untuk yang terbaru
        $muridbayar = Kelas::where('kategori_slug',$id)
            ->where('jenis','premium')
            ->where('status','PUBLISH')
            ->orderBy('murid','DESC')
            ->take(8)
            ->get(); //untuk yg murid

        //paket
        $paket = Kelas::where('kategori',$id)
            ->where('jenis','paket')
            ->paginate(12);
        $terbarupaket = Kelas::where('kategori',$id)
            ->where('jenis','paket')
            ->orderBy('id','DESC')
            ->take(15)
            ->get();
        $muridpaket = Kelas::where('kategori',$id)
            ->where('jenis','paket')
            ->orderBy('murid','DESC')
            ->take(8)
            ->get();
        return view('/kelasbaru/kategori/index')->with([
            'kategori'=>$kategori,
            'topik'=>$topik,
            'gratis'=>$gratis,
            'terbarugrat'=>$terbarugrat,
            'muridgrat'=>$muridgrat,
            'bayar'=>$bayar,
            'terbarubayar'=>$terbarubayar,
            'muridbayar'=>$muridbayar,
            'paket'=>$paket,
            'terbarupaket'=>$terbarupaket,
            'muridpaket'=>$muridpaket,
            'rating'=>$rating
        ]);
    }

    public function topik($id)
    {
        // $kategori = kategori::findOrfail($id);
        // $topik = Topik::with('topic')
        //     ->where('kategori_id',$id)
        //     ->get();
        //$topik = Topik::findOrfail($id);
        $topik = Topik::where('slug',$id)
            ->first();
        //gratis
        $rating = ModelRatingKelas::with('kls')
           ->get();

        $terbarugrat = Kelas::where('topik_slug',$id)
            ->where('jenis','gratis')
            ->where('status','PUBLISH')
            ->orderBy('created_at','DESC')
            ->take(9)
            ->get();
        $gratis = Kelas::where('topik_slug',$id)
            ->where('jenis','gratis')
            ->where('status','PUBLISH')
            ->paginate(12);
        //bayar
        $terbarubayar = Kelas::where('topik_slug',$id)
            ->where('jenis','premium')
            ->where('status','PUBLISH')
            ->orderBy('created_at','DESC')
            ->take(9)
            ->get();
        $bayar = Kelas::where('topik_slug',$id)
            ->where('jenis','premium')
            ->where('status','PUBLISH')
            ->paginate(12);
        //paket
        $terbarupaket = Kelas::where('topik_slug',$id)
            ->where('jenis','paket')
            ->orderBy('created_at','DESC')
            ->take(9)
            ->get();
        $paket = Kelas::where('topik_slug',$id)
            ->where('jenis','paket')
            ->paginate(12);
        return view('/kelasbaru/topik/index')
            ->with([
                'topik'=>$topik,
                'terbarugrat'=>$terbarugrat,
                'gratis'=>$gratis,
                'terbarubayar'=>$terbarubayar,
                'bayar'=>$bayar,
                'terbarupaket'=>$terbarupaket,
                'paket'=>$paket,
                'rating'=>$rating
            ]);
    }

    public function showprofile($id)
    {
        $kelasgrat = adminkelas::findOrfail($id);
        return view('/users/users',compact('kelasgrat'));
    }

    public function user()
    {
        // $kelasgrat = adminkelas::findOrfail($id);
        return view('users.users');
    }
    // public function sisa()
    // {
    //     $kelasgrat = DB::table('kelas')->paginate(2);
    //     return view('/kelas/dtlkelasgrat',compact('kelasgrat'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adminkelas  $adminkelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminkelas = adminkelas::findOrfail($id);
        return view('/admin/adminkelas/edit',compact('adminkelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adminkelas  $adminkelas
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request, adminkelas $adminkelas)
    {
        $request->validate([
            'file'=>'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'pelajaran'=>'required',
            'deskripsi'=>'required'
        ]);

        $file = $request->file('file');
        $nama_file = time(). "_".$file->getClientOriginalName();

        $tujuan_upload = 'adminkelas';

        $file->move($tujuan_upload,$nama_file);

        adminkelas::where('id',$adminkelas->id)
            ->update([
                'file'=>$nama_file,
                'pelajaran'=>$request->pelajaran,
                'deskripsi'=>$request->deskripsi
            ]);
        $file = $request->file('file');
        return redirect()->route('adminkelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adminkelas  $adminkelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        adminkelas::destroy($id);
        return redirect('/admin/adminkelas');
    }

    public function hapus($id)
    {
        $hapus1 = adminkelas::destroy($id);
        $hapus2 = VideoGratis::with('gratis')
            ->where('products_id',$id)
            ->delete();
        return redirect()->route('adminkelas.index');
    }

    public function gallery(Request $request, $id)
    {
        $gratis = adminkelas::findOrfail($id);
        $pen = Transaction::where('transaction_status','PENDING')->count();
        $items = VideoGratis::with('gratis')
            ->where('products_id',$id)
            ->get();
        return view('admin.video-gratis.gallery')->with([
            'gratis' => $gratis,
            'items' => $items,
            'pen'=>$pen
        ]);
    }
}
