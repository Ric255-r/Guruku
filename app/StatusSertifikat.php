<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusSertifikat extends Model
{
    protected $table = 'status_serti';
    //field utama = user_id, videodetails_id, status
    protected $fillable = ['user_id','videodetails_id','status','alert','products_slug'];
}
