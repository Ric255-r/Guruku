<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\ModelKuis;
use App\Sertifikat;
use App\Topik;
use Auth;
use Str;
use App\kelas;
use App\Blog;
use App\kategori;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = kategori::all();
        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }
        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        return view('amentor.form.kuis.createKuis', [
            'kategori'=>$test,
            'kon'=>$kon,
            // 'not'=>$not
            'totalkomen'=>$totalkomen,
            'totalreply'=>$totalreply
        ]);
    }

    public function topik(Request $request){
        $kategori_id = $request->get('kategori_id');
        $buattopik = DB::select("SELECT t.id, t.kategori_id, t.topik FROM topik t JOIN kategori k ON t.kategori_id = k.kategori WHERE t.kategori_id = :kat", ['kat'=>$kategori_id]);
        return response()->json($buattopik);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $show = ModelKuis::where('mentor_id',Auth::user()->kode_mentor)->get();
        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }
        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();
        return view('amentor.form.kuis.listKuis',['show'=>$show, 'kategori'=>$kategori,'kon'=>$kon, 'totalkomen'=>$totalkomen, 'totalreply'=>$totalreply]);
    }

    public function show($id)
    {
        $kuis = ModelKuis::findOrFail($id);
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }
        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        return view('amentor.form.kuis.show', ['kuis'=>$kuis,'totalkomen'=>$totalkomen, 'totalreply'=>$totalreply]);
    }

    public function ambilkelas(Request $request){
        $kelas = kelas::where('mentor_id', Auth::user()->kode_mentor)
                        // ->where('status', 'PUBLISH')
                        ->get();
        return response()->json($kelas);
    }

    public function filterkuismentor(Request $request)
    {
        $kat_kuis = $request->get('kat_kuis');
        $filter = ModelKuis::where('mentor_id', Auth::user()->kode_mentor)
                            ->where('kategori', $kat_kuis)
                            ->get();
        return response()->json($filter);
    }

    public function hisSiswa()
    {
        $user = Auth::user()->kode_mentor;
        $kuis = ModelKuis::where('mentor_id',Auth::user()->kode_mentor)->get();
        $show = DB::select("SELECT n.id_kuis, n.id_user, n.nilai_awal, n.nilai_akhir, n.waktukerja_awal, n.waktukerja_akhir, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.mentor_id = :m", ['m'=>$user]);

        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }
        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();
        return view('amentor.form.historysiswa',['show'=>$show,'kon'=>$kon, 'kuis'=>$kuis, 'totalkomen'=>$totalkomen, 'totalreply'=>$totalreply]);
    }

    public function hisfilter(Request $request)
    {
        $id_kuis = $request->get('id_kuis');
        $show = DB::select("SELECT n.*, u.name AS username, k.nama_kuis, k.kategori, k.topic FROM tbnilai n JOIN users u ON (n.id_user = u.id) JOIN tbkuis k ON (n.id_kuis = k.id) WHERE k.mentor_id = :men_id AND n.id_kuis = :id_kuis", ['men_id'=>Auth::user()->kode_mentor, 'id_kuis'=>$id_kuis]);

        if(empty($show)){
            $obj[] = (object) array("empty"=>true);
            return response()->json($obj);
        }else{
            return response()->json($show);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = Auth::user()->kode_mentor;
        $request->validate([
            'gambar'=>'required|mimes:jpeg,jpg,bmp,png|max:5120',
            'nama_kuis'=>'required',
            'deskripsi'=>'required',
            'mentor_id'=>'required',
            'kategori'=>'required',
            'tingkatan'=>'required',
            'topic'=>'required',
            'jenis'=>'required',
            'kelas_id'=>'nullable'
        ]);
        $file = $request->file('gambar');
        $nama_file = "Mentor=" . $guru . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'gambar_kuis';
        $file->move($tujuan_upload, $nama_file);

        if(strpos($request->nama_kuis, '#') !== false){
            $namakuis_sharp = str_replace("#", "-sharp", $request->nama_kuis);
            $array_data = [
                'gambar'=>$nama_file,
                'nama_kuis'=>$request->nama_kuis,
                'deskripsi'=>$request->deskripsi,
                'mentor_id'=>$request->mentor_id,
                'kategori'=>$request->kategori,
                'tingkatan'=>$request->tingkatan,
                'topic'=>$request->topic,
                'jenis'=>$request->jenis,
                'kelas_id'=>$request->kelas_id,
                'slug'=>Str::slug($namakuis_sharp . "-" . $request->mentor_id)
            ];
        }else{
            $array_data = [
                'gambar'=>$nama_file,
                'nama_kuis'=>$request->nama_kuis,
                'deskripsi'=>$request->deskripsi,
                'mentor_id'=>$request->mentor_id,
                'kategori'=>$request->kategori,
                'tingkatan'=>$request->tingkatan,
                'topic'=>$request->topic,
                'jenis'=>$request->jenis,
                'kelas_id'=>$request->kelas_id,
                'slug'=>Str::slug($request->nama_kuis . "-" . $request->mentor_id)
            ];
        }

        // $array_data = [
        //     'gambar'=>$nama_file,
        //     'nama_kuis'=>$request->nama_kuis,
        //     'deskripsi'=>$request->deskripsi,
        //     'mentor_id'=>$request->mentor_id,
        //     'kategori'=>$request->kategori,
        //     'tingkatan'=>$request->tingkatan,
        //     'topic'=>$request->topic,
        //     'slug'=>Str::slug($request->nama_kuis . "-" . $request->mentor_id)
        // ];
        $lala = ModelKuis::create($array_data);
        if($lala){
            return redirect()->route('amentor.kuis.listKuis')->with('success','Kuis Berhasil Di Buat! Jangan Lupa Di Aktifkan!');
        }
    }

    public function status(Request $request, $id){
        $request->validate([
            'status' => 'required|in:pending,active'
        ]);
        $item = ModelKuis::findOrfail($id);

        $item->status = $request->status;
        $item->save();
        if($item->status == 'pending'){
            return redirect()->back()->with('success', 'Kuis Berhasil Di Nonaktifkan');
        }else{
            return redirect()->back()->with('success', 'Kuis Berhasil Aktifkan');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lala = ModelKuis::find($id);
        $kategori = kategori::all();
        //request status
        $kon = Sertifikat::where('kode_mentor',Auth::user()->kode_mentor)
            ->where('status','PENDING')
            ->count();
        //notif blog
        $bloge = Blog::with(['komentar', 'balasan'])
            ->where('author_id',Auth::user()->kode_mentor)
            ->where('status', '=', 'PUBLISH')
            ->get();
        // foreach($bloge as $query)
        // {
        //     $not =  $query->komentar->count() + $query->balasan->count();
        // }
        $totalkomen = DB::table('comment_blog AS c')
                        ->join('blog AS b', 'c.id_blog', '=', 'b.id')
                        ->select('c.*', 'b.title')
                        ->where('c.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();

        $totalreply = DB::table('reply_blog AS r')
                        ->join('blog AS b', 'r.id_blog', '=', 'b.id')
                        ->select('r.*', 'b.title')
                        ->where('r.status_mentor', '=', 'unchecked')
                        ->where('b.author_id', '=', Auth::user()->kode_mentor)
                        ->where('b.status', '=', 'PUBLISH')
                        ->count();
        return view('amentor.form.kuis.editKuis',['lala'=>$lala, 'kategori'=>$kategori,'kon'=>$kon, 'totalkomen'=>$totalkomen, 'totalreply'=>$totalreply]);
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
        $guru = Auth::user()->kode_mentor;
        $val = $request->validate([
            'gambar'=>'nullable',
            'nama_kuis'=>'required',
            'deskripsi'=>'required',
            'mentor_id'=>'required',
            'kategori'=>'required',
            'topic'=>'required',
            'tingkatan'=>'required',
            'status'=>'required',
            'jenis'=>'required',
            'kelas_id'=>'nullable',
        ]);
        $file = $request->file('gambar');
        if($file == null){
            if(strpos($request->nama_kuis, '#') !== false){
                $namakuis_sharp = str_replace("#", "-sharp", $request->nama_kuis);
                $array_data = [
                    'nama_kuis'=>$request->nama_kuis,
                    'deskripsi'=>$request->deskripsi,
                    'mentor_id'=>$request->mentor_id,
                    'kategori'=>$request->kategori,
                    'topic'=>$request->topic,
                    'tingkatan'=>$request->tingkatan,
                    'status'=>$request->status,
                    'jenis'=>$request->jenis,
                    'kelas_id'=>$request->kelas_id,
                    'slug'=>Str::slug($namakuis_sharp . "-" . $request->mentor_id)
                ];
            }else{
                $array_data = [
                    'nama_kuis'=>$request->nama_kuis,
                    'deskripsi'=>$request->deskripsi,
                    'mentor_id'=>$request->mentor_id,
                    'kategori'=>$request->kategori,
                    'topic'=>$request->topic,
                    'tingkatan'=>$request->tingkatan,
                    'status'=>$request->status,
                    'jenis'=>$request->jenis,
                    'kelas_id'=>$request->kelas_id,
                    'slug'=>Str::slug($request->nama_kuis . "-" . $request->mentor_id)
                ];
            }
            // $array_data = [
            //     'nama_kuis'=>$request->nama_kuis,
            //     'deskripsi'=>$request->deskripsi,
            //     'mentor_id'=>$request->mentor_id,
            //     'kategori'=>$request->kategori,
            //     'topic'=>$request->topic,
            //     'tingkatan'=>$request->tingkatan,
            //     'status'=>$request->status,
            //     'slug'=>Str::slug($request->nama_kuis . "-" . $request->mentor_id)
            // ];
            $lala = ModelKuis::find($id)->update($array_data);
        }else{
            $nama_file = "Mentor=" . $guru . "_" . $file->getClientOriginalName();

            $tujuan_upload = 'gambar_kuis';
            $file->move($tujuan_upload, $nama_file);
            if(strpos($request->nama_kuis, '#') !== false){
                $namakuis_sharp = str_replace("#", "-sharp", $request->nama_kuis);
                $array_data = [
                    'gambar'=>$nama_file,
                    'nama_kuis'=>$request->nama_kuis,
                    'deskripsi'=>$request->deskripsi,
                    'mentor_id'=>$request->mentor_id,
                    'kategori'=>$request->kategori,
                    'topic'=>$request->topic,
                    'tingkatan'=>$request->tingkatan,
                    'status'=>$request->status,
                    'jenis'=>$request->jenis,
                    'kelas_id'=>$request->kelas_id,
                    'slug'=>Str::slug($namakuis_sharp . "-" . $request->mentor_id)
                ];
            }else{
                $array_data = [
                    'gambar'=>$nama_file,
                    'nama_kuis'=>$request->nama_kuis,
                    'deskripsi'=>$request->deskripsi,
                    'mentor_id'=>$request->mentor_id,
                    'kategori'=>$request->kategori,
                    'topic'=>$request->topic,
                    'tingkatan'=>$request->tingkatan,
                    'status'=>$request->status,
                    'jenis'=>$request->jenis,
                    'kelas_id'=>$request->kelas_id,
                    'slug'=>Str::slug($request->nama_kuis . "-" . $request->mentor_id)
                ];
            }
            $lala = ModelKuis::find($id)->update($array_data);
        }

        if($lala){
            // echo "<script>alert('Sukses')</script>";
            return redirect()->route('amentor.kuis.listKuis');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $lala = ModelKuis::find($id)->delete();
        if($lala){
            $request->session()->put('success', 'Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
