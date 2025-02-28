<?php

namespace App\Accesseur;
use PDO;
use App\Models\Membre;

class MembreDAO {
	
    /* 
    / Recupere un membre par un mail
    / pour le paypal IPN, retourne un objet
    / membre
    */
    public static function RecupMembreParEmail($email){
        require_once 'connexion.php';
        $bdd = new BaseDeDonnees();
        $basededonnees = $bdd->pdo;
        $SQL_LIRE_MEMBRE = "SELECT * FROM users WHERE email = :email";
        $requete = $basededonnees->prepare($SQL_LIRE_MEMBRE);
        $requete->bindParam(":email", $email);
        $requete->execute();

        $membre = $requete->fetch(PDO::FETCH_ASSOC);
		
		if(!$membre)
			return null;
		
        return $membre = new Membre($membre);
    }
}

?>