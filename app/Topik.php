<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = 'topik';
    protected $fillable = ['topik','kategori_id','kategori_slug','slug'];

    public function topic()
    {
        return $this->belongsTo(kategori::class, 'kategori_id','kategori');
    }
}
