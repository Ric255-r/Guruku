<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasbaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelasbaru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->string('kelas');
            $table->string('slug');
            $table->string('deskripsi');
            $table->string('harga'); //nullable untuk gratis
            $table->string('murid')->default('0'); //jadi integer
            $table->string('jenis');
            $table->string('kategori');
            $table->enum('tingkat',array('Pemula','Lanjutan','Semua Tingkatan'));
            $table->string('konsultansi');
            $table->string('sertifikat');
            $table->string('topik');
            $table->string('mentor_id');
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
        Schema::dropIfExists('kelasbaru');
    }
}
