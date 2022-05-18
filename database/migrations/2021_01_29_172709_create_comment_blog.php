<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_blog');
            $table->string('id_user');
            $table->longText('pesan');
            $table->integer('likes')->unsigned()->nullable();
            $table->string('blog_slug');
            $table->string('status_user')->default('unchecked');
            $table->string('status_mentor')->default('unchecked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_blog');
    }
}
