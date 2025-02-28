@extends("layouts.app")

@section("content")

<div class="container">
    <h2 class="text-center">Inscription</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group my-2">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control" id="nom" placeholder="nom">
                        </div>
                        <div class="form-group my-2">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control" id="prenom" placeholder="prénom">
                        </div>
                        <div class="form-group my-2">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" placeholder="email">
                        </div>
                        <div class="form-group my-2">
                            <label for="motdepasse">Mot de passe :</label>
                            <input type="password" class="form-control" id="motdepasse" placeholder="mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary d-block mt-3 mx-auto">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
