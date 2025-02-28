<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Accesseur\CategorieDAO;
use App\Accesseur\ImageDAO;

class ControllerCategorie extends Controller
{
    public function showCategorie():view {
        $arrayCategorie = CategorieDAO::listerCategorie();
		
		foreach($arrayCategorie as $categorie) {
			$categorie->image = ImageDAO::recupererImageParId($categorie->imageId);
		}

        return view('categoriesAvecDao')->with('arrayCategorie',$arrayCategorie);
    }
}
