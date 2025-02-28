<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Image;
use App\Models\Produit;
use App\Accesseur\CategorieDAO;
use App\Accesseur\ProduitDAO;
use App\Accesseur\ImageDAO;

class ControllerAjoutProduit extends Controller
{

    public function showForm():view{
        $listeCategorie = CategorieDAO::listerCategorie();
        return view('ajoutProduitDao')->with('categories',$listeCategorie);
      }

    public function creationProduit(Request $request){
      //dd($request->all());
      $produit['id'] = 0;
      $produit['nom'] = $request->input('titre');
      $produit['idCategorie'] = intval($request->input('Categorie-list'));
      $produit['description'] = $request->input('detailProduit');
      $produit['prix'] = $request->input('prix');
      $produit = new Produit($produit);
      if($request->file('imageproduit')!=null){
        $file = $request->file('imageproduit');
        $extension = $request->file('imageproduit')->extension();
        $cheminCible = 'images/';;
        $nomFichier = str_replace(' ', '', $produit->nom).".".$extension;
        $file->move($cheminCible,$nomFichier);
        $cheminTotal = "/".$cheminCible.$nomFichier; //AJout du non pour empecher 2 image avec le meme nom
        $insererImage = ImageDAO::ajouterImage($cheminTotal);
        if($insererImage){
          $imageInserer = ImageDAO::recupererImageParChemin($cheminTotal);
          $produit->imageId = $imageInserer->id;
          $ajout = ProduitDAO::insererProduit($produit);
          if($ajout){
            return redirect('/adminDao');
          } else {
            echo 'Probleme survenue-2';
          }
        } else {
          echo 'Probleme survenue-3';
        }

      }else{
        $produit->imageId = null;
          $ajout = ProduitDAO::insererProduit($produit);
          if($ajout){
            return redirect('/adminDao');
          } else {
            echo 'Probleme survenue';
          }
      }

    }
}