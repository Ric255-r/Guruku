<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKuis extends Model
{
    protected $table = 'tbkuis';
    protected $fillable = ['gambar','nama_kuis','deskripsi','mentor_id','kategori','topic','tingkatan','status','jenis','kelas_id','slug'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id','id');
    }

}
