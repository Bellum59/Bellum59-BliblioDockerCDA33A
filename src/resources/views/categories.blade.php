@extends("layouts.app")

@section("content")

<div class="container mt-5 bg-body-tertiary text-center">
  <p>
    <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Afficher la liste complete des categories
    </a>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body" style="display: flex">
      <a href="/index.php/catalogue/1"> Categorie 1</a><a href="/index.php/catalogue/1">Categorie 2</a><a href="/index.php/catalogue/1"> Categorie 3</a><a href="/index.php/catalogue/1"> Categorie 4</a>
    </div>
  </div>
</div>
<!--Album-->
<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
      <div class="col">
        <div class="card shadow-sm">
			<a href="/index.php/catalogue/1">
				<svg class="bd-Placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image de la categorie</text></svg>
			</a>
          <div class="card-body justify-content-center text-center">
            <p class="card-text text-center"><a href="/index.php/catalogue/1"><h5>Nom de la categorie 1</h5></a></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
			<a href="/index.php/catalogue/1">
				<svg class="bd-Placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image de la categorie</text></svg>
			</a>
			<div class="card-body justify-content-center text-center">
            <p class="card-text text-center"><a href="/index.php/catalogue/1"><h5>Nom de la categorie 2</h5></a></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
			<a href="/index.php/catalogue/1">
				<svg class="bd-Placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image de la categorie</text></svg>
			</a>
			<div class="card-body justify-content-center text-center">
            <p class="card-text text-center"><a href="/index.php/catalogue/1"><h5>Nom de la categorie 3</h5></a></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm">
			<a href="/index.php/catalogue/1">
				<svg class="bd-Placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Image de la categorie</text></svg>
			</a>
			<div class="card-body justify-content-center text-center">
            <p class="card-text text-center"><a href="/index.php/catalogue/1"><h5>Nom de la categorie 4</h5></a></p>
          </div>
        </div>
      </div>
</div>
</div>  
</div>

@endsection