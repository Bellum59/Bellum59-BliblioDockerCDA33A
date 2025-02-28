<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Image;
use App\Models\Produit;
use App\Accesseur\ProduitDAO;
use App\Accesseur\ImageDAO;
use App\Accesseur\FactureDAO;
use App\Accesseur\CommentaireDAO;

class ControllerSuppressionProduit extends Controller
{

    public function showPage($id):view{
      $produit = ProduitDAO::getProduit($id);
      return view('confirmationSupression')->with('produit',$produit);
    }

    public function supprimerProduit($id){
      $produit = ProduitDAO::getProduit($id);
      $supprimerCommentaire = CommentaireDAO::supprimerCommentaire($id);
      $supprimerFacture = FactureDAO::supprimerFactures($id);
      $suppression = ProduitDAO::SupprimerProduit($produit);
      if($suppression == true){
        if($produit->imageId != null){
          $imageInfo = ImageDAO::recupererImageParId($produit->imageId);
          $cheminSup = ltrim($imageInfo->chemin,"/");
          unlink($cheminSup); //Suppresion du fichier
          $suppressionImage = ImageDAO::supprimerImage($imageInfo);
          if($suppressionImage==true){
            return redirect('/adminDao');
          } else {
            echo "Image non supprimer de la bdd";
          }

        }else {
          return redirect('/adminDao');
        }
      }else {
        echo "Un probleme est survenue";
      }
    }

      
}