@extends("layouts.app")

@section("content")
<div class="d-flex flex-column flex-md-row">
	<div class="pt-4 bg-light d-flex align-items-center flex-column flex-md-2 border">
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
		@for ($i = 0; $i < 6; $i++)
		<div class="d-flex bg-light flex-column pb-2 m-4 w-25">
			<a href="/index.php/produit/1">
				<img class="p-2 border-bottom border-dark img-fluid" src="{{ asset('images/placeholder.webp') }}"></img>
			</a>
			<a href="/index.php/produit/1" class="ps-2 pt-2 m-0 text-decoration-none text-muted">Product name placeholder</a>
			<p class="ps-2 mb-3 text-secondary m-0">$9999.99 / unité</p>
			<div class="d-flex flex-column flex-md-row m-2">
				<div class="d-flex mb-2">
					<button class="btn p-2 m-0">-</button>
					<input class="w-50" type="number" value="7">
					<button class="btn p-2 m-0">+</button>
				</div>
				<button class="btn btn-primary">Ajouter au panier</button>
			</div>
		</div>
		@endfor
	</div>
</div>
@endsection