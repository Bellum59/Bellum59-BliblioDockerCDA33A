@extends("layouts.app")

@section("content")

<div class="d-flex justify-content-center">
	<div class="d-flex flex-column flex-md-row col-10 col-md-6 mt-4 mb-4 border bg-white">
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
		<div>
			<form action="#" method="post">
			<div class="d-flex flex-column align-items-center mt-3 mb-3">
				<h4>Mon compte</h4>
				<img src="{{ asset('images/avatar.png') }}" class="w-75">
				<h4>{{ $user->name }}</h4>
			</div>
			<div class="d-flex flex-column ms-4 mb-4 align-items-center">
				<div class="d-flex flex-column flex-md-row mb-2">
					<p class="me-2">Adresse mail:</p>
					<input type="email" id="email" value="{{ $user->email }}" disabled>
				</div>
				<div class="d-flex flex-column flex-md-row">
					<p class="me-2">Numéro de téléphone:</p>
					<input type="tel" id="phone" value="" disabled>
				</div>
			</div>
			<div class="d-flex justify-content-center mb-4">
				<button class="btn btn-primary" id="btnModifier" type="button" onclick="activerModif()">Modifier</button>
				<button class="btn btn-primary me-2" id="btnMaj" type="submit" hidden>Mettre à jour</button>
				<button class="btn btn-primary" id="btnAnnuler" type="button" onclick="annulerModif()" hidden>Annuler</button>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
function activerModif() {
	let btnModifier = document.getElementById("btnModifier");
	let btnMaj = document.getElementById("btnMaj");
	let btnAnnuler = document.getElementById("btnAnnuler");
	
	let inputMail = document.getElementById("email");
	let inputPhone = document.getElementById("phone");
	
	// On cache le bouton modifier et on affiche les deux autres
	btnModifier.setAttribute("hidden", "");
	btnMaj.removeAttribute("hidden");
	btnAnnuler.removeAttribute("hidden");
	
	// On permet l'écriture dans les input
	inputMail.removeAttribute("disabled");
	inputPhone.removeAttribute("disabled");
	
	// On stocke les valeurs des input dans des variables globales pour les rétablir
	// si l'utilisateur clique sur le bouton annuler
	oldMail = inputMail.value;
	oldPhone = inputPhone.value;
}

function annulerModif() {
	let btnModifier = document.getElementById("btnModifier");
	let btnMaj = document.getElementById("btnMaj");
	let btnAnnuler = document.getElementById("btnAnnuler");
	
	let inputMail = document.getElementById("email");
	let inputPhone = document.getElementById("phone");
	
	// On affiche le bouton modifier et on cache les deux autres
	btnModifier.removeAttribute("hidden");
	btnMaj.setAttribute("hidden", "");
	btnAnnuler.setAttribute("hidden", "");
	
	// On désactive l'écriture dans les input
	inputMail.setAttribute("disabled", "");
	inputPhone.setAttribute("disabled", "");
	
	// On rétablit les valeurs des deux input
	inputMail.value = oldMail;
	inputPhone.value = oldPhone;
}
</script>

@endsection