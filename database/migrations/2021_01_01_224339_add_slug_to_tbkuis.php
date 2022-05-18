<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToTbkuis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbkuis', function (Blueprint $table) {
            $table->string('tingkatan')->after('topic');
            $table->string('slug')->after('status');
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
            $table->dropColumn('tingkatan');
            $table->dropColumn('slug');
        });
    }
}
