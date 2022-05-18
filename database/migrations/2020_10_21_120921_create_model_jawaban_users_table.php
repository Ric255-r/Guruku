<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelJawabanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbjawabanuser', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("id_kuis");
            $table->string("id_user");
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
        Schema::dropIfExists('tbjawabanuser');
    }
}
