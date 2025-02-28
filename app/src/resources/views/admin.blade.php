@extends("layouts.app")

@section("content")

<div class="container-fluid mt-5">
    <div class="row">
      <div class="col-sm-2 bg-light text-center">
          <div>
              <h3>Liste des categories :</h3>
          </div>
          <a href="catalogue/1"> Categorie 1</a> <br>
          <a href="catalogue/2"> Categorie 2</a> <br>
          <a href="catalogue/3"> Categorie 3</a> <br>
          <a href="catalogue/4"> Categorie 4</a> <br>
          <div class="text-center mt-3">
              <a class="btn btn-success btn-lg" href="/admin/ajoutProduit" role="button">Creer produit</a>
          </div>
      </div>
      <div class="col-sm-10 justify-content-center">
        <div class="row mr-auto">
          <div class="col-sm-7 text-center">
              <a href="produit/1"><h2>Nom de produit 1</h2> </a>
          </div>
              <div class="col-sm-2 text-center"> <a class="btn btn-danger" href="" role="button">Supprimer</a></div>
              <div class="col-sm-1"></div>
              <div class="col-sm-2 text-center"><a class="btn btn-success" href="/admin/modificationProduit" role="button">Modifier</a></div>
          </div>
          <div class="row mr-auto">
          <div class="col-sm-7 text-center">
            <a href="produit/2"><h2>Nom de produit 2</h2> </a>
          </div>
              <div class="col-sm-2 text-center"> <a class="btn btn-danger" href="" role="button">Supprimer</a></div>
              <div class="col-sm-1"></div>
              <div class="col-sm-2 text-center"><a class="btn btn-success" href="/admin/modificationProduit" role="button">Modifier</a></div>
          </div>
          <div class="row mr-auto">
              <div class="col-sm-7 text-center">
                <a href="produit/3"><h2>Nom de produit 3</h2> </a>
              </div>
                  <div class="col-sm-2 text-center"> <a class="btn btn-danger" href="" role="button">Supprimer</a></div>
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2 text-center"><a class="btn btn-success" href="/admin/modificationProduit" role="button">Modifier</a></div>
          </div>
          <div class="row mr-auto">
              <div class="col-sm-7 text-center">
                <a href="produit/4"><h2>Nom de produit 4</h2> </a>
              </div>
                  <div class="col-sm-2 text-center"> <a class="btn btn-danger" href="" role="button">Supprimer</a></div>
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2 text-center"><a class="btn btn-success" href="/admin/modificationProduit" role="button">Modifier</a></div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

@endsection