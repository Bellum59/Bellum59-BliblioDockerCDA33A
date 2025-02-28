<?php

namespace App\Models;

class Facture
{
    public $id;
    public $date;
    public $idProduit;
    public $idMembre;
    public $quantite;
    public $prixTotal;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'date' => FILTER_SANITIZE_SPECIAL_CHARS,
        'idProduit' => FILTER_VALIDATE_INT,
        'idMembre' => FILTER_VALIDATE_INT,
        'quantite' => FILTER_VALIDATE_INT,
        'prixTotal' => FILTER_VALIDATE_FLOAT
    );

    public function __construct($array)
    {
        $array = filter_var_array($array, Facture::$format);

        $this->id = $array['id'];
        $this->date = $array['date'];
        $this->idProduit = $array['idProduit'];
        $this->idMembre = $array['idMembre'];
        $this->quantite = $array['quantite'];
        $this->prixTotal = $array['prixTotal'];
    }
}