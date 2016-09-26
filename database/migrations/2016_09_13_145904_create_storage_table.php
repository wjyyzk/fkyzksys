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
            $table->string('hinban', 50);
            $table->string('seppenfugou', 10)->nullable();
            $table->string('name', 100);
            $table->boolean('af')->default(0);
            $table->boolean('cf')->default(0);
            $table->boolean('other')->default(0);
            $table->string('chikouguhinban', 50);
            $table->string('zuuban', 20)->nullable();
            $table->string('gyousha', 20)->nullable();
            $table->integer('unit_price');
            $table->integer('stock');
            $table->integer('stock_secondhand');
            $table->string('shashu', 20)->nullable();
            $table->string('bui', 20)->nullable();
            $table->string('lock', 20)->nullable();
            $table->string('comment')->nullable();
            $table->string('pic', 50)->nullable();
            $table->string('who', 10)->nullable();
            $table->string('file1', 100)->nullable();
            $table->string('file2', 100)->nullable();
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
