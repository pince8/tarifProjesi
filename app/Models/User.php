<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'adsoyad',
        'meslek',
        'adress',
        'phone_number',
        'email',
        'password',
        'yemekler',
    ];

    // Yemekler alanını diziye dönüştür
    protected $casts = [
        'yemekler' => 'array',
    ];

    // Gizli alanlar
    protected $hidden = [
        'password',
        
    ];
      // Kullanıcının tariflerini dönen ilişki
      public function tarifler()
      {
          return $this->hasMany(Tarifekle::class, 'user_id');
      }

      
}
