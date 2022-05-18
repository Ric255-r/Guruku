<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';
    protected $fillable = [
        'namabank','file'
    ];

    public function benk()
    {
        return $this->hasMany(User::class, 'bank');
    }
}
