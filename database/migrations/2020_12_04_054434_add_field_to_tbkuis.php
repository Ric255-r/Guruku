<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToTbkuis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbkuis', function (Blueprint $table) {
            $table->string('gambar')->after('id');
            $table->string('status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbkuis', function (Blueprint $table) {
            $table->dropColumn('gambar');
            $table->dropColumn('status');
        });
    }
}
