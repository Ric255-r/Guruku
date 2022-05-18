<?php

namespace App\Http\Controllers;
use App\ModelSoal;
use App\ModelKuis;
use App\Blog;
use Auth;
use App\Sertifikat;
use DB;
use Illuminate\Http\Request;

class FormSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insSoal()
    {
        $guru = Auth::user()->kode_mentor;
        $kuis = DB::select("SELECT k.* FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE u.roles = :m AND u.kode_mentor = :g", ['g'=>$guru, 'm'=>'MENTOR']);

        $kuislainnya = DB::select("SELECT k.* FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE u.roles = :m AND u.kode_mentor = :g AND k.jenis = :j", ['g'=>$guru, 'j'=>'lainnya', 'm'=>'MENTOR']);

        $kuiskelas = DB::select("SELECT k.* FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE u.roles = :m AND u.kode_mentor = :g AND k.jenis = :j", ['g'=>$guru, 'j'=>'kelas', 'm'=>'MENTOR']);

        $kuismateri = DB::select("SELECT k.* FROM tbkuis k JOIN users u ON k.mentor_id = u.kode_mentor WHERE u.roles = :m AND u.kode_mentor = :g AND (k.jenis = :j OR k.jenis = :ja)", ['g'=>$guru, 'j'=>'video', 'ja'=>'video_akhir', 'm'=>'MENTOR']);

        // $soal = ModelSoal::orderBy('number','DESC')->get();

        $soal = DB::select("SELECT s.*, k.id, k.mentor_id FROM tbsoal s JOIN tbkuis k ON s.id_kuis = k.id WHERE k.mentor_id = '$guru' ORDER BY s.created_at DESC");
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

        return view('amentor.form.index')
            ->with([
                'kuis'=>$kuis,
                'kon'=>$kon, 
                'soal'=>$soal, 
                'totalkomen'=>$totalkomen, 
                'totalreply'=>$totalreply,
                'kuislainnya'=>$kuislainnya,
                'kuiskelas'=>$kuiskelas,
                'kuismateri'=>$kuismateri
            ]);
    }

    public function index($kode_mentor)
    {
        $kuis = ModelKuis::where('mentor_id',$kode_mentor)->get();
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
        return view('amentor.form.show',['kuis'=>$kuis,'kon'=>$kon, 'totalkomen'=>$totalkomen, 'totalreply'=>$totalreply]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $soal = $request->get('id_kuis');
        $query = ModelSoal::where('id_kuis',$soal)
                            ->orderBy('number', 'ASC')
                            ->get();
        return response()->json($query);
    }

    public function ambilNumber(Request $request)
    {
        $soal = $request->get('id_kuis');
        $query = ModelSoal::where('id_kuis',$soal)
                            ->max('number');

        if(empty($query)){
            $obj[] = (object) array('Kosong'=>true);
            return response()->json($obj);
        }else{
            $obj[] = (object) array('number'=>$query);
            return response()->json($obj);
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
        $request->validate([
            'soal'=>'required',
            'Pilihan_A'=>'required',
            'Pilihan_B'=>'required',
            'Pilihan_C'=>'required',
            'Pilihan_D'=>'required',
            'jawaban_benar'=>'required',
            'id_kuis'=>'required',
            'number'=>'required'
        ]);
        ModelSoal::create($request->all());
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
        // $idsoal = $request->idsoal;
        $val = $request->validate([
            'soal'=>'required',
            'Pilihan_A'=>'required',
            'Pilihan_B'=>'required',
            'Pilihan_C'=>'required',
            'Pilihan_D'=>'required',
            'jawaban_benar'=>'required',
            'id_kuis'=>'required',
            'number'=>'required'
        ]);
        ModelSoal::findOrFail($id)->update($val);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        ModelSoal::findOrFail($id)->delete();
        return redirect()->back();
    }
}
