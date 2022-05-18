<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbsoal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_kuis');
            $table->string("soal");
            $table->string("Pilihan_A");
            $table->string("Pilihan_B");
            $table->string("Pilihan_C");
            $table->string("Pilihan_D");
            $table->string("jawaban_benar");
            $table->string("number");
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
        Schema::dropIfExists('tbsoal');
    }
}
