@extends("layouts.app")

@section("content")

<?php
use App\accesseur\imageDAO;
?>
<div class="container mt-5 text-center">
  <p>
    <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Afficher toutes les catégories
    </a>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body" style="display: flex">
	  @foreach ($arrayCategorie as $categorie)
	  <a href='/index.php/catalogue/{{ $categorie->id }}'>{{ $categorie->nom }}</a>
	  @endforeach
    </div>
  </div>
</div>
<!--Album-->
<div class="album py-5">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
	@foreach($arrayCategorie as $categorie)
	<div class='col'>
        <div class='card shadow-sm'>
          <a href="/index.php/catalogue/{{ $categorie->id }}">
			<img src='{{ $categorie->image->chemin }}' width='100%' height='225'>
		  </a>
          <div class='card-body justify-content-center text-center'>
            <a href='/index.php/catalogue/{{ $categorie->id }}' class='card-text text-center'>
				<h5>{{ $categorie->nom }}</h5>
			</a>
          </div>
        </div>
    </div>
	@endforeach
</div>
</div>  
</div>

@endsection