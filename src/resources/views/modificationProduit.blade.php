@extends("layouts.app")

@section("content")

<form action="index.html" id="ModificationProduit">
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-sm-5 bg-light text-center">
          <h2> Image du produit :</h2>
          <!-- To do :Remplacer par l'image associer au produit choisis
                    Si pas de photo relier, mettre l'image placeholder par defaut-->
          <img src="{{ asset('images/placeholder.webp') }}" class="img-thumbnail mt-2 mr-auto" alt="PlaceholderImage" width="304" height="236">
          <div class="form-group">
            <label for="ModifierImageProduit">Remplacer cette image :</label>
            <input type="file" class="form-control-file" id="ModifierImageProduit">
          </div> 
        </div>
        <div class="col-sm-7 bg-blue justify-content-center">
          
            <div class="form-group">
              <label for="Titre">Titre du produit:</label>
              <input type="text" class="form-control" id="titre" required>
            </div>
            <div class="form-group">
              <label for="Categorie-list">Categorie :</label>
              <select class="form-control" id="Categorie-list" required>
                <option>Categorie 1</option>
                <option>Categorie 2</option>
                <option>Categorie 3</option>
                <option>Categorie 4</option>
                <option>Categorie 5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="prix">Prix du produit: $</label>
              <input type="number" class="form-control" id="prix" required>
            </div>
            <div class="form-group">
              <label for="Detail-produit">Detail du produit</label>
              <textarea class="form-control" id="Detail-produit" required></textarea>
            </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row mr-auto justify-content-center">
        <div class="col-sm-3 text-center">
          <a class="btn btn-danger btn-lg" href="/index.php/admin" role="button">Annuler</a>
        </div>
        <div class="col-sm-3">
          <!-- Laisser blanc pour l'espacement entre les boutons-->
        </div>
        <div class="col-sm-3 text-center">
          <button type="submit" class="btn btn-success btn-lg">Modifier produit</button>
        </div>
      </div>
    </div>
    </form>

@endsection