<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';
    protected $fillable = [
        'video','videodetails_id','nama_modul','file','kode_mentor','products_id','products_slug'
    ];

    public function vidi()
    {
        return $this->belongsTo(Video::class, 'video','id');
    }

    public function details()
    {
        return $this->belongsTo(VideoDetails::class, 'videodetails_id','id');
    }
}
