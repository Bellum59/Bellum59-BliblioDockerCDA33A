<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Accesseur\CommentaireDAO;
use Auth;

class ControllerCommentaire extends Controller
{
    public function ajoutCommentaire(Request $request){
        //header("Access-Control-Allow-Origin: *");
        $received = file_get_contents('php://input');
        $data = json_decode($received,true);
        $contenueCommentaire = $data["commentaire"];
        $membre = $data["idMembre"];
        $produit = $data["idProduit"];
        $date = date("Y-m-d H:i:s");
        $date = strval($date);
        CommentaireDAO::AjoutCommentaire($date,$produit,$membre,$contenueCommentaire);
        $Nom = CommentaireDAO::recupererAuteur($membre);
        $idCommentaire = CommentaireDAO::recupererDernierCommentairePoster($membre);
        $response = array("Nom"=>$Nom[0]["name"],"id"=>$idCommentaire[0]["id"]);
        //echo $Nom[0]["name"]." ".$idCommentaire[0]["id"];
        echo json_encode($response);
        exit();
    }

    /*Recupere l'id d'un commentaire pour le supprimer de la
    base de donnees*/
    public function supprimerCommentaire(Request $request){
        $received = file_get_contents('php://input');
        $data = json_decode($received,true);
        $id = $data["id"];
        CommentaireDAO::supprimerCommentaireParId($id);
        echo "succes";
        exit();
    }

    public function actualiserCommentaire(Request $request){
        $received = file_get_contents('php://input');
        $data = json_decode($received,true);
        $compteurCommentaire = $data["compteur"];
        $idProduit = $data["idProduit"];
        $listeCommentaires = CommentaireDAO::RecupererCommentaires($idProduit);
        if(count($listeCommentaires) == $compteurCommentaire){ //Si il ny a pas de nouveau commentaires
            //echo "identique";
            $listeCommentaires = (array)$listeCommentaires;
            foreach($listeCommentaires as $com){
                $auteur = CommentaireDAO::recupererAuteur($com->idMembre);
                $com->nom = $auteur[0]["name"];
            }
            echo json_encode($listeCommentaires);
        }else{
            echo json_encode($listeCommentaires);
        }
    }

    public function afficherHistorique(){
        $listeCommentaires = CommentaireDAO::recupererCommentaireParAuteur(Auth::id());
        foreach($listeCommentaires as $com){
            $auteur = CommentaireDAO::recupererAuteur($com->idMembre);
            $com->nom = $auteur[0]["name"];
        }
        return view('listeCommentaire')->with('listeCommentaires', $listeCommentaires);
    }
}
