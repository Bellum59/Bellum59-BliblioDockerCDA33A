@extends("layouts.app")

@section("content")

<form action="{{'/index.php/admin/produit/modification'}}" method="post" id="ModificationProduit" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-sm-5 bg-light text-center">
          <h2> Image du produit :</h2>
          @if(is_null($arrayResultat[0]->image))
          <img src="{{ asset('images/placeholder.webp') }}" class="img-thumbnail mt-2 mr-auto" alt="PlaceholderImage" width="304" height="236">
          @else
          <img src="{{ asset($arrayResultat[0]->image->chemin) }}" class="img-thumbnail mt-2 mr-auto" alt="PlaceholderImage" width="304" height="236">
          @endif
          <div class="form-group">
            <label for="imageproduit">Remplacer cette image :</label>
            <input type="file" class="form-control-file" name='imageproduit' id="ModifierImageProduit">
          </div> 
        </div>
        <div class="col-sm-7 bg-blue justify-content-center">
          
            <div class="form-group">
              <label for="titre">Titre du produit:</label>
              <input type="text" class="form-control" name="titre" id="titre" value="{{$arrayResultat[0]->nom}}" required>
            </div>
            <div class="form-group">
              <label for="Categorie-list">Categorie :</label>
              <select class="form-control" id="Categorie-list" name="Categorie-list" required>
                @foreach($arrayResultat[1] as $categorie)
                    @if($categorie->id == $arrayResultat[0]->idCategorie)
                    <option value="{{$categorie->id}}" selected>{{$categorie->nom}} </option>
                    @else
                    <option value="{{$categorie->id}}">{{$categorie->nom}} </option>
                    @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="prix">Prix du produit: $</label>
              <input type="number" class="form-control" id="prix" step="0.01" name="prix" value="{{$arrayResultat[0]->prix}}" required>
            </div>
            <div class="form-group">
              <label for="detailProduit">Detail du produit</label>
              <textarea class="form-control" id="Detail-produit" name="detailProduit" required>{{$arrayResultat[0]->description}}</textarea>
              <input type="hidden" id="idproduit" name="idproduit" value="{{$arrayResultat[0]->id}}">
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

@endsection