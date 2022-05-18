<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class VideoDetails extends Model
{
    protected $table = 'videodetails';
    protected $fillable = [
        'video_id','file','nama','products_id','products_slug','number','status','kuis','link_kuis','blog','link_blog'
    ];
    protected $hidden = [];

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id','id');
        //return $this->belongsTo(Video::class, 'video_id','id');
        //return $this->belongsTo(kategori::class, 'kategori_id','id');
    }
    public function kls()
    {
        return $this->belongsTo(TransactionDetail::class, 'products_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'products_id','kelas');
    }

    public function modul()
    {
        return $this->hasMany(Modul::class, 'videodetails_id');
    }

    public function getUrlAttribute()
    {
        //URL::route('play.show', array('products_slug' =>Str::slug($this->products_id), 'number' =>$this->number ));

        //ini awal
        URL::route('play.show', array('products_slug' =>Str::slug($this->products_id), 'id' =>$this->id ));
        //URL::route('play.show', array('id' =>$this->id, 'products_slug' =>Str::slug($this->products_id) ));
    }

    //ric
    public function gurunya()
    {
        return $this->belongsTo(Kelas::class, 'products_slug','slug');
    }
}
