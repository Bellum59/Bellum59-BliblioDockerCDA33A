@extends("layouts.app")

@section("content")

<form action="{{'/index.php/admin/produit/creation'}}" method="post" id="CreationProduit" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-sm-5 bg-light text-center">
          <h2> Image du produit :</h2>
          <img src="{{ asset('images/placeholder.webp') }}" class="img-thumbnail mt-2 mr-auto" alt="PlaceholderImage" width="304" height="236">
          <div class="form-group">
            <label for="imageproduit">Remplacer cette image :</label>
            <input type="file" class="form-control-file" name='imageproduit' id="imageproduit">
          </div> 
        </div>
        <div class="col-sm-7 bg-blue justify-content-center">
          
            <div class="form-group">
              <label for="titre">Titre du produit:</label>
              <input type="text" class="form-control" name="titre" id="titre" required>
            </div>
            <div class="form-group">
              <label for="Categorie-list">Categorie :</label>
              <select class="form-control" id="Categorie-list" name="Categorie-list" required>
                @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->nom}} </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="prix">Prix du produit: $</label>
              <input type="number" class="form-control" step="0.01" id="prix" name="prix" required>
            </div>
            <div class="form-group">
              <label for="detailProduit">Detail du produit</label>
              <textarea class="form-control" id="Detail-produit" name="detailProduit" required></textarea>
            </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row mr-auto justify-content-center">
        <div class="col-sm-3 text-center">
          <a class="btn btn-danger btn-lg" href="/index.php/adminDao" role="button">Annuler</a>
        </div>
        <div class="col-sm-3">
          <!-- Laisser blanc pour l'espacement entre les boutons-->
        </div>
        <div class="col-sm-3 text-center">
          <button type="submit" class="btn btn-success btn-lg">Ajouter produit</button>
        </div>
      </div>
    </div>

@endsection