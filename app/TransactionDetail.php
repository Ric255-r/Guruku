<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transaction_id','products_id','user_id'
    ];
    protected $hidden = [

    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Kelas::class,'products_id','id');
        //ini awalnya id
    }


    public function det()
    {
        return $this->hasMany(Kelas::class, 'products_id');
    }

    public function video()
    {
    return $this->hasMany(Video::class, 'products_id');
    }

    public function viddetails()
    {
        return $this->hasMany(VideoDetails::class, 'products_id');
    }

    // public function bayar()
    // {
    //     return $this->belongsTo(Kelas::class, 'products_id', 'id');
    // }

    public function detailuser()
    {
        return $this->belongsTo(Transaction::class, 'user_id','id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'kelas_id','products_id');
    }

    public function getBuktiAttribute($value)
    {
        return url('storage/'.$value);
    }
}
