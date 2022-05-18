<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoPaket extends Model
{
    protected $table = 'videopaket';

    protected $fillable = [
        'products_id','video','is_default'
    ];

    protected $hidden = [

    ];

    public function paket()
    {
        return $this->belongsTo(paketkelas::class, 'products_id','id');
    }

    public function getVideoAttribute($value)
    {
        return url('storage/'.$value);
    }
}
