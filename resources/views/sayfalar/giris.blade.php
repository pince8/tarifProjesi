

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .alert.alert-danger.mt-2 {
        color: #ff0000; /* Red color */
        background-color: #f8d7da; /* Light red background */
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-top: 10px;
        text-align: center;
    }
    .alert.alert-success {
    color: #155724; /* Koyu yeşil */
    background-color: #d4edda; /* Açık yeşil */
    border-color: #c3e6cb; /* Yeşil bordür */
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
    text-align: center;
}
</style>
</head>
<main class="d-flex w-100" id="test1">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <!-- Giriş formu başlangıcı -->

                    <form action="{{ route('giris-yap') }}" method="POST">
                        @csrf
                        <div class="text-center mt-4">
                            <h1 class="h2">Hoşgeldiniz!</h1>
                            <p class="lead">
                                Devam etmek için hesabınızda oturum açın
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required />
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required />
                                </div>
                                <div>
                                <div class="form-check align-items-center">
                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                                </div>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                <!-- Submit butonu -->
                                <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Giriş formu sonu -->
                    <div class="text-center mb-3">
                        Hesabınız yok mu? <a href="{{ route('uyeform') }}">Sign up</a>
                    </div>

                    <!-- Hata mesajı -->
                    @if (session('error'))
                        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success mt-2">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>