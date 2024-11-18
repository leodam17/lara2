<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('nama_quest',100);
            $table->integer('harga');
            $table->date('tanggal_pesan');
            $table->date('tanggal_selesai');
            $table->integer('deadline');
            $table->string('keterangan',100);
            $table->unsignedBigInteger('listquest_id');
            $table->foreign('listquest_id')->references('id')->on('listquest'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
