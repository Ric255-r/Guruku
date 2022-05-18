<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSoal extends Model
{
    protected $table = "tbsoal";
    protected $fillable = ['id_kuis','soal','Pilihan_A','Pilihan_B','Pilihan_C','Pilihan_D','jawaban_benar','number'];
}
