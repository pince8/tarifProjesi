<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tatlitarifleris', function (Blueprint $table) {
           
         
            $table->unsignedBigInteger('user_id');
            $table->string('yemekadi');
          
            $table->text('icindekiler'); 
            $table->text('tarifi'); 
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tatlitarifleris');
    }
};
