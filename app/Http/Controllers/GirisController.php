<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\uyeol;
use App\Models\tarifekle;
use App\Models\tatlitarifleri;
use App\Models\yemektarifleri;
use App\Models\User;

class GirisController extends Controller
{

    public function girisYap(Request $request)
    {   
        // Herhangi bir oturum varsa önce çıkış yap
        Auth::logout();
       
        // CSRF token'ı ve oturum verilerini yenile
        $request->session()->invalidate();
        $request->session()->regenerateToken();
       
        // Giriş yapmaya çalışılan kullanıcıyı bul
        $validatedData = $request->validate([
            'email' => 'required|email', 
            'password' => 'required|string|min:6', 
        ]);
        
        $user = User::where('email', $request->email)->first();
      
        if (!$user) {
            return redirect()->back()->withErrors(['mail' => 'Bu email ile bir kullanıcı bulunamadı.']);
        }
    
        if (Hash::check($request->password, $user->password)) {
            // Yeni kullanıcıyı giriş yap
            Auth::login($user);
            
            return redirect()->route('profil')->with('success', 'Giriş başarılı!')->withInput();
        } else {
            return redirect()->back()->withErrors(['password' => 'Geçersiz şifre.']);
        }
    }


    
    public function uyeEkle(Request $request){
        try {
            $validatedData = $request->validate([
                'adsoyad' => 'required|string|max:255',
                'meslek' => 'required|string|max:255',
                'adres' => 'required|string|max:255',
                'telefon' => 'required|string|max:15',
                'mail' => 'required|email|unique:users,mail',
                'sifre' => 'required|string|min:8|confirmed',
                'yemek_turleri' => 'nullable|array',
            ]);
            
            $validatedData['sifre'] = Hash::make($request->sifre);
            $validatedData['yemek_turleri'] = json_encode($request->yemek_turleri);
            
            
            uyeol::create($validatedData);
            
        return redirect()->route('profil')->with('success','Kullanıcı bilgileri başarıyla eklendi.');
    } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }


    public function tarifEkle(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'image_path' => 'required|image',
            'yemekadi' => 'required|string|max:255',
            'icindekiler' => 'required|array|min:1',
            'tarifi' => 'required|string',
            'tarif_turu' => 'required|in:Tatlı,Yemek',
           
        ]);
        
        // Eğer dosya yükleniyorsa
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
        $imagePath = 'img/photos/' . $file->getClientOriginalName(); // Dosya adını burada belirliyoruz
        // Dosyayı public/img/photos dizinine kaydediyoruz
        $file->move(public_path('img/photos'), $file->getClientOriginalName());
        } else {
            $imagePath = null;
        }
       
        Tarifekle::create([
            'user_id' => $user->id, // Kullanıcı ID'sini burada ekliyoruz
            'image_path' => $imagePath,
            'yemekadi' => $request->yemekadi,
            'icindekiler' => json_encode($request->icindekiler),
            'tarifi' => $request->tarifi,
            'tarif_turu' => $request->tarif_turu,
        ]);
        
    // Tarif türüne göre kaydetme
    if ($request->tarif_turu == 'Yemek') {
        YemekTarifleri::create([ // Yemek tarifleri tablosuna kaydediyoruz
            'user_id' => $user->id, // Kullanıcı ID'sini burada ekliyoruz
            'image_path' => $imagePath,
            'yemekadi' => $request->yemekadi,
            'icindekiler' => json_encode($request->icindekiler),
            'tarifi' => $request->tarifi,
           
        ]);
    } elseif ($request->tarif_turu == 'Tatlı') {
        TatliTarifleri::create([ // Tatlı tarifleri tablosuna kaydediyoruz
            'user_id' => $user->id, // Kullanıcı ID'sini burada ekliyoruz
            'image_path' => $imagePath,
            'yemekadi' => $request->yemekadi,
            'icindekiler' => json_encode($request->icindekiler),
            'tarifi' => $request->tarifi,
           
        ]);
    }
        return redirect()->route('tarifEkle')->with('success', 'Tarifiniz başarıyla eklendi.');
    }



   



public function profil()
{
    // Auth::user() ile giriş yapmış olan kullanıcıyı alır
    $user = Auth::user();
    
    // Eğer kullanıcı oturum açmamışsa, giriş yapması için yönlendirir
    if ($user == false ) {
        return redirect()->route('sayfalar.giris')->withErrors('Lütfen giriş yapınız.');
    }
    // Kullanıcının 'yemek_turleri' alanını JSON formatından diziye dönüştürür
    $yemekTurleri = json_decode($user->yemekler, true);

    $tarifler = Tarifekle::where('user_id', $user->id)->get();

    // Kullanıcı bilgilerini ve yemek türlerini Blade şablonuna geçirir
    return view('sayfalar.profil', [
        'user' => $user, // Kullanıcı bilgileri
        'yemekTurleri' => $yemekTurleri // Kullanıcının yemek türleri
        
    ]);

}

public function logout(Request $request)
{
    Auth::logout(); // Kullanıcıyı çıkış yap
    $request->session()->invalidate(); // Oturumu geçersiz kıl
    $request->session()->regenerateToken(); // CSRF token'i yenile
    
    return redirect()->route('giris')->with('success', 'Başarıyla çıkış yaptınız!'); // Giriş sayfasına yönlendir
}

public function create() {
    $user = auth()->user();  // Giriş yapmış kullanıcıyı al
    return view('welcome', compact('user'));  // Blade şablonuna 'user' değişkenini gönder
}

}