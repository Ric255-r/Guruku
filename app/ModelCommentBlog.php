<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCommentBlog extends Model
{
    protected $table = 'comment_blog';
    protected $fillable = [
        'id_blog', 'id_user', 'pesan', 'likes', 'blog_slug', 'status_user','status_mentor'
    ];
}
