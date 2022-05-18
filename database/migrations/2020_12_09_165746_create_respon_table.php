<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_blog');
            $table->string('nama_user');
            $table->string('email');
            $table->longText('komen');
            $table->string('author');
            $table->string('author_id');
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
        Schema::dropIfExists('respon');
    }
}
