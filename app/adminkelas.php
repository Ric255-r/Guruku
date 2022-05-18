<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminkelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['file','pelajaran','deskripsi'];

    public function video()
    {
        return $this->hasMany(Video::class, 'products_id');
    }
}
