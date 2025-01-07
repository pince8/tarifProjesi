<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kullanicilar extends Model
{
    use HasFactory;
    protected $fillable=[
        'adsoyad',
        'meslek',
        'yemekler',
        'adress',
        'mail',
        'phone_number'
    ];
    protected $casts = [
        'yemekler' => 'array',
    ];
}
