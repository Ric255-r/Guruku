<?php

namespace App\Http\Controllers;
// namespace Admin\PagesController;
// namespace App\Controllers;

use App\gambaradminguru;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // public function home(){
    //     return view('index');
    // }
    // public function index(){
    //     return view('index');
    // }
    // public function guru(){
    //     return view('guru.guru');
    // }
    public function admin(){
        return view('admin.admin');
    }
    // public function adminguru(){
    //     $gambar = gambaradminguru::get();
    //     return view('admin.adminguru',compact('gambar'));
    //     // return view('admin.adminguru',compact('gambar'));
    // }
}
