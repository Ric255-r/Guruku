<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paketkelas extends Model
{
    protected $table = 'paketkelas';
    protected $fillable = ['file','pelajaran','deskripsi'];
    protected $hidden = [

    ];
    public function video()
    {
        return $this->hasMany(VideoPaket::class, 'products_id');
    }
}
