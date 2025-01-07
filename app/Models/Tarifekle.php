<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifekle extends Model
{
    use HasFactory;

    protected $table = 'tarifekles';

    protected $fillable = [
        'user_id',
        'image_path',   // Yemeğin fotoğrafı
        'yemekadi',     // Yemeğin adı
        'icindekiler',  // İçindekiler
        'tarifi',       // Yapılışı
        'tarif_turu',   // Tarif türü (Tatlı/Yemek)
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}
