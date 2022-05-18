<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelaspremium extends Model
{
    protected $table = 'kelaspre';
    protected $fillable = ['file','pelajaran','harga','deskripsi'];

    protected $hidden = [

    ];

    public function video()
    {
        return $this->hasMany(VideoBayar::class, 'products_id');
    }

    // public function pro()
    // {
    //     return $this->hasMany(Video::class, 'products_id');
    // }

    public function check()
    {
        return $this->hasMany(TransactionDetail::class, 'kelaspremium_id');
    }
}
