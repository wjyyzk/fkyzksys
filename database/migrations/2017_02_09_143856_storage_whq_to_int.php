<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StorageWhqToInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storage', function (Blueprint $table) {
            $table->integer('whq')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storage', function (Blueprint $table) {
            $table->string('whq', 10)->nullable();
        });
    }
}
