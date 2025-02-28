<?php
namespace App\Accesseur;
use PDO;
use App\Models\Image;

class ImageDAO
{
    public static function listerImage()
    {
        require_once "connexion.php";
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT * FROM `image`");
        $requete -> execute();
        $images = $requete->fetchAll(PDO::FETCH_ASSOC);

        $categoriesFiltres = array();
        foreach($images as $image)
        {
            $imageFiltres[] = new image($image);
        }

        return $imageFiltres;
    }

    public static function recupererImageParId($id){
        require_once 'connexion.php';
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_LIRE_IMAGE = "SELECT * FROM image WHERE id=:id";
        $requete = $basededonnees->prepare($SQL_LIRE_IMAGE);
        $requete->bindParam(":id", $id);
        $requete->execute();

        $image = $requete->fetch(PDO::FETCH_ASSOC);
		
		if(!$image)
			return null;
		
        return $image = new Image($image);
    }

    public static function recupererImageParChemin($chemin){
        require_once 'connexion.php';
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_LIRE_IMAGE = "SELECT * FROM image WHERE chemin = :chemin";
        $requete = $basededonnees->prepare($SQL_LIRE_IMAGE);
        $requete->bindParam(":chemin", $chemin);
        $requete->execute();

        $image = $requete->fetch(PDO::FETCH_ASSOC);
		
		if(!$image)
			return null;
		
        return $image = new Image($image);
    }

    public static function ajouterImage($chemin){
        require_once 'connexion.php';

        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_INSERER_IMAGE = "INSERT INTO image(chemin) VALUES (:chemin)";
        $requete = $basededonnees->prepare($SQL_INSERER_IMAGE);
        $requete->bindParam(":chemin", $chemin,PDO::PARAM_STR);
		
        return $requete->execute();
    }

    public static function updateCheminImage($image){
        require_once 'connexion.php';
        
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_UPDATE_IMAGE = "UPDATE image SET chemin=:chemin where id=:id";
        $requete = $basededonnees->prepare($SQL_UPDATE_IMAGE);
        $requete->bindParam(":chemin", $image->chemin,PDO::PARAM_STR);
        $requete->bindParam(":id", $image->id,PDO::PARAM_INT);
        return $requete->execute();
    }

    public static function supprimerImage($image){
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_DELETE_IMAGE = "DELETE FROM image WHERE id=:id";
        $requete = $basededonnees->prepare($SQL_DELETE_IMAGE);;
        $requete->bindParam(":id", $image->id,PDO::PARAM_INT);
        return $requete->execute();
    }


}
 