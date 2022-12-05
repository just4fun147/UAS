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
        Schema::create('j_pesawats', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('pesawat_id')->references('id')->on('pesawats');
            $table->foreignId('from_id')->references('id')->on('bandaras');
            $table->foreignId('to_id')->references('id')->on('bandaras');
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
        Schema::dropIfExists('j_pesawats');
    }
};
