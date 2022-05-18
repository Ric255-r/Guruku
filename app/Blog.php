<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = [
        'id','file','title','slug','subtitle','isi','kategori','topik','jenis','kelas_id','author','author_id','status','publish_date'
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'author_id','kode_mentor');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id','id');
    }

    public function transaction()
    {
        return $this->hasMany(TransactionDetail::class, 'products_id');
    }

    public function book()
    {
        return $this->hasMany(Bookmark::class, 'blog_id');
    }

    public function komentar()
    {
        return $this->hasMany(ModelCommentBlog::class, 'id_blog', 'id')->where('status_mentor','=','unchecked');
    }

    public function balasan()
    {
        return $this->hasMany(ModelReplyBlog::class, 'id_blog', 'id')->where('status_mentor', '=', 'unchecked');
    }
}
