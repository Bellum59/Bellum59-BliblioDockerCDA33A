<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerCategorie;
use App\Http\Controllers\ControllerCatalogue;
use App\Http\Controllers\ControllerProduit;
use App\Http\Controllers\ControllerListeAdmin;
use App\Http\Controllers\ControllerModificationProduit;
use App\Http\Controllers\ControllerAjoutProduit;
use App\Http\Controllers\ControllerSuppressionProduit;
use App\Http\Controllers\ControllerPayment;
use App\Http\Controllers\ControllerTestMail;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerCommentaire;
use App\Http\Controllers\ControllerPanier;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes publiques
Route::get('/', [ControllerProduit::class, 'showAccueil'])->name('accueil');

Route::get('/mission', function() {
	return view('mission');
})->name('mission');
Route::get('/test',function(){
	return view('prototype.detail');
});
Route::get('/categories', [ControllerCategorie::class, 'showCategorie'])->name('categories');
Route::get('/catalogue', [ControllerProduit::class, 'showCatalogue'])->name('catalogue');
Route::get('/catalogue/{idCategorie}', [ControllerProduit::class, 'showCatalogueParCategorie'])->name('catalogueParCategorie');
Route::get('/produit/{id}', [ControllerProduit::class, 'showProduit']);

// Panier
Route::get('cart/get', [ControllerPanier::class, "getCartAjax"]);
Route::post('cart/add/{id}', [ControllerPanier::class, 'addToCart']);
Route::post('cart/update/{id}', [ControllerPanier::class, 'updateCart']);
Route::post('cart/delete/{id}', [ControllerPanier::class, 'deleteFromCart']);
Route::post('cart/clearCart', [ControllerPanier::class, 'clearCart']);

// Route traitement paiement PayPal
Route::post('/traitementPayment', [ControllerPayment::class, 'traitementPayment']);

// Routes admins
Route::middleware('auth.admin')->group(function () {
	Route::get('/admin',function() {
		return view('admin'); //To do, passer en controlleur pour tris par categorie
	});

	Route::get('/adminDao', [ControllerListeAdmin::class,'showListe']);
	Route::get('/adminDao/{idCategorie}', [ControllerListeAdmin::class,'showListeCategorie']);

	Route::get('/admin/ajoutProduit', function() {
		return view('ajoutProduit'); // To do, reparer image placeholder
	});

	Route::get('/admin/ajoutProduitDao', [ControllerAjoutProduit::class,'showform']);
	Route::post('/admin/produit/creation', [ControllerAjoutProduit::class,'creationProduit']);

	Route::get('/test-mail', [ControllerTestMail::class, 'traitementPayment'] );

	Route::get('/admin/modificationProduit', function() {
		return view('modificationProduit');
	});

	Route::get('/admin/modificationProduit/{id}', [ControllerModificationProduit::class,'showInfoProduit']);
	Route::post('/admin/produit/modification', [ControllerModificationProduit::class,'modificationProduit']);

	Route::get('/admin/produit/suppression/{id}',[ControllerSuppressionProduit::class,'showPage']);
	Route::get('/admin/produit/suppression/confirm/{id}',[ControllerSuppressionProduit::class,'supprimerProduit']);
});

// Routes d'authentification et compte
Auth::routes();

Route::middleware('auth')->group(function() {
	Route::get('/home', [ControllerUser::class, 'showMonCompte']);
	Route::get('/compte/historique', [ControllerPayment::class, 'recupererHistorique']);
	Route::get('/password/change', [ControllerUser::class, 'showChangePassword']);
	Route::post('/password/change', [ControllerUser::class, 'changePassword']);

	Route::get('/compte/prototypeHistorique',function(){
		return view('prototype.prototypeHistoriqueAchat');
	});

	Route::get('/prototypeConfirmation',function(){
		return view('prototype.prototypeConfirmationAchat');
	});

	// Route paiement
	Route::post('/confirmationAchat', [ControllerProduit::class, 'passProduitInfo']);

	//Route commentaire
	Route::get('/compte/commentaire', [ControllerCommentaire::class, 'afficherHistorique']);
});

// Routes pour commentaire

Route::post('/ajoutCommentaire', [ControllerCommentaire::class, 'ajoutCommentaire']);
Route::post('/suppressionCommentaire/{id}',[ControllerCommentaire::class, 'supprimerCommentaire']);
Route::post('/actualisationCommentaire',[ControllerCommentaire::class, 'actualiserCommentaire']);