<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeroport;
use App\Models\Passager;
use App\Models\Vol;
use App\Models\PassagerVol;
use App\Models\PanierVol;

class ControllerPassager extends Controller
{

    public function showPassager(Request $request) {
        $listepassager = Passager::all();
        return view('Gestionnaire.gestio_client',['listepassager' => $listepassager]);
    }

    public function showReservationClient(Request $request) {
        $listereservation = PassagerVol::all();
        $passager_id = $request -> get('passager_id');
        $passager = Passager::find($passager_id);
        return view('Gestionnaire.gestio_reservation',['listereservation' => $listereservation,
        'passager' => $passager]);
    }


    public function afficheListePassager() {
        $listeP = Passager::all();
        return $listeP;
    }
    
    public function afficheListeReservation() {
        $listeR = PassagerVol::all();
        return $listeR;
    }

    public function reservationVol(Request $request) {
        $vol_id = $request -> get('vol_id');
        $vol = Vol::find($vol_id);
        if ($vol->places == 0) {
            return view('Flyzo.erreur_quantite');
        }
        return view('Flyzo.reservation',['vol' => $vol]);
    }


    public function createReservation(Request $request) {
        $prenom = $request -> get('prenom');
        $nom = $request -> get('nom');
        $email = $request -> get('email');
        
        $p = new Passager();
        $p -> prenom = $prenom;
        $p -> nom = $nom;
        $p -> email = $email;
        $p -> save();

        $vol_id = $request -> get('vol_id');
        
        $vol = Vol::find($vol_id);
        $places = $vol -> places;
        $places = $places - 1;
        $vol -> places = $places;
        $vol -> save();

        $v_p = new PassagerVol();
        $v_p-> passager_id = $p -> id;
        $v_p-> vol_id = $vol_id;
        $v_p -> quantite = 1;
        $v_p->save();

        return view('Flyzo.recap_commande', ['reservation' => $v_p]);
    }
    
    public function createPassagerPanier(Request $request) {
        $vols = $request->input('vols');
        $passagers = $request->input('passagers');
        $passagers_email = $request->input('passagers_email');
        
        $quantite_par_vol = []; 
        
        foreach ($vols as $v) {
        $vol = Vol::find($v['id']);
        $quantite_restante = $v['quantite'];

        $i = 0;
        while ($quantite_restante > 0 && isset($passagers[$i])) {
            $passagerData = $passagers[$i];

            $passager = Passager::where('nom', $passagerData['nom'])
                ->where('prenom', $passagerData['prenom'])
                ->where('email', $passagers_email)
                ->first();

            if (!$passager) {
                $passager = new Passager();
                $passager->nom = $passagerData['nom'];
                $passager->prenom = $passagerData['prenom'];
                $passager->email = $passagers_email;
                $passager->save();
            }

            $v_p = new PassagerVol();
            $v_p->passager_id = $passager->id;
            $v_p->vol_id = $vol->id;
            $v_p->quantite = 1;
            $v_p->save();

            $quantite_restante--;
            $i++;
        }

        $quantite_par_vol[$vol->id] = $v['quantite'];
        $listevol = Vol::all();
    }

    return view('Flyzo.recap_panier', [
        'passagers' => $passagers,
        'passagers_email' => $passagers_email,
        'quantite_par_vol' => $quantite_par_vol,
        'listevol' => $listevol
    ]);
}

}



