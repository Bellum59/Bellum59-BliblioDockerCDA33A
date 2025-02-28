<?php

namespace App\Models;

class Image
{
    public $id;
    public $chemin;

    private static $format = array(
        'id' => FILTER_VALIDATE_INT,
        'chemin' => FILTER_SANITIZE_SPECIAL_CHARS,
    );

    public function __construct($array)
    {
        $array = filter_var_array($array, Image::$format);

        $this->id = $array['id'];
        $this->chemin = $array['chemin'];
    }
}