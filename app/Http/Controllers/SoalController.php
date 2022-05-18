<?php

namespace App\Http\Controllers;
use App\ModelSoal;
use Auth;
use \stdClass;
use App\topik;
use App\ModelNilai;
use App\ModelKuis;
use App\ModelRatingKuis;
use App\TransactionDetail;
use App\JoinDetail;
use App\kategori;
use App\Kelas;
use App\VideoDetails;
use App\ModelJawabanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        $kuis = DB::select("SELECT k.id, k.gambar, k.nama_kuis, k.deskripsi, DATE(k.created_at) AS tanggalbuat, k.kategori, k.topic, k.mentor_id, k.tingkatan, k.slug, k.jenis, u.name AS nama_mentor, u.bidang, u.file AS foto_mentor FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.status = 'active' AND k.jenis = 'lainnya'");
        $rating = ModelRatingKuis::all();
        // foreach($kuis as $query)
        // {
        //     $tutul = ModelRatingKuis::where('id_kuis',$query->id)->count();
        // }
        return view('users.kuis.menu',[
                // 'tutul'=>$tutul,
                'kategori'=>$kategori,
                'kuis'=>$kuis,
                'rating'=>$rating
            ]);
    }

    public function search(Request $request)
    {
        $keyword =  $request->keyword;
        // $kuis = DB::select("SELECT k.id, k.gambar, DATE(k.created_at) AS tanggalbuat, k.nama_kuis, k.deskripsi, k.kategori, k.topic, k.mentor_id, k.tingkatan, k.slug, k.jenis, u.name AS nama_mentor, u.bidang, u.file AS foto_mentor FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.nama_kuis LIKE '%$keyword%' AND k.status = 'active' AND k.jenis = 'lainnya'");
        $kuis = DB::select("SELECT k.id, k.gambar, DATE(k.created_at) AS tanggalbuat, k.nama_kuis, k.deskripsi, k.kategori, k.topic, k.mentor_id, k.tingkatan, k.slug, k.jenis, u.name AS nama_mentor, u.bidang, u.file AS foto_mentor FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.nama_kuis LIKE :nama_kuis AND k.status = :stats AND k.jenis = :jenis", ['nama_kuis'=>'%'.$keyword.'%', 'stats'=>'active', 'jenis'=>'lainnya']);

        $rating = ModelRatingKuis::all();
        return view('users.kuis.search')->with(['kuis'=>$kuis, 'keyword'=>$keyword, 'rating'=>$rating]);

    }

    // public function getKategori(Request $request)
    // {
    //     $kat_id = $request->get('kategori');
    //     $kuis = DB::select("SELECT k.id, k.gambar, k.nama_kuis, k.deskripsi, k.kategori, k.topic, k.mentor_id, u.name AS nama_mentor FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.kategori = '$kat_id' AND k.status = 'active'");
    //     return response()->json($kuis);
    // }

    public function kategoribaru($id)
    {
        $kategori = kategori::where('slug',$id)
            ->orWhere('id',$id)
            ->firstOrFail();
        $rating = ModelRatingKuis::all();

        // $kuis = ModelKuis::where('kategori',$kategori->kategori)->get();

        // if($kuis->count() > 0)
        // {
        //     foreach($kuis as $query)
        //     {
        //         $tutul = ModelRatingKuis::where('id_kuis',$query->id)->count();
        //     }
        // }
        // else
        // {
        //     $tutul = '0';
        // }

        // $topik = topik::where('kategori_id', $kategori->kategori)->get();

        // return view('users.kuis.kategori', [
        //     'tutul'=>$tutul,
        //     'kuis'=>$kuis,'kategori'=>$kategori, 'topik'=>$topik, 'rating'=>$rating]);

        $kuis = DB::select("SELECT k.id, k.gambar, k.nama_kuis, k.deskripsi, DATE(k.created_at) AS tanggalbuat, k.kategori, k.topic, k.mentor_id, k.tingkatan, k.slug, k.jenis, u.name AS nama_mentor, u.bidang, u.file AS foto_mentor FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.kategori = '$kategori->kategori' AND k.status = 'active' AND k.jenis = 'lainnya'");

        $topik = topik::where('kategori_id', $kategori->kategori)->get();

        return view('users.kuis.kategori', ['kuis'=>$kuis,'kategori'=>$kategori, 'topik'=>$topik, 'rating'=>$rating]);

    }

    public function rating(Request $request, $slug)
    {
        $kuis = ModelKuis::where('id',$slug)
                            ->orWhere('slug',$slug)
                            ->first();
        $cek = ModelRatingKuis::where('id_kuis', $kuis->id)
                                ->where('id_user', Auth::user()->id)
                                ->exists();
        if(!$cek){
            $buat = $request->validate([
                //'id_kuis'=>'required',
                //'id_user'=>'required',
                'rating'=>'required',
                'pesan'=>'required'
            ]);
            $buat = ModelRatingKuis::create([
                'id_kuis'=>$kuis->id,
                'id_user'=>Auth::user()->id,
                'rating'=>$request->rating,
                'pesan'=>$request->pesan
            ]);
            if($buat){
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
            }
        }
    }

    public function filtertopik(Request $request)
    {
        $kategori = $request->get('kategori');
        $topik = $request->get('topik');
        if(strpos($topik, '-SHARP') !== false){
            $topiksharp = str_replace("-SHARP", "#", $topik);
            $query = DB::table('tbkuis')
                        ->join('users', 'tbkuis.mentor_id', '=', 'users.kode_mentor')
                        ->where('tbkuis.kategori','=',$kategori)
                        ->where('tbkuis.topic','=',$topiksharp)
                        ->where('tbkuis.status','=','active')
                        ->where('tbkuis.jenis', '=', 'lainnya')
                        ->select('tbkuis.id','tbkuis.gambar','tbkuis.nama_kuis','tbkuis.topic','users.name','users.bidang', 'tbkuis.created_at','tbkuis.slug','tbkuis.tingkatan', 'tbkuis.mentor_id','users.file')
                        ->get();
        }else{
            $query = DB::table('tbkuis')
                        ->join('users', 'tbkuis.mentor_id', '=', 'users.kode_mentor')
                        ->where('tbkuis.kategori','=',$kategori)
                        ->where('tbkuis.topic','=',$topik)
                        ->where('tbkuis.status','=','active')
                        ->where('tbkuis.jenis', '=', 'lainnya')
                        ->select('tbkuis.id','tbkuis.gambar','tbkuis.nama_kuis','tbkuis.topic','users.name','users.bidang', 'tbkuis.created_at','tbkuis.slug','tbkuis.tingkatan', 'tbkuis.mentor_id','users.file')
                        ->get();
        }

        $rating = ModelRatingKuis::all();
        return view('users.kuis.topik')
                ->with([
                    'kuis'=>$query,
                    'rating'=>$rating
                ]);

    }

    public function ambilratekuis()
    {
        $query = ModelRatingKuis::all();
        return response()->json($query);
    }

    public function detailkuis($id)
    {
        $kuis = ModelKuis::with('kelas')
            ->where('id',$id)
            ->orWhere('slug',$id)
            ->first();
        $kelas = Kelas::all();

        $rating = ModelRatingKuis::all();

        $videodetails = VideoDetails::with('kelas','video')->get();

        if(Auth::check())
        {
            $user = Auth::user()->id;
            $orang = Auth::user()->roles == 'USERS';
            $valnilai = ModelNilai::where('id_kuis',$kuis->id)
                                ->where('id_user', $user)
                                ->first();
            $boarduser = DB::select("SELECT IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai, IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja, n.id_user, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id = '$kuis->id' AND n.id_user = '$user' ORDER BY nilai DESC, waktukerja ASC");

            $cekrating = ModelRatingKuis::where('id_kuis', $kuis->id)
                                    ->where('id_user', $user)
                                    ->exists();
            $tutul = ModelRatingKuis::where('id_kuis',$kuis->id)->count();

            $ikut = JoinDetail::with('product')
                ->where('user_id',Auth::user()->id)
                ->where('products_id',$kuis->kelas_id)
                ->get();

            $saksi = TransactionDetail::with('product')
                ->where('user_id',Auth::user()->id)
                ->where('products_id',$kuis->kelas_id)
                ->get();
        }
        else
        {
            //klo dia ga lg login
            $ikut = JoinDetail::with('product')
                    //->where('user_id',Auth::user()->id)
                    //->where('products_id',$kuis->kelas_id)
                    ->get();

            $saksi = TransactionDetail::with('product')
                //->where('user_id',Auth::user()->id)
                //->where('products_id',$kuis->kelas_id)
                ->get();
        }

        $board = DB::select("SELECT IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai, IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja, u.name AS username, k.nama_kuis, k.kategori, k.topic, n.id_user FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id = :id ORDER BY nilai DESC, waktukerja ASC LIMIT 10", ['id'=>$kuis->id]);

        // $board = DB::select("SELECT n.nilai_akhir, n.nilai_awal, n.waktukerja_akhir, n.waktukerja_awal, u.name AS username, k.nama_kuis, k.kategori, k.topic, n.id_user FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id = :id
        //     ORDER BY 
        //         (CASE WHEN n.nilai_awal >= n.nilai_akhir THEN n.nilai_awal 
        //                 ELSE n.nilai_akhir 
        //             END) DESC,
        //         (CASE WHEN n.waktukerja_akhir IS NULL THEN n.waktukerja_awal
        //             ELSE
        //             CASE WHEN n.waktukerja_awal <= n.waktukerja_akhir THEN n.waktukerja_awal 
        //                 WHEN n.waktukerja_akhir <= n.waktukerja_awal THEN n.waktukerja_akhir 
        //                 END
        //             END)
        //                 ASC LIMIT 10", 
        //             ['id'=>$kuis->id]);

        $showboard = DB::table('tbnilai AS n')
                        ->join('users AS u', 'n.id_user', '=', 'u.id')
                        ->join('tbkuis AS k', 'n.id_kuis','=', 'k.id')
                        ->select(DB::raw("IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai"), DB::raw("IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja"), 'u.name AS username', 'k.nama_kuis', 'k.kategori', 'k.topic', 'n.id_user')
                        ->where('k.id', '=', $kuis->id)
                        ->orderBy('nilai', 'DESC')
                        ->orderBy('waktukerja', 'ASC')
                        ->get();

        $angkarating = ModelRatingKuis::where('id_kuis', $kuis->id)->avg('rating');

        $kuislain = DB::select("SELECT k.*, u.name AS nama_mentor, u.file AS foto_mentor, u.bidang FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.id != '$kuis->id' AND k.kategori = '$kuis->kategori' AND k.jenis = 'lainnya' AND k.status = 'active'");

        $kuiskategorilain = DB::select("SELECT k.*, u.name AS nama_mentor, u.file AS foto_mentor, u.bidang FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.id != '$kuis->id' AND k.jenis = 'lainnya' AND k.status = 'active' ORDER BY RAND() LIMIT 9");


        $tutul = ModelRatingKuis::where('id_kuis',$kuis->id)->count();

        if(Auth::check()){
            return view('users.kuis.detailkuis', [
                //var baru
                'orang'=>$orang,
                'saksi'=>$saksi,
                'ikut'=>$ikut,
                'rating'=>$rating,
                'tutul'=>$tutul,
                //end variable baru
                'kuis'=>$kuis,
                'board'=>$board,
                'boarduser'=>$boarduser,
                'kuislain'=>$kuislain,
                'valnilai'=>$valnilai,
                'kuiskategorilain'=>$kuiskategorilain,
                'showboard'=>$showboard,
                'cekrating'=>$cekrating,
                'angkarating'=>$angkarating,
                'videodetails'=>$videodetails,
                'kelas'=>$kelas
                ]);
        }else{
            return view('users.kuis.detailkuis', [
                //tamabahan
                'ikut'=>$ikut,
                'saksi'=>$saksi,
                //end tambahan
                'rating'=>$rating,
                'tutul'=>$tutul,
                'kuis'=>$kuis,
                'board'=>$board,
                'kuislain'=>$kuislain,
                'kuiskategorilain'=>$kuiskategorilain,
                'showboard'=>$showboard,
                'angkarating'=>$angkarating,
                'videodetails'=>$videodetails,
                'kelas'=>$kelas
            ]);
        }

        //kodingan asli
        //$kuis = ModelKuis::with('kelas')
        //            ->where('id',$id)
        //            ->orWhere('slug',$id)
        //            ->first();
        //$kelas = Kelas::all();

        //$videodetails = VideoDetails::with('kelas','video')->get();

        //if(Auth::check())
        //{
        //    $user = Auth::user()->id;
        //    $valnilai = ModelNilai::where('id_kuis',$kuis->id)
        //                        ->where('id_user', $user)
        //                        ->first();

        //    $boarduser = DB::select("SELECT IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai, IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja, n.id_user, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id = '$kuis->id' AND n.id_user = '$user' ORDER BY nilai DESC, waktukerja ASC");
        //}

        //$board = DB::select("SELECT IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai, IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja, u.name AS username, k.nama_kuis, k.kategori, k.topic, n.id_user FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id = '$kuis->id' ORDER BY nilai DESC, waktukerja ASC LIMIT 10");

        //$showboard = DB::table('tbnilai AS n')
        //                ->join('users AS u', 'n.id_user', '=', 'u.id')
        //                ->join('tbkuis AS k', 'n.id_kuis','=', 'k.id')
        //                ->select(DB::raw("IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai"), DB::raw("IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja"), 'u.name AS username', 'k.nama_kuis', 'k.kategori', 'k.topic', 'n.id_user')
        //                ->where('k.id', '=', $kuis->id)
        //                ->orderBy('nilai', 'DESC')
        //                ->orderBy('waktukerja', 'ASC')
        //                ->get();

        //$kuislain = DB::select("SELECT k.*, u.name AS nama_mentor, u.file AS foto_mentor, u.bidang FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.id != '$kuis->id' AND k.kategori = '$kuis->kategori' AND k.status = 'active'");

        //$kuiskategorilain = DB::select("SELECT k.*, u.name AS nama_mentor, u.file AS foto_mentor, u.bidang FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE k.id != '$kuis->id' AND k.status = 'active' ORDER BY RAND() LIMIT 9");

        //if(Auth::check()){
        //    return view('users.kuis.detailkuis', [
        //            'kuis'=>$kuis,
        //            'board'=>$board,
        //            'boarduser'=>$boarduser,
        //            'kuislain'=>$kuislain,
        //            'valnilai'=>$valnilai,
        //            'kuiskategorilain'=>$kuiskategorilain,
        //            'showboard'=>$showboard,
        //            'videodetails'=>$videodetails,
        //            'kelas'=>$kelas
        //        ]);
        //}else{
        //    return view('users.kuis.detailkuis', [
        //            'kuis'=>$kuis,
        //            'board'=>$board,
        //            'kuislain'=>$kuislain,
        //            'kuiskategorilain'=>$kuiskategorilain,
        //            'showboard'=>$showboard,
        //            'videodetails'=>$videodetails,
        //            'kelas'=>$kelas
        //        ]);
        //}
    }

    public function menujusoal(Request $request, $id)
    {
        if(Auth::check()){
            // $kuis = ModelKuis::where('id',$id)
            //                 ->orWhere('slug',$id)
            //                 ->first();
            $kuis = ModelKuis::with('kelas')
                ->where('id',$id)
                ->orWhere('slug',$id)
                ->first();
            $soal = ModelSoal::where('id_kuis',$kuis->id)->get();
            // return view('users.kuis.soal',['soal'=>$soal, 'kuis'=>$kuis]);
            $kelas = Kelas::all();

            $ikut = JoinDetail::with('product')
                ->where('user_id',Auth::user()->id)
                ->where('products_id',$kuis->kelas_id)
                ->get();

            $saksi = TransactionDetail::with('product')
                ->where('user_id',Auth::user()->id)
                ->where('products_id',$kuis->kelas_id)
                ->get();

            $nilai = ModelNilai::where('id_kuis', $kuis->id)
                                ->where('id_user', Auth::user()->id)
                                ->first();
            if(Auth::user()->roles == "USERS"){
                if($kuis->jenis == 'video_akhir'){
                    return view('users.kuis.soal',[
                            'soal'=>$soal,
                            'kuis'=>$kuis,
                            'kelas'=>$kelas,
                            'ikut'=>$ikut,
                            'saksi'=>$saksi
                    ]);
                }else if($kuis->jenis == 'lainnya' || $kuis->jenis == 'video' || $kuis->jenis == 'kelas'){
                    if(@strval($nilai->nilai_akhir) != null){
                        abort(401);
                    }else{
                        return view('users.kuis.soal',[
                            'soal'=>$soal, 
                            'kuis'=>$kuis, 
                            'kelas'=>$kelas, 
                            'ikut'=>$ikut, 
                            'saksi'=>$saksi
                        ]);
                    }
                }
            }else{
                abort(401);
            }
        }else{
            echo "<script>alert('Login Terlebih Dahulu!'); location.href='/login';</script>";
        }

        // $videodetails = VideoDetails::with('kelas')
        //     ->where('products_slug',$id)
        //     ->orWhere('id',$id)
        //     ->orWhere('number',$id)
        //     ->get();
        // foreach($videodetails as $query)
        // {
        //     $soal = ModelSoal::where('details_section',$query->nama)
        //         ->where('kode_guru',$query->kelas->mentor_id)
        //         ->inRandomOrder()
        //         ->get();
        //     $matapel = ModelSoal::where('details_section',$query->nama)
        //         ->where('kode_guru',$query->kelas->mentor_id)
        //         ->first();
        //     //return json_encode($soal);
        //     return view("users/kuis/test",['matapel'=>$matapel, 'soal'=>$soal]);
        // }
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

    public function simpanjawaban(Request $request)
    {
        //tambah validator
        $validator = $request->validate([
            'jawaban_user'=>'required'
        ],
        [
            'jawaban_user.required'=>'Anda Harus Mengisi Semua Jawaban Soal'
        ]);
        $pilihan = $validator['jawaban_user'];
        //endvalidator
        
        // $pilihan = $request->jawaban_user;
        $id_soal = $request->id;
        $jumlah = $request->jumlah;
        $id_kuis = $request->id_kuis;
        $slug = $request->slug;
        $waktu_kerja = $request->waktu_kerja;
        $user = Auth::user()->id;
        $totalBenar = 0;
        $kosong = 0;
        $totalSalah = 0;
        $cekkuis = ModelKuis::where('id', '=', $id_kuis)->first(); //tambahanvalidate

		for($i=0;$i<$jumlah;$i++){
            $nomor = $id_soal[$i]; // id nomor soal
            $querysoal = ModelSoal::where('id_kuis',$id_kuis)->where('id',$nomor)->get();
            foreach($querysoal as $lala){
                $soalid_tbsoal = $lala->id;
            }

			// jika user tidak memilih jawaban
			if(empty($pilihan[$nomor])){
                $kosong++;
                echo "<script>alert('Ada soal yang belum keisi');</script>";
			}else{
				// jika memilih
				$jawaban = $pilihan[$nomor];

                //validate
                $v = ModelJawabanUser::where('id_soal','=', $soalid_tbsoal)
                                    ->where('id_kuis','=',$id_kuis) //ubah nama jadi id biar gk bentrok
                                    ->where('id_user','=', $user)
                                    ->first(); //awalnya exists();
                if(!$v){
                    //create
                    $simpanjawaban = ModelJawabanUser::create([
                        'id_kuis'=>$id_kuis,
                        'id_user'=>$user,
                        'id_soal'=>$soalid_tbsoal,
                        'jawaban_user'=>$jawaban,
                        'status_nilai'=>'nilai_awal'
                    ]);
                }else{
                    //update
                    $data = [
                        'id_user'=>$user,
                        'id_soal'=>$soalid_tbsoal,
                        'jawaban_user'=>$jawaban,
                        'status_nilai'=>'nilai_akhir'
                    ];
                    //tambahan
                    if($cekkuis->jenis == 'video' || $cekkuis->jenis == 'kelas' || $cekkuis->jenis == 'lainnya'){
                        if($v->status_nilai == 'nilai_akhir'){
                            abort(401);
                        }else{
                            ModelJawabanUser::where('id_soal','=', $soalid_tbsoal)
                                            ->where('id_kuis','=',$id_kuis)
                                            ->where('id_user','=', $user)
                                            ->update($data);
                        }
                    }else{
                        ModelJawabanUser::where('id_soal','=', $soalid_tbsoal)
                                        ->where('id_kuis','=',$id_kuis)
                                        ->where('id_user','=', $user)
                                        ->update($data);
                    }
                    //endtambahan
                    //codelama
                    // ModelJawabanUser::where('id_soal','=', $soalid_tbsoal)
                    //                 ->where('id_kuis','=',$id_kuis)
                    //                 ->where('id_user','=', $user)
                    //                 ->update($data);
                }

                //BuatCocokkanJawaban
                $cekbenar = DB::select("SELECT s.id, s.soal, s.jawaban_benar, j.jawaban_user, j.id_user FROM tbsoal s JOIN tbjawabanuser j ON j.id_soal = s.id where s.id = '$soalid_tbsoal' and j.id_user = '$user'");

                foreach($cekbenar as $ngecek){
                    $cekjawabanbenar = $ngecek->jawaban_benar;
                    $cekjawabanuser = $ngecek->jawaban_user;

                    if($cekjawabanbenar != $cekjawabanuser){
                        $totalSalah++;
                    }else{
                        $totalBenar++;
                    }
                }
			}
        }

        $score = 100 / $jumlah * $totalBenar;
        $nilai = ModelNilai::where('id_kuis','=',$id_kuis)
                            ->where('id_user','=',$user)
                            ->exists();

        //baru
        if(!$nilai){
            ModelNilai::create([
                'id_kuis'=>$id_kuis,
                'id_user'=>$user,
                'nilai_awal'=>$score,
                'nilai_akhir'=>null,
                'waktukerja_awal'=>$waktu_kerja,
                'waktukerja_akhir'=>null
            ]);
            $request->session()->put(['score'=>$score]);
            return redirect()->route('kuis.jawabanuser', $slug);
        }else{
            $data = [
                'nilai_akhir'=>$score,
                'waktukerja_akhir'=>$waktu_kerja
            ];
            //tambahan
            $ceknilai = ModelNilai::where('id_kuis', '=', $id_kuis)
                                    ->where('id_user', '=', $user)
                                    ->first();

            if($cekkuis->jenis == 'video' || $cekkuis->jenis == 'kelas' || $cekkuis->jenis == 'lainnya'){
                if(strval($ceknilai->nilai_akhir) != null){
                    abort(401);
                }else{
                    ModelNilai::where('id_kuis','=',$id_kuis)
                                ->where('id_user','=',$user)
                                ->update($data);

                    $request->session()->put(['score'=>$score]);
                    return redirect()->route('kuis.jawabanuser', $slug);
                }
            }else{
                ModelNilai::where('id_kuis','=',$id_kuis)
                            ->where('id_user','=',$user)
                            ->update($data);

                $request->session()->put(['score'=>$score]);
                return redirect()->route('kuis.jawabanuser', $slug);
            }
            //endtambahan

            //codesebelumnya
            // ModelNilai::where('id_kuis','=',$id_kuis)
            //             ->where('id_user','=',$user)
            //             ->update($data);

            // $request->session()->put(['score'=>$score]);
            // return redirect()->route('kuis.jawabanuser', $slug);
        }

        // koding sebelumnya
        // if(!$nilai){
        //     ModelNilai::create([
        //         'id_kuis'=>$id_kuis,
        //         'id_user'=>$user,
        //         'nilai_awal'=>$score,
        //         'nilai_akhir'=>null,
        //         'waktukerja_awal'=>$waktu_kerja,
        //         'waktukerja_akhir'=>null
        //     ]);
        //     $showkan = DB::select("SELECT s.soal, s.Pilihan_A, s.Pilihan_B, s.Pilihan_C, s.Pilihan_D, s.jawaban_benar, j.jawaban_user, j.id_user FROM tbsoal s JOIN tbjawabanuser j ON s.id = j.id_soal WHERE j.id_user = '$user' AND s.id_kuis = '$id_kuis'");

        //     $request->session()->put(['score'=>$score, 'kode_guru'=>$querykuis->mentor_id, 'showkan'=>$showkan]);
        //     return redirect()->route('kuis.jawabanuser', $slug);
        // }else{
        //     $data = [
        //         'nilai_akhir'=>$score,
        //         'waktukerja_akhir'=>$waktu_kerja
        //     ];
        //     ModelNilai::where('id_kuis','=',$id_kuis)
        //                 ->where('id_user','=',$user)
        //                 ->update($data);

        //     $showkan = DB::select("SELECT s.soal, s.Pilihan_A, s.Pilihan_B, s.Pilihan_C, s.Pilihan_D, s.jawaban_benar, j.jawaban_user, j.id_user FROM tbsoal s JOIN tbjawabanuser j ON s.id = j.id_soal WHERE j.id_user = '$user' AND s.id_kuis = '$id_kuis'");

        //     $request->session()->put(['score'=>$score, 'kode_guru'=>$querykuis->mentor_id, 'showkan'=>$showkan]);
        //     return redirect()->route('kuis.jawabanuser', $slug);
        // }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function jawabanuser($slug)
    {
        $user = Auth::user()->id;
        $kuis = ModelKuis::where('slug', $slug)
                        ->where('status','=','active')
                        ->first();

        $showkan = DB::select("SELECT s.soal, s.Pilihan_A, s.Pilihan_B, s.Pilihan_C, s.Pilihan_D, s.jawaban_benar, j.jawaban_user, j.id_user FROM tbsoal s JOIN tbjawabanuser j ON s.id = j.id_soal WHERE j.id_user = '$user' AND s.id_kuis = '$kuis->id'");

        $valnilai = ModelNilai::where('id_kuis',$kuis->id)
                            ->where('id_user', Auth::user()->id)
                            ->first();

        return view('users/kuis/jawaban', ['valnilai'=>$valnilai, 'kuis'=>$kuis, 'showkan'=>$showkan]);
    }

    public function print($slug)
    {
        //sebelumnya samadgn jwbnuser
        // $kuis = ModelKuis::where('slug', $slug)
        //                 ->where('status','=','active')
        //                 ->first();

        // $valnilai = ModelNilai::where('id_kuis',$kuis->id)
        //                     ->where('id_user', Auth::user()->id)
        //                     ->first();
        $user = Auth::user()->id;
        $kuis = ModelKuis::where('slug', $slug)
                        ->where('status','=','active')
                        ->first();

        $showkan = DB::select("SELECT s.soal, s.Pilihan_A, s.Pilihan_B, s.Pilihan_C, s.Pilihan_D, s.jawaban_benar, j.jawaban_user, j.id_user FROM tbsoal s JOIN tbjawabanuser j ON s.id = j.id_soal WHERE j.id_user = '$user' AND s.id_kuis = '$kuis->id'");

        $valnilai = ModelNilai::where('id_kuis',$kuis->id)
                            ->where('id_user', Auth::user()->id)
                            ->first();

        return view('users/kuis/print', ['valnilai'=>$valnilai, 'kuis'=>$kuis, 'showkan'=>$showkan]);
    }

    // public function leader($id){
    //     $first = DB::select("SELECT IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai, IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id='$id' ORDER BY nilai DESC, waktukerja ASC LIMIT 1");

    //     $show = DB::select("SELECT IFNULL(n.nilai_akhir, n.nilai_awal) AS nilai, IFNULL(n.waktukerja_akhir, n.waktukerja_awal) AS waktukerja, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.id = '$id' ORDER BY nilai DESC, waktukerja ASC");

    //     // $show = DB::select("SELECT n.nilai_awal, n.nilai_akhir, n.waktu_kerja, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) ORDER BY n.nilai_awal DESC, n.waktu_kerja ASC");
    //     return view('users.kuis.leaderboard', ['show'=>$show, 'first'=>$first]);
    // }

    public function store(Request $request)
    {

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
