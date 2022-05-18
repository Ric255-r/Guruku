<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\User;
use App\Kelas;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('roles','ADMIN')
            ->get();
        $kategori = kategori::all();
        return view('contact.index')
            ->with([
                'user'=>$user,
                'kategori'=>$kategori
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
        $data = $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'pesan'=>'required',
            //'status'=>'required|in:PENDING,SUCCESS',
            'user_id'=>'required|exists:users,id'
        ]);
        ContactUs::create($data);
        return redirect()->route('contact-us.index')->with('success','Pesan berhasil dikirim');
    }

    public function reqkelas(Request $request)
    {
        $data = $this->validate($request,[
            'file'=>'required|file|image|mimes:jpeg,png,jpg',
            'kelas'=>' required',
            //'slug'=>'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'murid' => 'nullable',
            'jenis' => 'required|in:gratis,premium,paket',
            'kategori'=> 'required',
            'sertifikat' => 'required',
            'konsultansi' => 'required',
            'link_konsul'=>'nullable',
            'tingkat' =>'required|in:Pemula,Lanjutan',
            'materi' =>'required|in:SD,SMP,SMA SMK, Semua Tingkatan',
            'topik'=>'required',
            'mentor_id'=>'required|exists:users,kode_mentor',
            'status'=>'required|in:FAILED,REQUEST,PENDING,PUBLISH',
            'pic_serti'=>'nullable|image|mimes:jpg,jpeg,png',
            'materi'=>'required'
        ]);

        $data['file'] = $request->file('file')->store(
            'assets/adminkelasbaru', 'public'
            // 'penyimpanan','public'
        );

        if($request->file('pic_serti') != null)
        {
            $data['pic_serti'] = $request->file('pic_serti')->store(
                'assets/kelassertifikat','public'
            );
        }
        else
        {

        }

        $data['slug'] = Str::slug($request->kelas);

        $data['kategori_slug'] = Str::slug($request->kategori);

        $data['topik_slug'] = Str::slug($request->topik);

        Kelas::create($data);
        return redirect()->route('contact-us.index')->with('success','Kelas Sedang Diproses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
