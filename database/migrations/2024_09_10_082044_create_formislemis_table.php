<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('formislemis', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->string('soyad');
            $table->string('meslek');
            $table->string('telefon');
            $table->string('mail');
            $table->string('sifre');
            $table->text('adres');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('formislemis');
    }
};
