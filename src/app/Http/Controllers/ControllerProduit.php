<?php

namespace App\Http\Controllers;

use App\Accesseur\ProduitDAO;
use App\Accesseur\ImageDAO;
use App\Accesseur\CategorieDAO;
use App\Accesseur\CommentaireDAO;
use Illuminate\Http\Request;

class ControllerProduit extends Controller
{
	public function showAccueil() {
		$produits = ProduitDAO::getPremiersProduits();
		foreach ($produits as $produit)
			$produit->image = ImageDAO::recupererImageParId($produit->imageId);
		return view('accueil')->with('produits', $produits);
	}
	
	public function showCatalogue() {
		$produits = ProduitDAO::listerProduits();
		foreach ($produits as $produit)
			$produit->image = ImageDAO::recupererImageParId($produit->imageId);
		
		return view('catalogue')->with('produits', $produits);
	}
	
	public function showCatalogueParCategorie($idCategorie) {
		$categorie = CategorieDAO::recupererCategorieParId($idCategorie);
		$produits = ProduitDAO::listerProduitsParCategorie($idCategorie);
		foreach ($produits as $produit)
			$produit->image = ImageDAO::recupererImageParId($produit->imageId);
		
		return view('catalogue')->with([
			'categorie' => $categorie,
			'produits' => $produits,
		]);
	}
	
	public function showProduit($id) {
		$produit = ProduitDAO::getProduit($id);
		$produit->image = ImageDAO::recupererImageParId($produit->imageId);
		$produit->commentaires = CommentaireDAO::recupererCommentaires($produit->id);
		if($produit->commentaires){
			foreach($produit->commentaires as $commentaire){
				$commentaire->auteur = CommentaireDAO::recupererAuteur($commentaire->idMembre);
			}
		}
		return view('detail')->with('produit', $produit);
	}

	// Partie pour le payment
		//Recupere les infos dun produit poru les envoyer a la page confirmation 
		// achat
	public function passProduitInfo(Request $request) {
		$produit["nom"] = $request->input('nomProduit');
		$produit["prix"] = $request->input('prixProduit');
		$produit["quantite"] = $request->input('quantite');
		$produit["prixTotal"] = $produit["prix"] * $produit["quantite"];

		return view('confirmationAchat')->with('produit', $produit);

	}
}
