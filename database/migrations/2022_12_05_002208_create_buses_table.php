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
        Schema::create('buses', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('from_id')->references('id')->on('kotas');
            $table->foreignId('to_id')->references('id')->on('kotas');
            $table->integer('kelas');
            $table->date('jadwal_keberangkatan');
            $table->string('jam_keberangkatan');
            $table->date('jadwal_tiba');
            $table->string('jam_tiba');
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
        Schema::dropIfExists('buses');
    }
};
