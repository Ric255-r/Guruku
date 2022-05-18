<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelRatingKuis extends Model
{
    protected $table = 'tbrating_kuis';
    protected $fillable = ['id_kuis','id_user','rating','pesan'];
}
