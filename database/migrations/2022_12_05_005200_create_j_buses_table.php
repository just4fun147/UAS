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
        Schema::create('j_buses', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('bus_id')->references('id')->on('buses');
            $table->foreignId('from_id')->references('id')->on('terminals');
            $table->foreignId('to_id')->references('id')->on('terminals');
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
        Schema::dropIfExists('j_buses');
    }
};
