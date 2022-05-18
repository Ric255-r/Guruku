<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelJawabanUser extends Model
{
    protected $table = "tbjawabanuser";
    protected $primaryKey = 'id';
    protected $fillable = ['id_kuis','id_user','id_soal','jawaban_user','status_nilai'];

    // public function jawaban()
    // {
    //     return $this->belongsTo(ModelSoal::class, 'soal','id');
    // }
}
