<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gambaradminguru extends Model
{
    protected $table = "gambaradminguru";
    protected $fillable = ['file','keterangan','kategori','namamentor','hari','jam','deskripsi'];
}
