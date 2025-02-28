<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Image;
use App\Models\Produit;
use App\Models\Membre;
use App\Accesseur\FactureDAO;
use App\Accesseur\ProduitDAO;
use App\Accesseur\MembreDAO;
use App\Http\Controllers\PaypalIPN;
use App\Mail\ConfirmationAchat;

class ControllerPayment extends Controller
{

    //Recuperer les donner envoyer par Paypal directement
    public function traitementPayment(){
        
        $ipn = new PaypalIPN();
        $produitNomRecup = $_POST["item_name"]; //Necessite ajout de Recup produit par nom
        $quantitee = $_POST["quantity"];
        $paymentD = $_POST["payment_date"];
        $timestamp = strtotime($paymentD);
        $dateFormater = date("Y-m-d H:i:s",$timestamp);
        // $dateFormater = "2023-10-31 20:43:10";
        $prix = $_POST["mc_gross"];
        // $prix = "0.01";
        $email = $_POST["custom"];
        $membre = MembreDAO::RecupMembreParEmail($email);
        // var_dump($membre);
        $produit = ProduitDAO::getProduitParNom($produitNomRecup);
        // var_dump($produit);
        $ipn->useSandbox();
        
        $data = [
            'produitNomRecup' => $produitNomRecup,
            'quantitee' => $quantitee,
            'dateFormater' => $dateFormater,
            'prixUnitaire' => $prix / $quantitee,
            'email' => $email,
            'membre' => $membre,
            'produit' => $produit,
            'prixTotal' => $prix,
        ];

        $verifie = $ipn->verifyIPN();
        if ($verifie) {
            Mail::to($data['email'])
                ->queue(new ConfirmationAchat($data));
            FactureDAO::AjouterFacture($membre,$produit,$quantitee,$prix,$dateFormater);
        }
        
        // Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
        header("HTTP/1.1 200 OK");
    }
   
    public function recupererHistorique(){
		$user = Auth::user();

        $membre = MembreDAO::RecupMembreParEmail($user->email);
        $listeDeFacture = FactureDAO::recupererFactureParMembre($user);
        foreach($listeDeFacture as $facture){
            $facture->produit = ProduitDAO::getProduitParId($facture->idProduit);
        }
        return view('historiqueAchat')->with('arrayFacture',$listeDeFacture);
    }
}