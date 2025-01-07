<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('uyeols', function (Blueprint $table) {
            $table->id();
            $table->string('adsoyad');
            $table->string('meslek');
            $table->string('adres');
            $table->string('telefon');
            $table->text('mail');
            $table->string('sifre');
            $table->json('yemek_turleri')->nullable();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('uyeols');
    }
};
