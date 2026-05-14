<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerVol;
use App\Http\Controllers\ControllerPassager;
use App\Http\Controllers\ControllerAeroport;
use App\Http\Controllers\ControllerAuthentification;
use App\Http\Controllers\ControllerGestionnaire;
use App\Http\Controllers\ControllerPanier;

// Pour créer et voir les listes :

Route::get('/create_aeroport', [ControllerAeroport::class, 'createAeroport']);
Route::get('/create_vol', [ControllerVol::class, 'createVol']);

Route::get('/liste_passager', [ControllerPassager::class, 'afficheListePassager']);
Route::get('/liste_aeroport', [ControllerAeroport::class, 'afficheListeAeroport']);
Route::get('/liste_vol', [ControllerVol::class, 'afficheListeVol']);
Route::get('/liste_reservation', [ControllerPassager::class, 'afficheListeReservation']);
Route::get('/liste_panier', [ControllerPanier::class, 'afficheListePanier']);

// Pages du site :

// Page d'acceuil 
Route::get('/', function () {return view('Flyzo.page_home');});
Route::get('/', [ControllerAeroport::class, 'showAeroport'])->name('page_home');

// Page d'affichage des vols
Route::get('/flyzo/affiche_vol', function() {return view('Flyzo.affiche_vol');});  
Route::get('/flyzo/affiche_vol', [ControllerVol::class, 'showVolEtAeroport'])->name('affiche_vol');

// Page d'affichage des vols avec le filtre
Route::get('/flyzo/filtre_vols', function () {return view('Flyzo.vol_filtre');});
Route::post('/flyzo/filtre-vols',[ControllerVol::class,'form_filtre'])->name('filtre_vol');

// Page de réservation 
Route::get('/flyzo/reservation', function() {return view('Flyzo.reservation');});
Route::post('/flyzo/reservation', [ControllerPassager::class, 'reservationVol'])->name('reservation');

// Page de confirmation et récapitulatif de la commande 
Route::get('/flyzo/recap_commande', function () {return view('Flyzo.recap_commande');});
Route::post('/flyzo/recap_commande', [ControllerPassager::class, 'createReservation'])->name('passager_reservation');

// Page du panier
Route::get('/flyzo/panier', function () {return view('Flyzo.panier');});
Route::get('/flyzo/panier', [ControllerPanier::class, 'showVolPanier'])->name('panier');

// Page de confirmation d'ajout dans le panier
Route::get('/flyzo/confirm_panier', function() {return view('Flyzo.confirm_add_panier');});
Route::post('/flyzo/confirm_panier', [ControllerPanier::class, 'addPanier'])->name('confirm_panier');


// Page de confirmation de suppression du panier
Route::get('/flyzo/delete_panier', function () {return view('Flyzo.confirm_delete_panier');});
Route::post('/flyzo/delete_panier', [ControllerPanier::class, 'deletePanier'])->name('delete_panier');

// Page de choix des passagers
Route::get('/flyzo/reservation_panier', function () {return view('Flyzo.reservation_panier');});
Route::post('/flyzo/reservation_panier', [ControllerPanier::class, 'reservationPanier'])->name('reservation_panier');

// Page de récapitulatif des commandes avec le panier
Route::get('/flyzo/recap_panier', function () {return view('Flyzo.recap_panier');});
Route::post('/flyzo/recap_panier', [ControllerPassager::class, 'createPassagerPanier'])->name('panier_commande');

// Page d'erreur de quantité 
Route::get('flyzo/erreur_quantite', function() { return view('Flyzo.erreur_quantite');})->name('erreur_quantite');

// Page d'erreur de quantité avec le panier 
Route::get('flyzo/erreur_panier', function() { return view('Flyzo.erreur_panier');})->name('erreur_panier');






// Pages du gestionnaire :

// Page d'ajout de vols 
Route::get('/gestio/add', function () {return view('Gestionnaire.gestio_add_vol');});
Route::get('/gestio/add', [ControllerGestionnaire::class, 'GestioShowAeroport'])->name('gestio_add');

// Page de confirmation de création de vol 
Route::get('/gestio/confirm_add', function () {return view('Gestionnaire.gestio_confirm_add');});
Route::post('/gestio/confirm_add', [ControllerGestionnaire::class, 'GestioCreateVol'])->name('add');

// Page d'affichage des vols pour modifier ou supprimer 
Route::get('/gestio/edit', function () {return view('Gestionnaire.gestio_edit_vol');});
Route::get('/gestio/edit', [ControllerVol::class, 'showVol2'])->name('gestio_edit');

// Page de confirmation de suppression d'un vol 
Route::get('/gestio/confirm_delete', function () {return view('Gestionnaire.gestio_confirm_delete');});
Route::post('/gestio/confirm_delete', [ControllerGestionnaire::class, 'GestioDeleteVol'])->name('delete');

// Page de modification de vol
Route::get('/gestio/modify', function () {return view('Gestionnaire.gestio_modify_vol');});
Route::post('/gestio/modify', [ControllerGestionnaire::class, 'showVolModify'])->name('towards_modify');

// Page de confirmation de modification de vol 
Route::get('/gestio/confirm_modify', function () {return view('Gestionnaire.gestio_confirm_modify');});
Route::post('/gestio/confirm_modify', [ControllerGestionnaire::class, 'GestioModifyVol'])->name('modify');

// Page d'affichage de tout les clients
Route::get('/gestio/client', function () {return view('Gestionnaire.gestio_client');});
Route::get('/gestio/client', [ControllerPassager::class, 'showPassager'])->name('gestio_client');

// Page d'affichage de tout les réservations d'un client 
Route::get('/gestio/reservation', function () {return view('Gestionnaire.gestio_reservation');});
Route::post('/gestio/reservation', [ControllerPassager::class, 'showReservationClient'])->name('reservation_client');

// Page d'affichage des places et nombre de billets vendus des vols
Route::get('/gestio/place', function () {return view('Gestionnaire.gestio_place');});
Route::get('/gestio/place', [ControllerGestionnaire::class, 'GestioShowPlace'])->name('gestio_place');

// Page d'affichage de tout les passagers d'un vol
Route::get('/gestio/passager', function () {return view('Gestionnaire.gestio_passager');});
Route::post('/gestio/passager', [ControllerGestionnaire::class, 'GestioShowPassager'])->name('gestio_passager');

// Pour le bouton compte et certains boutons retour   
Route::get('/gestio/account', function () {return view('Gestionnaire.account');})->name('account_co');

// Pour le bouton login
Route::get('/gestio/login', function () {return view('auth.login');})->name('login');




//Partie authentification :

// Page de création du compte 
Route::get('/create', [ControllerAuthentification::class, 'createForm']); 
Route::post('/create', [ControllerAuthentification::class, 'create'])->name('auth.createLogin');
    
// Page de connexion
Route::get('/login', [ControllerAuthentification::class, 'login']);
Route::post('/login', [ControllerAuthentification::class, 'doLogin'])->name('auth.login');
    
// Page d'acceuil du gestionnaire 
Route::get('/compte', [ControllerAuthentification::class, 'account'])->middleware('auth')->name('auth.compte');
    
// Pour le bouton logout 
Route::delete('/logout', [ControllerAuthentification::class, 'logout'])->name('auth.logout');
    