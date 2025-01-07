<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GirisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\KullaniciController;

Route::get('/', function () {
    return view('sayfalar.giris');
})->name('home');

Route::get('/giris', function () {
    return view('sayfalar.giris');
})->name('giris');

Route::get('/tarifekle', function () {
    return view('sayfalar.tarifEkle');
})->name('tarifEkle');

Route::post('/tarif-ekle-post', [GirisController::class, 'tarifEkle'])->name('tarif-ekle-post'); // POST metodu veriyi işlemek için

Route::get('/yemektarifleri', function () {
    return view('sayfalar.yemektarifleri');
})->name('yemektarifleri');

Route::get('/tatlitarifleri', function () {
    return view('sayfalar.tatlitarifleri');
})->name('tatlitarifleri');

Route::get('/uyeolun', function () {
    return view('sayfalar.uyeform');
})->name('uyeform');


Route::post('/giris-yap', [GirisController::class, 'girisYap'])->name('giris-yap');

Route::get('/profil', [ProfileController::class, 'show'])->name('profil');

Route::post('/kullanici-ekle-post',[KullaniciController::class,'store'])->name('kullanici-ekle-post');

Route::get('/kullanicilar', [ProfileController::class, 'showUsers'])->name('kullanicilar');

Route::get('/sweet-recipes', [RecipeController::class, 'showSweetRecipes'])->name('recipes.sweet');

Route::get('/food-recipes', [RecipeController::class, 'showFoodRecipes'])->name('recipes.food');


// Logout route'u
Route::get('/logout', [GirisController::class, 'logout'])->name('logout');

//Tarif Detaylarını Gösteren Route

Route::get('/recipe/yemek/{id}', [RecipeController::class, 'showYemek'])->name('recipe.show.yemek');
Route::get('/recipe/tatli/{id}', [RecipeController::class, 'showTatli'])->name('recipe.show.tatli'); 

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');






