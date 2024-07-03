<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stok_id');
            $table->foreign('stok_id')->references('id')->on('stok_gudangs');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
