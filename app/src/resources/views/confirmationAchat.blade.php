@extends("layouts.app")

@section("content")

@if(!is_null(Illuminate\Support\Facades\Auth::user()) && Illuminate\Support\Facades\Auth::user()->email)
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>Récapitulatif de la commande </h2>
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
                    <td>{{$produit["nom"]}}</td>
                    <td>{{$produit['quantite']}}</td>
                    <td>{{$produit['prix']}} $ CA</td>
                    <td>{{$produit['prixTotal']}}$ CA</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <form action="/index.php/traitementPayment" method="post"> -->
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

        <input type="hidden" name="amount" value="{{$produit['prixTotal']}}">

        <input type="hidden" name="currency_code" value="CAD">			
        <input type="hidden" name="business" value="sb-ujtd127790219@business.example.com">
        <input type="hidden" name="item_name" value="{{$produit['nom']}}">
        <input type="hidden" name="lc" value="en">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="custom" value ="{{Illuminate\Support\Facades\Auth::user()->email}}">
        <input type="hidden" name="quantity" value="{{$produit['quantite']}}">
        <input type="hidden" name="cmd" value="_xclick">	
        <input type="hidden" name="rm" value="2">

        <input type="hidden" name="src" value="1">
        <input type="hidden" name="sra" value="1">						
        
        <!--input type="hidden" name="cpp_headerback_color" value="000000"/>
        <input type="hidden" name="cpp_headerborder_color" value="ff0000"/-->
        
        <div class="row justify-content-center mt-5">
            <div class="col-sm-3 text-center">
                <a class="btn btn-danger btn-lg" href="{{ url()->previous() }}" role="button">Annuler</a>
            </div>
            <div class="col-sm-3 text-center">
                <button type="submit" name="command" class="btn btn-success btn-lg">Confirmer</button>
            </div>
        </div>
    </form>
@else
<div class="row">
    <div class="col-sm-12 text-center">
        <h3>Veuillez vous connecter pour acheter un produit</h3>
    </div>
</div>
@endif
@endsection