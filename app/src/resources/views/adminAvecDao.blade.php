@extends("layouts.app")
        
@section("content")
<?php session(['email' => 'rphl.levesque@gmail.com'])?>
<div class="container-fluid mt-5">
	<div class="row">
	  <div class="col-sm-2 bg-light text-center">
		  <div>
			  <h3>Liste des categories :</h3>
		  </div>
		  @foreach ($arrayResultat[0] as $categorie) 
		  <a href='/index.php/adminDao/{{$categorie->id}}'> {{$categorie->nom}} </a> <br> 
		  @endforeach
		  <a href='/index.php/adminDao'> Voir tout les produits </a> <br> 
		  <div class="text-center mt-3">
			  <a class="btn btn-success btn-lg" href="/index.php/admin/ajoutProduit" role="button">Creer produit</a>
		  </div>
	  </div>
	  <div class="col-sm-10 justify-content-center">
		@foreach ($arrayResultat[1] as $produit)
		<div class="row mr-auto">
		  <div class="col-sm-7 text-center">
			  <a href="/index.php/produit/{{$produit->id}}"><h2>{{$produit->nom}}</h2></a>
		  </div>
			  <div class="col-sm-2 text-center"> <a class="btn btn-danger" href="/index.php/admin/produit/suppression/{{$produit->id}}" role="button">Supprimer</a></div>
			  <div class="col-sm-1"></div>
			  <div class="col-sm-2 text-center"><a class="btn btn-success" href="/index.php/admin/modificationProduit/{{$produit->id}}" role="button">Modifier</a></div>
		  </div>
		@endforeach
		</div>
	  </div>
	</div>
  </div>
@endsection