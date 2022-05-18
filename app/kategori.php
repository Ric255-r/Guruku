<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['kategori','slug'];

    public function kate()
    {
        return $this->hasMany(Topik::class,'kategori_id');
    }
    public function gori()
    {
        return $this->hasMany(Kelas::class, 'kategori');
    }
}
