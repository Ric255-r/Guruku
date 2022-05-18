<?php

namespace App\Http\Controllers;

use App\User;
use App\Bank;
use App\Blog;
use App\Bookmark;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = User::with('ben')
            ->where('id',Auth::user()->id)
            ->get();
        return view('users.profile.index')
            ->with([
                'user'=>$user
            ]);
    }

    public function blog()
    {
        $blog = Bookmark::with('blog')
            ->where('user_id',Auth::user()->id)
            ->where('status',1)
            ->get();
        return view('users.blog.favorite')
            ->with([
                'blog'=>$blog
            ]);
    }

    public function edit($id)
    {
        $path = Route::currentRouteName();
        $user = User::findOrfail($id);
        $bank = Bank::all();
        return view('users.profile.edit')
            ->with([
                'path'=>$path,
                'user'=>$user,
                'bank'=>$bank
            ]);
    }

    public function updatefoto($id)
    {
        $user = User::findOrfail($id);
        $path = Route::currentRouteName();
        return view('users.profile.updatefoto')
            ->with([
                'user'=>$user,
                'path'=>$path
            ]);
    }

    public function update(Request $request, $id)
    {
        $path = Route::currentRouteName();
        $statustelp = $request->statustelp;
        //echo $path;
        if($path == 'user.profile.edit')
        {
            if(!isset($statustelp)){
                $data = $request->validate([
                    //'name'=>'required',
                    //'email'=>'required',
                    //'roles'=>'required',
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                    //'bank'=>'nullable|exists:bank,id',
                    //'no_rek'=>'nullable',
                ]);
            }else if($statustelp == false){
                $data = $request->validate([
                    //'name'=>'required',
                    //'email'=>'required',
                    //'roles'=>'required',
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'telp'=>'required',
                    'statustelp'=>'required',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                    //'bank'=>'nullable|exists:bank,id',
                    //'no_rek'=>'nullable',
                ]);
                $data['telp'] = $request->telp;
                $data['statustelp'] = true;
            }
            $data['file'] = $request->file('file')->store(
                'assets/users','public'
            );

            User::where('id',$id)
                ->update($data);

            return redirect()->route('user.profile.index')->with('success','Data Berhasil Diubah');
        }else{
            if(!isset($statustelp)){
                $data = $request->validate([
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                    //'bank'=>'nullable|exists:bank,id',
                    //'no_rek'=>'nullable',
                ]);
            }else if($statustelp == false){
                $data = $request->validate([
                    'file'=>'nullable|mimes:png,jpg,jpeg',
                    'telp'=>'required',
                    'statustelp'=>'required',
                    'bidang'=>'nullable',
                    'deskripsi'=>'nullable',
                    'github_profile'=>'nullable',
                    'dribbble_profile'=>'nullable',
                    'instagram_profile'=>'nullable',
                    'twitter_profile'=>'nullable',
                    'link_website'=>'nullable'
                    //'bank'=>'nullable|exists:bank,id',
                    //'no_rek'=>'nullable',
                ]);
                $data['telp'] = $request->telp;
                $data['statustelp'] = true;
            }

            if($request->file == null)
            {
                User::where('id',$id)
                    ->update($data);
                return redirect()->route('user.profile.index')->with('success','Data Berhasil Diubah');
            }else{
                $data['file'] = $request->file('file')->store(
                    'asset/users','public'
                );

                User::where('id',$id)
                    ->update($data);
                return redirect()->route('user.profile.index')->with('success','Data Berhasil Diubah');

            }
        }
    }

}
