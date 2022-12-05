<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('j_keretas', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('kereta_id')->references('id')->on('keretas');
            $table->foreignId('from_id')->references('id')->on('stasiuns');
            $table->foreignId('to_id')->references('id')->on('stasiuns');
            $table->date('jadwal');
            $table->time('jam');
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
        Schema::dropIfExists('j_keretas');
    }
};
