<!-- resources/views/recipes/sweet.blade.php -->
@extends('welcome')

@section('govde')
<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Tatlı Tarifleri</h1>
        </div>
        <div class="row">

            @foreach($sweetRecipes as $recipe)
            <div class="col-12 col-md-4">
                <div class="card mb-3">
                    <a href="{{ route('recipe.show.tatli', $recipe->id) }}">
                        <img class="card-img-top" src="{{ asset($recipe->image_path) }}" alt="{{ $recipe->yemekadi }}">
                    </a>


                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $recipe->yemekadi }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Bu tarif {{ $recipe->user ? $recipe->user->adsoyad : 'Bilinmeyen Kullanıcı' }} tarafından oluşturulmuştur.
                            Tarifi görmek için resme tıklayınız.</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection