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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('email',100);
            $table->string('password',100);
            $table->tinyInteger('is_verif')->default(0);
            $table->string('sosmed',100);
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('order'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
