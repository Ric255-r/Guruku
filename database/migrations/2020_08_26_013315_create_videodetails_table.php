<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videodetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('video_id');
            $table->string('products_id');
            $table->string('products_slug');
            $table->string('nama');
            $table->string('file');
            $table->string('number');
            $table->string('status');
            $table->boolean('kuis');
            $table->string('link_kuis');
            $table->boolean('blog');
            $table->string('link_blog');
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
        Schema::dropIfExists('videodetails');
    }
}
