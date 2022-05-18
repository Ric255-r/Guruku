<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinDetail extends Model
{
    protected $table = 'join_details';
    protected $fillable = [
        'join_id','products_id','user_id'
    ];

    public function join()
    {
        return $this->belongsTo(Join::class,'join_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Kelas::class,'products_id','id');
        //ini awlnya id
    }

    public function video()
    {
        return $this->hasMany(Video::class, 'products_id');
    }

    public function detailuser()
    {
        return $this->belongsTo(Join::class, 'user_id','id');
    }

}
