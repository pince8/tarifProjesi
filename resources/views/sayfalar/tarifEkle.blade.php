@extends('welcome')

@section('govde')

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
    <!-- Form Başlangıcı -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tarif Ekle</h2>
        
                 @if (session('error'))
                        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success mt-2">{{ session('success') }}</div>
                    @endif
        <form action="{{ route('tarif-ekle-post') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <!-- Sol Sütun: Tarif Adı, Fotoğraf ve Yapılış -->
                <div class="col-md-6">
                    <!-- Tarif Adı -->
                    <div class="mb-3 p-3 bg-white shadow-sm rounded">
                        <label for="recipeName" class="form-label">Yemeğin Adı</label>
                        <input type="text" class="form-control" id="recipeName" name="yemekadi" placeholder="Tarif adını girin" required>
                    </div>

                    <!-- Yemeğin Fotoğrafı -->
                    <div class="mb-3 p-3 bg-white shadow-sm rounded">
                        <label for="recipeImage" class="form-label">Yemeğin Fotoğrafı</label>
                        <input type="file" class="form-control" id="recipeImage" name="image_path" required>
                    </div>

                    <!-- Yapılış -->
                    <div class="mb-3 p-3 bg-white shadow-sm rounded">
                        <label for="recipeSteps" class="form-label">Yapılışı</label>
                        <textarea class="form-control" id="recipeSteps" name="tarifi" rows="15" placeholder="Tarifin adımlarını yazın" required></textarea>
                    </div>

                    <!-- Tarif Türü -->
                    <div class="mb-3 p-3 bg-white shadow-sm rounded">
                        <label class="form-label">Tarif Türü</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" id="tatli" name="tarif_turu" value="Tatlı" required>
                                <label class="form-check-label" for="tatli">Tatlı Tarifi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="yemek" name="tarif_turu" value="Yemek" required>
                                <label class="form-check-label" for="yemek">Yemek Tarifi</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sağ Sütun: İçindekiler ve Buton -->
                <div class="col-md-6">
                    <!-- İçindekiler -->
                    <div class="mb-3 p-3 bg-white shadow-sm rounded">
                        <label for="ingredients" class="form-label">İçindekiler</label>
                        <div id="ingredientList">
                            <input type="text" class="form-control mb-2" name="icindekiler[]" placeholder="Malzeme">
                        </div>
                        <button type="button" class="btn btn-outline-primary" id="addIngredient">Malzeme Ekle</button>
                    </div>

                    <!-- Gönder Butonu -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-5">Tarifi Gönder</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript: İçindekilere malzeme ekleme -->
    <script>
        document.getElementById('addIngredient').addEventListener('click', function() {
            var ingredientList = document.getElementById('ingredientList');
            var newIngredient = document.createElement('input');
            newIngredient.type = 'text';
            newIngredient.name = 'icindekiler[]';
            newIngredient.className = 'form-control mb-2';
            newIngredient.placeholder = 'Malzeme';
            ingredientList.appendChild(newIngredient);
        });
    </script>

@endsection
