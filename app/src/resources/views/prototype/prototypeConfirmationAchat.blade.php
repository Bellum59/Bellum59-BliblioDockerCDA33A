@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-sm-12 text-center">
        <h2> Recapitulatif de la commande </h2>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-sm-8">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th class="bg-light">Produit</th>
                <th class="bg-light">Quantité</th>
                <th class="bg-light">prix unitaire</th>
                <th class="bg-light">prix total </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>produit 1</td>
                <td>1</td>
                <td>$1</td>
                <td>$1</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-sm-3 text-center">
        <a class="btn btn-danger btn-lg" href="/index.php/catalogueDao" role="button">Annuler</a>
    </div>
    <div class="col-sm-3 text-center">
        <button type="submit" class="btn btn-success btn-lg">Confirmer</button>
    </div>
</div>

@endsection