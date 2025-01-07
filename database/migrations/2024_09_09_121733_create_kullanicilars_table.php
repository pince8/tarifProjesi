<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('kullanicilars', function (Blueprint $table) {
           
            $table->id();
            $table->string('name');
            $table->string('meslek');
            $table->json('yemekler');
            $table->text('adress');
            $table->string('mail');
            $table->string('phone_number'); 
            $table->timestamps();
           
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('kullanicilars');
    }
};
