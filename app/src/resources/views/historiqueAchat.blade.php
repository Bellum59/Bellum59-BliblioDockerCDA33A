@extends("layouts.app")

@section("content")

<div class="d-flex justify-content-center">
	<div class="d-flex w-75 mt-4 mb-4 border bg-white">
		<div class="d-flex flex-column border-end">
			<div class="border-bottom mb-2 px-4 py-2">
				<a href="/index.php/home">Mon compte</a>
			</div>
			<div class="border-bottom mb-2 px-4 py-2">
				<a href="/index.php/compte/historique">Mes commandes</a>
			</div>
			<div class="border-bottom mb-2 px-4 py-2">
				<a href="/index.php/password/change">Changer mon mot de passe</a>
			</div>
			<div class="border-bottom mb-2 px-4 py-2">
				<a href="/index.php/compte/commentaire">Historique commentaire</a>
			</div>
		</div>
		<div class="d-flex flex-column col-sm-10 justify-content-center text-center mt-4">
		@if(count($arrayFacture) > 0)
		<?php $i =0;?>
		@foreach($arrayFacture as $facture)
		<div class="row mr-auto mb-2">
		  <div class="col-sm-12 text-center mr-auto">
			<p>
			  <a class="btn btn-dark" data-bs-toggle="collapse" href="<?php echo("#collapseExample".$i)?>" role="button" aria-expanded="false" aria-controls="<?php echo("collapseExample".$i)?>">
				Détail de la facture {{$facture->date}}
			  </a>
			</p>
			<div class="collapse" id="<?php echo("collapseExample".$i)?>">
			  <div class="card card-body" style="display: flex">
				<table class="table table-striped table-bordered">
				  <tr>
					<th>Nom du produit</th>
					<th>Quantité commandée</th>
					<th>Prix unitaire</th>
					<th>Prix total</th>
				  </tr>
				  <tr>
					<th>{{$facture->produit->nom}}</th>
					<th>{{$facture->quantite}}</th>
					<th>{{$facture->produit->prix}}</th>
					<th>{{$facture->quantite * $facture->produit->prix}}</th>
				  </tr>
                </table>
			  </div>
			</div>
		  </div>
		  </div>
		  <?php $i++ ?>
		  @endforeach
		  @else
			<p>Aucunes factures à afficher</p>
		  @endif
		</div>
	</div>
</div>

@endsection
