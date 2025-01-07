<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarifekles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->string('image_path'); // Yemeğin fotoğrafı için
            $table->string('yemekadi');   // Yemeğin adı
            $table->text('tarifi');       // Yapılışı
            $table->text('icindekiler');  // İçindekiler
            $table->enum('tarif_turu', ['Tatlı', 'Yemek']); // Tarif türü (Tatlı/Yemek)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarifekles');
    }
};
