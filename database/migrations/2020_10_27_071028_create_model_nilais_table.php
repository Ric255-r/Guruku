<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbnilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_kuis');
            $table->string('id_user');
            $table->integer('nilai_awal')->unsigned();
            $table->integer('nilai_akhir')->unsigned()->nullable();
            $table->time('waktukerja_awal');
            $table->time('waktukerja_akhir')->nullable();
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
        Schema::dropIfExists('tbnilai');
    }
}
