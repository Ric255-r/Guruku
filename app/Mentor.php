<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;

class Mentor extends Model
{
    protected $table = 'mentor';
    //protected $primaryKey = 'id';
    protected $fillable = [
        'user_id','file','bidang','deskripsi','github_profile','dribbble_profile'
    ];
    protected $dates = ['created_at'];
    protected $hidden = [

    ];

    public function men()
    {
        return $this->hasMany(Kelas::class);
        //return $this->hasMany(Video::class, 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
