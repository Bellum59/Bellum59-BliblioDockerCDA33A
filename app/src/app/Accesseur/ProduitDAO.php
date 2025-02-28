<?php

namespace App\Accesseur;
use PDO;
use App\Models\Produit;

class ProduitDAO {
	public static function listerProduits() {
		require_once "connexion.php";
		
		$bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT id, nom, description, prix, idCategorie, imageId FROM article");
        $requete->execute();
        $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
        $produitsFiltres = array();
        foreach($produits as $produit)
        {
            $produitsFiltres[] = new Produit($produit);
        }

        return $produitsFiltres;
	}
	
	public static function listerProduitsParCategorie($idCategorie) {
		require_once "connexion.php";
		
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT id, nom, description, prix, idCategorie, imageId FROM article WHERE idCategorie = :idCategorie");
		$requete->bindValue(':idCategorie', $idCategorie);
        $requete->execute();
        $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
        $produitsFiltres = array();
        foreach($produits as $produit)
        {
            $produitsFiltres[] = new Produit($produit);
        }

        return $produitsFiltres;
	}
	
	public static function getProduit($id) {
		require_once "connexion.php";
		
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT id, nom, description, prix, idCategorie, imageId FROM article WHERE id = :id");
		$requete->bindValue(':id', $id);
        $requete->execute();
        $produit = $requete->fetch(PDO::FETCH_ASSOC);
		$produitFiltre = new Produit($produit); 

        return $produitFiltre;
	}

    public static function updateProduit($produit){
        require_once "connexion.php";
        
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("UPDATE article SET nom=:nom,description=:description,prix=:prix,idCategorie=:idCategorie WHERE id=:id");
        $requete->bindValue(':nom', $produit->nom,PDO::PARAM_STR);
        $requete->bindValue(':description', $produit->description,PDO::PARAM_STR);
        $requete->bindValue(':prix', $produit->prix);
        $requete->bindValue(':idCategorie', $produit->idCategorie,PDO::PARAM_INT);
        $requete->bindValue(':id', $produit->id,PDO::PARAM_INT);
        return $requete->execute();
    }

    public static function updateImageProduit($produit){
        require_once "connexion.php";
        
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("UPDATE article SET imageId=:imageId WHERE id=:id");
        $requete->bindValue(':imageId', $produit->imageId,PDO::PARAM_INT);
        $requete->bindValue(':id', $produit->id,PDO::PARAM_INT);
        return $requete->execute();
    }

    public static function insererProduit($produit){
        require_once 'connexion.php';

        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("INSERT INTO article (nom,description,prix,idCategorie,imageId) VALUES (:nom,:description,:prix,:idCategorie,:imageId)");
        $requete->bindParam(":nom", $produit->nom,PDO::PARAM_STR);
        $requete->bindParam(":description", $produit->description,PDO::PARAM_STR);
        $requete->bindParam(":prix", $produit->prix);
        $requete->bindParam(":idCategorie", $produit->idCategorie,PDO::PARAM_INT);
        $requete->bindParam(":imageId", $produit->imageId,PDO::PARAM_INT);
		
        return $requete->execute();
    }

    public static function supprimerProduit($produit){
		require_once 'connexion.php';
		
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("DELETE FROM article WHERE id=:id");
        $requete->bindParam(":id", $produit->id,PDO::PARAM_INT);
		
        return $requete->execute();
    }
	
	public static function getPremiersProduits() {
		require_once 'connexion.php';
		
		$bdd = new BaseDeDonnees();
		$basededonnees = $bdd->pdo;
		$requete = $basededonnees->prepare("SELECT id, nom, description, prix, idCategorie, imageId FROM article LIMIT 4");
		$requete->execute();
		$produits = $requete->fetchAll(PDO::FETCH_ASSOC);
        $produitsFiltres = array();
        foreach($produits as $produit)
        {
            $produitsFiltres[] = new Produit($produit);
        }

        return $produitsFiltres;
	}

    // Recupere le produit grace au nom
    // utiliser dans la creation de facture
    // pour recuperer lid dun produit
    public static function getProduitParNom($nom) {
		require_once "connexion.php";
		
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT id, nom, description, prix, idCategorie, imageId FROM article WHERE nom = :nom");
		$requete->bindValue(':nom', $nom);
        $requete->execute();
        $produit = $requete->fetch(PDO::FETCH_ASSOC);
		$produitFiltre = new Produit($produit); 

        return $produitFiltre;
	}

    public static function getProduitParId($id) {
		require_once "connexion.php";
		
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT id, nom, description, prix, idCategorie, imageId FROM article WHERE id = :id");
		$requete->bindValue(':id', $id);
        $requete->execute();
        $produit = $requete->fetch(PDO::FETCH_ASSOC);
		$produitFiltre = new Produit($produit); 

        return $produitFiltre;
	}
}

?>