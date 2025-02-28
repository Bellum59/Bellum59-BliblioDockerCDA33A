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
			@if($listeCommentaires)
				@foreach($listeCommentaires as $commentaire)
					<div class="media" style="border-bottom: 1px dotted #ccc;" id='{{$commentaire->id}}'>
						<p class="float-right"><small>{{$commentaire->date}}</small></p>
						<div class="media-body">
							
						<h4 class="media-heading user_name">{{$commentaire->nom}}</h4>
						{{$commentaire->contenue}}
						<p><small><a href="#section-commentaire" onclick="supprimerCommentaire({{$commentaire->id}})">Supprimer</a></p>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
<script>

function supprimerCommentaire(idCommentaire){
		var DataObjet = {};
		DataObjet["id"] = idCommentaire;
		var Data = JSON.stringify(DataObjet);
		fetch(`https://devbel.xyz/index.php/suppressionCommentaire/${idCommentaire}`, { //FOnction suppression en php , re reouter par laraval a controller commentaire
		method: 'post',
		mode : 'cors',
		body: Data,
		headers: {
			'Content-Type': 'application/json',
			'Accept' : 'application/json'
		}
		}).then((response) => {
		return response.text();
		}).then((res) => {
			supprimerCommentaireVisuel(idCommentaire); //Si le php a reussis alors on supprime le visuel
		}).catch((error) => {
		console.log(error);
		})
	}

	/*FOnction qui permet de supprimer lelement HTML/DOM dun commentaire sans actuliaser la page*/
	function supprimerCommentaireVisuel(id){
		//var toutLesCommentaire = document.getElementById("section-commentaire").innerHTML;
		var listeCommentaire = document.getElementsByClassName("media");
		var i = 0;
		for(var com of listeCommentaire){
			if (com.id == id){
				com.remove();
				break;
			}
		}
	}
</script>
@endsection
