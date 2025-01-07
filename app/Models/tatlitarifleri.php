<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TatliTarifleri extends Model
{
    use HasFactory;
   
    protected $table = 'tatlitarifleris';

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
