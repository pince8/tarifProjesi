<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('adsoyad');
            $table->string('meslek'); 
            $table->text('adress'); 
            $table->string('phone_number'); 
            $table->string('email');
            $table->string('password'); 
            $table->json('yemekler'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
