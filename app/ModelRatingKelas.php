<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelRatingKelas extends Model
{
    protected $table = 'tbrating_kelas';
    protected $fillable = ['id_kelas','id_user','rating','pesan'];

    public function kls()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id');
    }
}
