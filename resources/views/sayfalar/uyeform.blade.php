<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/app.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .form-control {
        margin-bottom: 15px;
    }

    button {
        padding: 10px 15px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;

        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        font-size: 16px;
    }

    .alert.alert-danger {
        color: #ff0000;
        /* Red color */
        background-color: #f8d7da;
        /* Light red background */
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-top: 10px;
        text-align: center;
    }

    .alert.alert-success {
        background-color: #d4edda;
        /* Açık yeşil arka plan */
        color: #155724;
        /* Koyu yeşil yazı rengi */
        border-color: #c3e6cb;
        /* Yeşil kenar rengi */
        padding: 10px;

        border-radius: 5px;
        margin-top: 10px;

    }
</style>
<main class="content">
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Üye Olun!</h1>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                @if($errors->any())
                @foreach($errors->all() as $hatalar)
                <div class="alert alert-danger">{{$hatalar}}</div>
                @endforeach
                @endif

                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <form action="{{ route('kullanici-ekle-post') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Bilgiler</h5>
                        </div>
                        <div class="card-body">
                            Adınız Soyadınız:<br>
                            <input type="text" name="adsoyad" class="form-control" placeholder="Ad Soyad">
                            Meslek:<br>
                            <input type="text" name="meslek" class="form-control" placeholder="Meslek">
                            Adres:<br>
                            <input type="text" name="adres" class="form-control" placeholder="Adres">
                            Telefon:<br>
                            <input type="text" name="telefon" class="form-control" placeholder="Telefon">
                            Mail:<br>
                            <input type="text" name="mail" class="form-control" placeholder="Mail">
                            Şifre:
                            <input type="text" name="sifre" class="form-control" placeholder="Şifre">

                        </div>
                    </div>



            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <!-- Checkbox Card -->
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sevdiğim Türler</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-3">
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Çorbalar">
                                <span class="form-check-label">
                                    Çorbalar
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Ana Yemekler">
                                <span class="form-check-label">
                                    Ana Yemekler
                                </span>
                            </label>

                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Deniz Ürünleri">
                                <span class="form-check-label">
                                    Deniz Ürünleri
                                </span>
                            </label>

                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Hamur İşleri">
                                <span class="form-check-label">
                                    Hamur İşleri
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Salatalar">
                                <span class="form-check-label">
                                    Salatalar
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Sütlü Tatlılar">
                                <span class="form-check-label">
                                    Sütlü Tatlılar
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Şerbetli Tatlılar">
                                <span class="form-check-label">
                                    Şerbetli Tatlılar
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Hamur Tatlıları">
                                <span class="form-check-label">
                                    Hamur Tatlıları
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Meyveli Tatlılar">
                                <span class="form-check-label">
                                    Meyveli Tatlılar
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Pastalar">
                                <span class="form-check-label">
                                    Pastalar
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" name="yemek_turleri[]" type="checkbox" value="Kek">
                                <span class="form-check-label">
                                    Kek
                                </span>
                            </label>

                        </div>
                    </div>

                </div>
                <button type="submit">Üye Ol</button>
            </div>
        </div>

    </div>


    </div>
    </div>

    </div>
</main>