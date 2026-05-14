<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeroport;
use App\Models\Passager;
use App\Models\Vol;
use App\Models\PassagerVol;
use App\Models\PanierVol;

class ControllerPanier extends Controller
{

    public function afficheListePanier(Request $request) {
        $listeLP = PanierVol::all();
        return $listeLP;
    }

    public function addPanier(Request $request) {
        $id_vol = $request->get('id_vol');
        $quantite_add = $request->get('vol_quantite');
        $vol = Vol::find($id_vol);
        
        $panier_existe = PanierVol::where('vol_id', $id_vol)->first();

        if ($panier_existe !== null) {
            
            $quantite = $panier_existe -> quantite;
            $panier_existe -> quantite = $quantite + $quantite_add;
            $panier_existe -> save();
        } else {

            $panier = new PanierVol();
            $panier -> vol_id = $id_vol;
            $panier -> quantite = $quantite_add;
            $panier -> save();
        }
        
        return view('Flyzo.confirm_add_panier', ['vol' => $vol]);
     }

     public function showVolPanier(Request $request) {
        $panier = PanierVol::all();
        return view('Flyzo.panier', ['panier' => $panier]);
     }

     public function deletePanier(Request $request) {
        $panier_id = $request->get('panier_id');
        $panier = PanierVol::find($panier_id);
        $panier->delete();
        return view('Flyzo.confirm_delete_panier');
     }
     
     public function createReservationPanier(Request $request) {
        $prenom = $request -> get('prenom');
        $nom = $request -> get('nom');
        $email = $request -> get('email');
        
        $p = new Passager();
        $p -> prenom = $prenom;
        $p -> nom = $nom;
        $p -> email = $email;
        $p -> save();

        $vol_id = $request -> get('vol_id');
        $quantite = $request -> get('quantite_vol');
        
        $vol = Vol::find($vol_id);
        $places = $vol -> places;
        $places = $places - $quantite;
        $vol -> places = $places;
        $vol -> save();

        $v_p = new PassagerVol();
        $v_p-> passager_id = $p -> id;
        $v_p-> vol_id = $vol_id;
        $v_p -> quantite = $quantite;
        $v_p->save();

        return view('Flyzo.recap_commande', ['reservation' => $v_p]);
    } 

    public function reservationPanier(Request $request) {
        $vols = $request->input('vols');
        $prix_total = 0;
    
        foreach ($vols as $volId => $val) {
            $vol = Vol::find($volId);
            if ($val['quantite'] > $vol->places) {
                return view('Flyzo.erreur_panier', ['vol' => $vol]);
            }
            $prix_total += $val['quantite'] * $val['prix'];
        }
    
        return view('Flyzo.reservation_panier', ['vols' => $vols, 'prix_total' => $prix_total]);
    }

}
