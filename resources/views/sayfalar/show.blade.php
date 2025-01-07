<style>
.btn-danger {
    font-size: 2rem; /* Boyutunu arttıralım */
    line-height: 1;
    padding: 5px 10px; /* Buton iç boşlukları */
    
    text-align: center;
    display: inline-block;
    position: absolute; /* Çarpı işaretini sayfa üzerinde sabitleyelim */
    top: 10px; /* Sayfanın üstünden 10px aşağıda */
    right: 10px; /* Sayfanın sağından 10px içeride */
    z-index: 10; /* Diğer elementlerin üzerinde olması için z-index verelim */
    background-color: red; /* Rengi belirginleştirelim */
    color: white; /* Beyaz çarpı işareti */
    border: none; /* Sınırları kaldır */
}

main.content {
    height: 100vh; /* Ekranın tamamını kaplasın */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: #f8f9fa;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 15px;
    max-width: 800px; /* Kart genişliği */
    width: 100%; /* Mobil uyumluluğu */
    padding: 20px;
}

.card img {
    border-radius: 10px;
    margin-top: 60px; /* Resmi biraz aşağıya alalım */
}

h2, h4 {
    color: #333;
}
</style>

<main class="content d-flex justify-content-center align-items-center">
    <div class="card w-75">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">&times;</a>
            </div>
            <h2 class="card-title">{{ $recipe->yemekadi }}</h2>
            <img src="{{ asset($recipe->image_path) }}" alt="{{ $recipe->yemekadi }}" class="img-fluid mb-4" style="max-height: 400px; object-fit: cover; width: 100%;">

            <h4>İçindekiler:</h4>
            <ul>
                @foreach(json_decode($recipe->icindekiler, true) as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>

            <h4>Tarif:</h4>
            <p>{{ $recipe->tarifi }}</p>
        </div>
    </div>
</main>
