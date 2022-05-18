<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $fillable = [
        'kelas','kode_mentor','status','nama','email','feedback','user_id'
    ];
}
