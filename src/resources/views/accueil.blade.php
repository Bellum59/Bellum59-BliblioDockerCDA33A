@extends("layouts.app")

@section("content")

<style>
.banner {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.banner img {
    object-fit: cover;
    width: 100%;
    height: 600px;
}

.banner-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    padding: 20px;
    border-radius: 5px;
    max-width: 400px;
    width: 90%;
}

.card {
    text-align: center;
}

@media (max-width: 768px) {
    .hide-on-mobile {
        display: none;
    }
}
</style>

<div class="banner mb-5">
    <img src="https://www.infirmerie-protestante.com/sites/default/files/2022-05/bg_laboratoire-biologie.jpg" alt="Banner Image">
    <div class="banner-content">
        <div class="card">
            <h1>Bienvenue sur Chimax Store</h1>
            <p class="">Chimax Store est votre destination incontournable pour l'approvisionnement en produits chimiques de haute qualité et en équipements spécialisés.</p>
            <a class="pb-2 btn fw-bold nav-link{{ (request()->is('/mission')) ? ' active border-bottom border-2 border-dark' : '' }}" href="/index.php/mission">En Savoir Plus</a>
        </div>
    </div>
</div>

<div class="mx-4 my-4 row">
	
	@foreach ($produits as $produit)
	<div class="col-md-3 col-sm-6 col-12 d-flex">
        <div class="card mb-3 d-flex">
			@if (is_null($produit->image))
			<img class="card-img-top img-fluid" style="min-height: 30vh ;max-height: 30vh; overflow: hidden;" src="{{ asset('images/placeholder.webp') }}"></img>
			@else
			<img class="card-img-top img-fluid" style="min-height: 30vh ;max-height: 30vh; overflow: hidden;" src="{{ asset($produit->image->chemin) }}">
			@endif
            <div class="card-body">
                <h5 class="card-title">{{ $produit->nom }}</h5>
                <p class="card-text hide-on-mobile">{{ $produit->description }}</p>
                <a href="/index.php/produit/{{ $produit->id }}" class="btn btn-primary">Voir l'article</a>
                <p class="card-text">Prix: ${{ $produit->prix }}</p>
            </div>
        </div>
    </div>
	@endforeach

</div>

@endsection
