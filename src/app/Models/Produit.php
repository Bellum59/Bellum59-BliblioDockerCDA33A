<?php

namespace App\Models;

class Produit
{
	public $id;
	public $nom;
	public $description;
	public $prix;
	public $idCategorie;
	public $imageId;
	
	private static $format = array(
		'id' => FILTER_VALIDATE_INT,
		'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
		'description' => FILTER_SANITIZE_SPECIAL_CHARS,
		'prix' => FILTER_VALIDATE_FLOAT,
		'idCategorie' => FILTER_VALIDATE_INT,
		'imageId' => FILTER_VALIDATE_INT,
	);
	
	public function __construct($array) {
		$array = filter_var_array($array, Produit::$format);
		
		$this->id = $array['id'];
		$this->nom = $array['nom'];
		$this->description = $array['description'];
		$this->prix = $array['prix'];
		$this->idCategorie = $array['idCategorie'];
		$this->imageId = $array['imageId'];
	}
}

?>