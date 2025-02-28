<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Accesseur\CategorieDAO;
use App\Accesseur\ProduitDAO;

class ControllerListeAdmin extends Controller
{
    public function showListe():view {
        $arrayCategorie = CategorieDAO::listerCategorie();
        $arrayProduit = ProduitDAO::listerProduits();
        $arrayResultat[0] = $arrayCategorie;
        $arrayResultat[1] = $arrayProduit;
		
        return view('adminAvecDao')->with('arrayResultat',$arrayResultat);
    }

    public function showListeCategorie($id):view{
      $arrayCategorie = CategorieDAO::listerCategorie();
      $arrayProduit = ProduitDAO::listerProduitsParCategorie($id);
      $arrayResultat[0] = $arrayCategorie;
      $arrayResultat[1] = $arrayProduit;
		
      return view('adminAvecDao')->with('arrayResultat',$arrayResultat);
		

    }

}