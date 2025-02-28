@extends("layouts.app")

@section("content")
<div class="d-flex flex-column flex-md-row">
	<div class="col d-flex flex-column p-4">
		<div class="d-flex justify-content-center">
			<img class="border img-fluid" src="{{ asset('images/placeholder.webp') }}"></img>
		</div>
		<div class="d-flex justify-content-start col-3">
			<img class="me-1 my-2 border img-thumbnail" src="{{ asset('images/placeholder.webp') }}"></img>
			<img class="me-1 my-2 border img-thumbnail" src="{{ asset('images/placeholder.webp') }}"></img>
			<img class="me-1 my-2 border img-thumbnail" src="{{ asset('images/placeholder.webp') }}"></img>
		</div>
	</div>
	
	<div class="col py-4 pe-4">
		<div class="pb-2">
			<a href="{{ url()->previous() }}">Retour</a>
		</div>
		<div>
			<h4 class="border-bottom border-2 pb-2">Product name</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vestibulum dolor tempor risus hendrerit, quis varius ex euismod. Donec ultrices augue et molestie viverra. Donec id convallis ipsum. Integer dapibus, urna vestibulum euismod blandit, nibh leo euismod elit, eu eleifend ipsum odio nec tortor. Nunc elementum leo mauris, eget luctus urna pulvinar ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut nec faucibus dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras consequat vel sapien ut auctor. Mauris dictum, odio a commodo hendrerit, purus ipsum feugiat magna, ut rhoncus sapien dui.</p>
		</div>
		<div class="d-flex border p-2 justify-content-between align-items-center">
			<div class="border d-flex p-2">
				<h5>$9999.99 / unit</h5>
			</div>
			<div class="d-flex">
				<div class="d-flex border me-4 input-group-sm">
					<button class="btn p-2 m-0">-</button>
					<input type="text" value="7">
					<button class="btn p-2 m-0">+</button>
				</div>
				<button class="btn btn-primary">Add to cart</button>
			</div>
		</div>
	</div>
</div>
<div id="ajout-commentaire">
	<h3> Ajout de commentaire :</h3>
	<form action="" id="ajoutcommentaire">
	<div class="row col-sm-10 mx-auto bg-light rounded">
		<textarea id="contenueCommentaire" name="contneueCommentaire" class="rounded "> </textarea>
	</div>
	<div class="row col-sm-10 mx-auto bg-light">
		<div class="row col-sm-3 mx-auto mt-2">
			<input type="submit" class="btn btn-success" value="poster">
		</div>
	</div>
</div>
<div id="section commentaire" class="col-sm-12">
	<h2> Espace commentaire :</h2>
	<div class="commentaire col-sm-10 bg-light mx-auto">
		<div class="row mx-auto justify-content-center">
			<div class="col-sm-4 bg-light"> Nom et prenom </div>
			<div class="col-sm-2 bg-light"></div>
			<div class="col-sm-4 bg-light text-end"> date </div>
		</div>
		<div class="row">
			<div class="col-sm-10 bg-light mx-auto text-center">
				Contenue contenaire
			</div>
		</div>
	</div>
</div>
@endsection