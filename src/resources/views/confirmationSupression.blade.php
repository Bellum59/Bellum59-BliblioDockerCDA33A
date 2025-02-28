@extends("layouts.app")

@section("content")


    <div class="container mt-5 text-center">
        <p>Etes vous sur de vouloir supprimer le produit suivant : {{$produit->nom}}?</p>
    </div>


    <div class="container mt-5">
      <div class="row mr-auto justify-content-center">
        <div class="col-sm-3 text-center">
          <a class="btn btn-success btn-lg" href="/index.php/adminDao" role="button">Annuler</a>
        </div>
        <div class="col-sm-3">
          <!-- Laisser blanc pour l'espacement entre les boutons-->
        </div>
        <div class="col-sm-3 text-center">
         <a class="btn btn-danger btn-lg" href="/index.php/admin/produit/suppression/confirm/{{$produit->id}}" role="button">Supprimer</a>
        </div>
      </div>
    </div>

@endsection
