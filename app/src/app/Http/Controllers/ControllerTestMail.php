<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Membre;
use App\Models\Produit;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationAchat;

class ControllerTestMail extends Controller
{
    public function traitementPayment(){
        $produitNomRecup = "test";
        $quantitee = 4;
        $dateFormater = date("2023-10-30 14:59:23");
        $prix = 12;
        $email = "rphl.levesque@gmail.com";
        $membreArray = [
            'id' => 999,
            'nom' => "Levesque",
            'prenom' => "Raphael",
            'email' => "rphl.levesque@gmail.com",
            'motDePasse' => "rphl.levesque@gmail.com"
        ];
        $membre = new Membre($membreArray);
        $produitArray = [
            'id' => 999,
            'nom' => "test",
            'description' => "test daslkfa",
            'prix' => 12,
            'idCategorie' => 1,
            'imageId' => 1
        ];
        $produit = new Produit($produitArray);
        $prixTotal = 24;

        $data = [
            'produitNomRecup' => $produitNomRecup,
            'quantitee' => $quantitee,
            'dateFormater' => $dateFormater,
            'prixUnitaire' => $prix,
            'email' => $email,
            'membre' => $membre,
            'produit' => $produit,
            'prixTotal' => $prixTotal,
        ];

        $this::sendMail($data);
    }

    public function sendMail($data){
        Mail::to($data['email'])
            ->queue(new ConfirmationAchat($data));
    }
        
}