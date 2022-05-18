<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelKuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbkuis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kuis');
            $table->longText('deskripsi');
            $table->string('mentor_id');
            $table->string('kategori');
            $table->string('topic');
            $table->string('jenis');
            $table->string('kelas_id')->nullable();
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
        Schema::dropIfExists('tbkuis');
    }
}
