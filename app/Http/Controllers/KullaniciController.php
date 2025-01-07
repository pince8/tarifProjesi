<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Modelinize bağlı olarak import edin

class KullaniciController extends Controller
{
    public function store(Request $request)
    {
                // Form verilerini doğrulama
                $validatedData = $request->validate([
                    'adsoyad' => 'required|string|max:255',
                    'meslek' => 'required|string|max:255',
                    'adres' => 'required|string',
                    'telefon' => 'required|string|max:20',
                    'mail' => 'required|email',
                    'sifre' => 'required|string|min:6',
                    'yemek_turleri' => 'required|array',
                ]);
        
                // Şifreyi hashleme
                $hashedPassword = Hash::make($validatedData['sifre']); // Hashleme işlemi burada yapılıyor
                $validatedData['yemek_turleri'] = json_encode($validatedData['yemek_turleri']); // Yemek türlerini JSON'a çevir
        
                // Yeni kullanıcıyı oluştur
                $user = User::create([
                    'adsoyad' => $validatedData['adsoyad'],
                    'meslek' => $validatedData['meslek'],
                    'adress' => $validatedData['adres'],
                    'phone_number' => $validatedData['telefon'],
                    'email' => $validatedData['mail'],
                    'password' => $hashedPassword, // Doğru değişken burada kullanılıyor
                    'yemekler' => $validatedData['yemek_turleri'], // JSON formatında saklanacak
                ]);
        
                // Başarılı kayıt mesajı ile döndür
                return redirect()->route('giris')->with('success', 'Kayıt başarılı!');
            }
        } 