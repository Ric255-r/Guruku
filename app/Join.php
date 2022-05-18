<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $table = 'join';
    protected $fillable = [
        'name','email','user_id'
    ];

    public function details()
    {
        return $this->hasMany(JoinDetail::class,'join_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function detailpengguna()
    {
        return $this->hasMany(JoinDetail::class,'user_id');
    }
}
