@extends("layouts.app")

@section("content")

<?php
use App\Models\Produit;
use App\Models\Membre;
use App\Accesseur\FactureDAO;
use App\Accesseur\ProduitDAO;
use App\Accesseur\MembreDAO;
use App\Http\Controllers\PaypalIPN;

$paiement = "";
foreach($_POST as $cle=>$valeur) $paiement .= $cle . "=" . $valeur . "\n";

$ipn = new PaypalIPN();

$ipn->useSandbox();

$verifie = $ipn->verifyIPN();
if ($verifie) {
	
    $mailenvoye = mail("clement.vanbellingen@yahoo.fr","test paypal", "verifie");
    mail("clement.vanbellingen@gmx.fr","test4",$paiement);
	
}


// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
header("HTTP/1.1 200 OK");//echo "mail envoye " . $mailenvoye;
?>

@endsection