<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmark';
    protected $fillable = [
        'blog_id','user_id','status'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id','slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
