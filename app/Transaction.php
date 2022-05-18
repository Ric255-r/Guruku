<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tfid','name','email','number','bukti','transaction_total','user_id','mentor_id'
    ];
    protected $hidden = [

    ];

    public function siswa()
    {
        return $this->belongsTo(Kelas::class,'murid','transaction_id');
    }
    public function details()
    {
        return $this->hasMany(TransactionDetail::class,'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function detailpengguna()
    {
        return $this->hasMany(TransactionDetail::class,'user_id');
    }

    public function getVBukiAttribute($value)
    {
        return url('storage/'.$value);
    }
}
