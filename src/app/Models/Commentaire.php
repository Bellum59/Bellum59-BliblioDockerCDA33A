<?php

namespace App\Models;

class Commentaire
{
	public $id;
	public $date;
	public $idProduit;
	public $idMembre;
	public $contenue;
	
	private static $format = array(
		'id' => FILTER_VALIDATE_INT,
		'date' => FILTER_SANITIZE_SPECIAL_CHARS,
		'idProduit' => FILTER_VALIDATE_INT,
		'idMembre' => FILTER_VALIDATE_INT,
		'contenue' => FILTER_SANITIZE_SPECIAL_CHARS,
	);
	
	public function __construct($array) {
		$array = filter_var_array($array, Commentaire::$format);
		
		$this->id = $array['id'];
		$this->date = $array['date'];
		$this->idProduit = $array['idProduit'];
		$this->idMembre = $array['idMembre'];
		$this->contenue = $array['contenue'];
	}
}

?>