

@extends('welcome')
@section('govde')
<style>
    .content {
        background-color:khaki; /* Açık gri renk */
       
        min-height: 100vh;
    }
</style>
<main class="content">
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Kullanıcılar</h1>
        </div>

        <div class="row">
            @foreach ($users as $user)
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <!-- Optional header content -->
                    </div>
                    <div class="card-body text-center">
                        <img src="img/avatars/resim1.png" alt="Profile Picture" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0">{{ $user->adsoyad }}</h5>
                        <div class="text-muted mb-2">{{ $user->meslek }}</div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Sevdiğim Türler</h5>
                     
					
                        @php
    $yemekler = is_array($user->yemekler) ? $user->yemekler : json_decode($user->yemekler, true);
@endphp

@if (is_array($yemekler))
    @foreach ($yemekler as $tur)
        <a href="#" class="badge bg-primary me-1 my-1">{{ $tur }}</a>
    @endforeach
@else
    <p>Yemek türleri bulunamadı.</p>
@endif

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
            @endforeach
        </div>
    </div>
</main>

@endsection
