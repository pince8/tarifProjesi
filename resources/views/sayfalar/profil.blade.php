@extends('welcome')
@section('govde')
<main class="content" id="test123">
    <div class="container-fluid p-0">
        <div class="mb-3">
            
            <h1 class="h3 d-inline align-middle">Profilim</h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                    </div>
                    <div class="card-body text-center">
                        <img src="img/avatars/resim1.png" alt="Profile Picture" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0">{{ $user->adsoyad }}</h5>
                        <div class="text-muted mb-2">{{ $user->meslek }}</div>
                      
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Sevdiğim Türler</h5>
                        @foreach ($yemekTurleri as $tur)
                            <a href="#" class="badge bg-primary me-1 my-1">{{ $tur }}</a>
                        @endforeach
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Hakkında</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span>Adres: {{ $user->adress }}</li>
                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Mail: {{ $user->email }}</li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span>Telefon: {{ $user->phone_number }}</li>
                        </ul>
                    </div>
                    <hr class="my-0" />
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">Tariflerim</h1>
                    </div>
                    <div class="row">

                    @foreach($tarifler as $tarif)
                    
                        <div class="col-12 col-md-4">
                            <div class="card">
                            <a href="{{ route('recipe.show', $tarif->id) }}">
                            <img class="card-img-top" src="{{ asset( $tarif->image_path) }}" alt="{{ $tarif->yemekadi }}">
                            </a>
                                <div class="card-header">
                                    <h5 class="card-title mb-0">{{ $tarif->yemekadi }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Bu tarif {{ $user->adsoyad }} tarafından oluşturulmuştur. Tarifi görmek için resme tıklayınız.</p>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection