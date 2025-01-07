<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YemekTarifleri extends Model
{
    use HasFactory;
    

    protected $table = 'yemektarifleris';

    protected $fillable = [
        'yemekadi',
        'user_id',
        'image_path',
        'icindekiler',
        'tarifi',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
