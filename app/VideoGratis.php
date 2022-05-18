<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGratis extends Model
{
    protected $table = 'videogratis';

    protected $fillable = [
        'products_id','video','is_default'
    ];

    protected $hidden = [

    ];

    public function gratis()
    {
        return $this->belongsTo(adminkelas::class, 'products_id','id');
    }

    public function getVideoAttribute($value)
    {
        return url('storage/'.$value);
    }
}
