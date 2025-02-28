<?php

namespace App\Models;

class Categorie
{
    public $id;
    public $nom;
    public $imageId;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'imageId' => FILTER_VALIDATE_INT
    );

    public function __construct($array)
    {
        $array = filter_var_array($array, Categorie::$format);

        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->imageId = $array['imageId'];
    }
}