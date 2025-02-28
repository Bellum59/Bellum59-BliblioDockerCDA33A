<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border">
	<div class="container-fluid d-flex">
		<a href="/index.php">
			<img src="{{ asset('images/chimax-logo-1000x500.png') }}" id="logo" />
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item px-2">
					<a class="nav-link{{ \Request::route()->getName() == 'accueil' ? ' active border-bottom border-2 border-dark' : '' }}" aria-current="page" href="/">Accueil</a>
				</li>
				<li class="nav-item px-2">
					<a class="nav-link{{ \Request::route()->getName() == 'catalogue' ? ' active border-bottom border-2 border-dark' : '' }}" href="/index.php/catalogue">Catalogue</a>
				</li>
				<li class="nav-item px-2">
					<a class="nav-link{{ \Request::route()->getName() == 'categories' ? ' active border-bottom border-2 border-dark' : '' }}" href="/index.php/categories">Categories</a>
				</li>
				<li class="nav-item px-2">
					<a class="nav-link{{ \Request::route()->getName() == 'mission' ? ' active border-bottom border-2 border-dark' : '' }}" href="/index.php/mission">Notre mission</a>
				</li>
			</ul>
			<form class="d-flex me-3" role="search">
				<input class="form-control me-2" type="search" placeholder="Rechercher..." aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Rechercher</button>
			</form>
			<div class="nav-item px-2">
				<button class="btn btn-secondary" onclick="viewCart()">Voir le panier</button>
			</div>
			<div class="d-flex align-items-center">
				@auth
				<div class="dropstart">
					<a href="#" data-bs-toggle="dropdown">
						<img src="{{ asset('images/avatar.png') }}" style="max-width: 50px; max-height: 50px;" />
					</a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="/index.php/home">Mon compte</a></li>
						<li><a class="dropdown-item" href="/index.php/compte/historique">Mes commandes</a></li>
						<li>
							<form action="/index.php/logout" method="post">
								@csrf
								
								<input class="dropdown-item" type="submit" value="Déconnexion"></input>
							</form>
						</li>
					</ul>
				</div>
				@endauth
				@guest
				<a href="/index.php/login">
					<img src="{{ asset('images/avatar.png') }}" style="max-width: 50px; max-height: 50px;" />
				</a>
				@endguest
			</div>
		</div>
	</div>
</nav>
