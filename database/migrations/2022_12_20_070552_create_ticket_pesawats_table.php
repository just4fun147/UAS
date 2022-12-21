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
        Schema::create('ticket_pesawats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('asal')->references('id')->on('kotas');
            $table->foreignId('tujuan')->references('id')->on('kotas');
            $table->string('status');
            $table->date('jadwal_keberangkatan');
            $table->date('jadwal_tiba');
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
        Schema::dropIfExists('ticket_pesawats');
    }
};
