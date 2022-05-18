<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $fillable = [
        'products_id','judul','products_slug'
    ];

    protected $hidden = [

    ];

    public function bayar()
    {
        //awalnya products_id dan id
        return $this->belongsTo(Kelas::class, 'products_id', 'kelas'); //awlnya slug
        //return $this->belongsTo(Kelas::class);
    }

    public function vid()
    {
        return $this->belongsTo(TransactionDetail::class, 'products_id');
        //return $this->belongsTo(TransactionDetail::class, 'products_id','id'); hrsnya ini
    }

    public function vidjoin()
    {
        return $this->belongsTo(JoinDetail::class,'products_id');
    }

    public function details()
    {
        return $this->hasMany(VideoDetails::class, 'video_id');
    }

    public function modul()
    {
        return $this->hasMany(Modul::class, 'video');
    }

    public function getVideoAttribute($value)
    {
        return url('storage/'.$value);
    }
}
