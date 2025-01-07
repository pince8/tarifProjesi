<?php


namespace App\Http\Controllers;

use App\Models\SweetRecipe;
use App\Models\FoodRecipe;
use App\Models\TatliTarifleri;
use App\Models\YemekTarifleri;
use App\Models\Tarifekle;

class RecipeController extends Controller
{
    public function showSweetRecipes()
    {
        // Tatlı tariflerini al
        $sweetRecipes = tatlitarifleri::all();

        return view('sayfalar.tatlitarifleri', compact('sweetRecipes'));
    }

    public function showFoodRecipes()
    {
       
        // Yemek tariflerini al
        $foodRecipes = yemektarifleri::all();
       
        return view('sayfalar.yemektarifleri', compact('foodRecipes'));
       
    }

 public function showYemek($id)
    {
        $recipe = YemekTarifleri::where('id', $id)->firstOrFail();
        return view('sayfalar.show', compact('recipe'));
        
    }
    public function showTatli($id)
    {
        // Tatlı türüne göre kontrol et
        $recipe = TatliTarifleri::where('id', $id)->firstOrFail();
        return view('sayfalar.show', compact('recipe'));
    }

    public function show($id)
{
    $recipe = Tarifekle::where('id', $id)->firstOrFail();
    return view('sayfalar.show', compact('recipe'));
}
    }




