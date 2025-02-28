<?php

namespace App\Models;

class Membre
{
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $motDePasse;
    private $panier;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_SPECIAL_CHARS,
        'motDePasse' => FILTER_SANITIZE_SPECIAL_CHARS
    );

    public function __construct($array)
    {
        $array = filter_var_array($array, Membre::$format);

        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->prenom = $array['prenom'];
        $this->email = $array['email'];
        $this->motDePasse = $array['motDePasse'];
    }
}