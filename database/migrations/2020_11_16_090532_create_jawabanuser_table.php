<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabanuser', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("mapel_kuis");
            $table->string("kuis_kode_guru");
            $table->string("nama_user");
            $table->string("id_soal");
            $table->string("jawaban_user");
            $table->string("status_nilai")->nullable();
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
        Schema::dropIfExists('jawabanuser');
    }
}
