<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('stok_gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('harga');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('stok_gudangs');
    }
};
