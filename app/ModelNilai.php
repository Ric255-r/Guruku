<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelNilai extends Model
{
    protected $table = 'tbnilai';
    protected $fillable = ['id_kuis','id_user','nilai_awal','nilai_akhir','waktukerja_awal','waktukerja_akhir'];
}
