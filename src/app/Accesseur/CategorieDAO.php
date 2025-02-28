<?php
namespace App\Accesseur;
use PDO;
use App\Models\Categorie;

class CategorieDAO
{
    public static function listerCategorie() {
        require_once "connexion.php";
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $requete = $basededonnees->prepare("SELECT * FROM categorie");
        $requete->execute();
        $categories = $requete->fetchAll(PDO::FETCH_ASSOC);
        $categoriesFiltres = array();
        foreach($categories as $categorie)
        {
            $categoriesFiltres[] = new categorie($categorie);
        }

        return $categoriesFiltres;
    }

    public static function recupererCategorieParId($id) {
        require_once 'connexion.php';
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_LIRE_CATEGORIE = "SELECT * FROM categorie WHERE id=:id";
        $requete = $basededonnees->prepare($SQL_LIRE_CATEGORIE);
        $requete->bindParam(":id", $id);
        $requete->execute();

        $categorie = $requete->fetch(PDO::FETCH_ASSOC);
        if (!$categorie)
			return null;
		
		return $categorie = new Categorie($categorie);
    }

    //PAs encore sur si utile mais garde pour lisntant
    public static function detaillerCategorie($categorieObject)
    {
        require_once "connexion.php";

        $SQL_LIRE_CATEGORIE = "SELECT * FROM e WHERE :id";
        $requete = $basededonnees->prepare($SQL_LIRE_CATEGORIE);
        $requete->bindParam(":id", $categorieObject->id);
        $requete->execute();

        $categorie = $requete->fetch(PDO::FETCH_ASSOC);

        if(is_bool($categorie)){
            return $categorieObject;
        }
        return new categorie($categorieObject);
    }
}
 