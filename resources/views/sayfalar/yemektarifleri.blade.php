<!-- resources/views/recipes/food.blade.php -->
@extends('welcome')
@section('govde')
<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Yemek Tarifleri</h1>
        </div>
        <div class="row">
            @foreach($foodRecipes as $recipe)
            <div class="col-12 col-md-4">
                <div class="card mb-3">
                    <a href="{{ route('recipe.show.yemek', $recipe->id) }}">
                        <img class="card-img-top" src="{{ asset($recipe->image_path) }}" alt="{{ $recipe->yemekadi }}">
                    </a>



                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $recipe->yemekadi }}</h5>
                    </div>
                    <div class="card-body">
                        Bu tarif {{ $recipe->user ? $recipe->user->adsoyad : 'Bilinmeyen Kullanıcı' }} tarafından oluşturulmuştur.
                        Tarifi görmek için resme tıklayınız.
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection