<?php

namespace App\Accesseur;
use PDO;
use App\Models\Produit;
use App\Models\Membre;
use App\Models\Facture;

class FactureDAO {
	
    public static function ajouterFacture($membre,$produit,$quantite,$prix,$date){
        require_once "connexion.php";
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_INSERER_FACTURE = "INSERT INTO facture(date,idProduit,idMembre,quantite,prix) VALUES (:date,:idProduit,:idMembre,:quantite,:prix)";
        $requete = $basededonnees->prepare($SQL_INSERER_FACTURE);
        $requete->bindParam(":date", $date);
        $requete->bindParam(":idProduit",$produit->id);
        $requete->bindParam(":idMembre",$membre->id);
        $requete->bindParam(":quantite",$quantite);
        $requete->bindParam(":prix",$prix);
        $requete->execute();
    }

    public static function recupererFactureParMembre($membre){
        require_once "connexion.php";
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT * FROM facture WHERE idMembre=:id ORDER BY date DESC");
        $requete->bindValue(":id", $membre->id);
        $requete->execute();
        $factures = $requete->fetchAll(PDO::FETCH_ASSOC);
        $facturesFiltres = array();
        foreach($factures as $facture)
        {
            $facturesFiltres[] = new Facture($facture);
        }

        return $facturesFiltres;
    }

    //Upadet lid produit vers null lorsque un produit facturer est supprimer de la base de donnees
    public static function supprimerFactures($id){
        require_once "connexion.php";
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_SUPPRIMER_FACTURE = "DELETE FROM facture WHERE idProduit= :id";
        $requete = $basededonnees->prepare($SQL_SUPPRIMER_FACTURE);
        $requete->bindParam(":id", $id);
        $requete->execute();
    }

    
}

?>