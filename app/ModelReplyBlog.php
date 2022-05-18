<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelReplyBlog extends Model
{
    protected $table = 'reply_blog';
    protected $fillable = [
        'id_blog', 'id_comment', 'id_user', 'pesan', 'likes', 'blog_slug', 'status_user','status_mentor'
    ];
}

