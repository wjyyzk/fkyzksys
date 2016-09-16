<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hinban1');
            $table->string('search_hinban');
            $table->string('seppenfugou');
            $table->string('name');
            $table->boolean('ac');
            $table->boolean('cf');
            $table->boolean('other');
            $table->string('hinban2');
            $table->string('zuuban');
            $table->string('gyousha');
            $table->integer('unit_price');
            $table->integer('stock_curr');
            $table->integer('stock_prev');
            $table->string('shiyougaki');
            $table->string('shashu');
            $table->string('bui');
            $table->string('lock');
            $table->string('comment');
            $table->string('pic');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('storage');
    }
}
