<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\User;
use App\Models\Tarifekle;
class ProfileController extends Controller
{

    public function show()
{
    // Oturum açmış olan kullanıcıyı al
    $user = Auth::user();
    
    // Kullanıcının profil bilgilerini getir
    $profile = User::where('id', $user->id)->first();  
    
    // Eğer profil bilgisi yoksa, kullanıcıya hata mesajı döndür
    if (!$profile) {
        return redirect()->route('giris')->with('error', 'Profil bulunamadı.');
    }
    
    // Kullanıcının yemek türlerini al (yemek_turleri JSON formatında olabilir)
    $yemekTurleri = json_decode($profile->yemekler, true);
    
    // Yemek türleri boş veya null ise boş array yap
    if (!$yemekTurleri) {
        $yemekTurleri = [];
    }
   
    // Kullanıcının tariflerini al
    $tarifler = Tarifekle::where('user_id', $user->id)->get(); 
    // Verileri Blade şablonuna gönder
    return view('sayfalar.profil', [
        'user' => $profile, // Kullanıcı profili
        'yemekTurleri' => $yemekTurleri, // Yemek türleri
        'tarifler' => $tarifler // Kullanıcının tarifleri
    ]);
  
}


public function showUsers()
{
    // Tüm kullanıcıları al
    $users = User::all();

    // Verileri Blade şablonuna gönder
    return view('sayfalar.kullanicilar', compact('users')); // Blade'e gönderiyoruz
}


}