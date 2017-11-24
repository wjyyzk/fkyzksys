<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeStorageOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('T_storage_out', function (Blueprint $table) {
            $table->tinyInteger('hinban_type')->after('storage_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('T_storage_out', function (Blueprint $table) {
            $table->dropColumn('hinban_type');
        });
    }
}
