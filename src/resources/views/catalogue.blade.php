@extends("layouts.app")

@section("content")
<div class="d-flex flex-column flex-lg-row">
	<div class="pt-4 bg-light d-flex align-items-center flex-column flex-lg-2 border">
		@if (\Request::route()->getName() == "catalogueParCategorie")
		<h4 class="text-secondary">{{ $categorie->nom }}</h4>
		<a href="/index.php/categories">Retour</a>
		<p class="mt-5 text-secondary">{{ count($produits) }} produit(s) correspondants</p>
		@endif
		<div class="d-flex bg-white py-2 align-self-stretch flex-column align-items-center border-top border-bottom">
			<div class="mx-3">
				<p class="form-text text-secondary">Trier par:</p>
			</div>
			<div class="flex-grow-1 me-3">
				<select class="form-select">
					<option value="price_asc">Prix (Bas - Haut)</option>
					<option value="price_desc">Prix (Haut - Bas)</option>
				</select>
			</div>
		</div>
		
		<div class="bg-white mx-3 my-2 d-flex justify-content-center align-items-center col-6" style="height: 300px; width: 200px;">
			<p class="text-secondary">Filters placeholder</p>
		</div>
	</div>

	<div class="p-2 d-flex flex-wrap">
		@foreach ($produits as $produit)
		<div class="d-flex bg-light flex-column pb-2 m-4 w-25">
			<a href="/index.php/produit/{{ $produit->id }}" class="p-2 border-bottom border-dark " style="min-height: 30vh ;max-height: 30vh; overflow: hidden;">
				@if (is_null($produit->image))
				<img class="img-fluid" src="{{ asset('images/placeholder.webp') }}"></img>
				@else
				<img class="img-fluid" src="{{ asset($produit->image->chemin) }}"></img>
				@endif
			</a>
			<a href="/index.php/produit/{{ $produit->id }}" class="ps-2 pt-2 m-0 text-decoration-none text-muted">{{ $produit->nom }}</a>
			<p class="ps-2 mb-3 text-secondary m-0">${{ $produit->prix }} / unité</p>
			<div class="d-flex flex-column flex-lg-row m-2">
				<button class="btn btn-primary" onclick="addToCart({{ $produit->id }})">Ajouter au panier</button>
				<a class="btn btn-primary" href="/index.php/produit/{{$produit->id}}" role="button">Voir detail</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
<script>
function incrementInput(inputId) {
	let input = document.getElementById(inputId);
	input.value++;
}

function decrementInput(inputId) {
	let input = document.getElementById(inputId);
	input.value--;
}
</script>
@endsection
