<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoBayar extends Model
{
    protected $table = 'videobayar';
    protected $fillable = [
        'products_id','video','is_default'
    ];

    protected $hidden = [

    ];

    // public function pay()
    // {
    //     return $this->hasMany(Video::class, 'products_id');
    // }

    public function bayar()
    {
        return $this->belongsTo(kelaspremium::class, 'products_id', 'id');
    }

    // public function pro()
    // {
    //     return $this->hasMany(Video::class, 'products_id');
    // }

    public function getVideoAttribute($value)
    {
        return url('storage/'.$value);
    }
}
