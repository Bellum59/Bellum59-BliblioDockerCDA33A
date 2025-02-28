<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Image;
use App\Accesseur\CategorieDAO;
use App\Accesseur\ProduitDAO;
use App\Accesseur\ImageDAO;

class ControllerModificationProduit extends Controller
{

    public function showInfoProduit($id):view{
      $infoProduit = ProduitDAO::getProduit($id);
      $listeCategorie = CategorieDAO::listerCategorie();
      $infoProduit->image = ImageDAO::recupererImageParId($infoProduit->imageId);
      $arrayResultat[0] = $infoProduit;
      $arrayResultat[1] = $listeCategorie;
		
      return view('modificationProduitDao')->with('arrayResultat',$arrayResultat);
    }

    public function modificationProduit(Request $request){
      //dd($request->all());
      $idProduitModifier = intval($request->input('idproduit'));
      $produit = ProduitDAO::getProduit($idProduitModifier);
      $produit->nom = $request->input('titre');
      $produit->idCategorie = intval($request->input('Categorie-list'));
      $produit->description = $request->input('detailProduit');
      $produit->prix = $request->input('prix');
      $update = ProduitDAO::updateProduit($produit);
      if($update){
        if($request->file('imageproduit') != null){ // Si une image est poster
          if($produit->imageId == null){ //Si il n'y a pas d'image existante pour ce produit
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
              var_dump($produit);
              echo('<br>');
              var_dump($imageInserer);
              $updateChemin = ProduitDAO::updateImageProduit($produit);
              if($updateChemin){
                return redirect('/adminDao');
              } else {
                echo 'Probleme survenue-2';
              }
            } else {
              echo 'Probleme survenue-3';
            }
          }else { // Si une image existe pour le produit
            $Image = ImageDao::recupererImageParId($produit->imageId);
            $cheminSup = ltrim($Image->chemin,"/");
            unlink($cheminSup);
            $file = $request->file('imageproduit');
            $extension = $request->file('imageproduit')->extension();
            $cheminCible = 'images/';;
            $nomFichier = str_replace(' ', '', $produit->nom).".".$extension;
            $file->move($cheminCible,$nomFichier);
            $cheminTotal = "/".$cheminCible.$nomFichier; //AJout du non pour empecher 2 image avec le meme nom
            $Image->chemin = $cheminTotal;
            $updateChemin = ImageDAO::updateCheminImage($Image);
            if($updateChemin){
              return redirect('/adminDao');
            } else {
              echo 'Probleme survenue';
            }


          }
          } else {
            return redirect('/adminDao');
          } //Si pas d'image poster, ne rien faire de plus
          
      }
      
  }

}