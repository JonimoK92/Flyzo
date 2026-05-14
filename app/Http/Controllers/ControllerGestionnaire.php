<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Aeroport;
use App\Models\Passager;
use App\Models\Vol;
use App\Models\PassagerVol;
use App\Models\PanierVol;

class ControllerGestionnaire extends Controller {


public function GestioCreateVol(Request $request) {
        
        $numero = $request -> get('numero');
        $jour_d = $request -> get('jour_depart');
        $jour_a = $request -> get('jour_arrivee');
        $heure_depart = $request -> get('heure_depart');
        $heure_arrivee = $request -> get('heure_arrivee');
        $places = $request -> get('places');
        $prix = $request -> get('prix');
        $depart_aeroport = $request -> get('depart_aeroport');
        $final_aeroport = $request -> get('final_aeroport');

        $jour_depart = Carbon::parse($jour_d)->format('d/m/Y');
        $jour_arrivee = Carbon::parse($jour_a)->format('d/m/Y');


        $depart = Aeroport::where('nom', $depart_aeroport)->first();
        $arrivee = Aeroport::where('nom', $final_aeroport)->first();

        if ($depart !== null && $arrivee !== null) {
            
            $depart_id = $depart -> id;
            $arrivee_id = $arrivee -> id;

            $vol = new Vol();
            $vol -> numero = $numero;
            $vol -> jour_depart = $jour_depart;
            $vol -> jour_arrivee = $jour_arrivee;
            $vol -> heure_depart = $heure_depart;
            $vol -> heure_arrivee = $heure_arrivee;
            $vol -> places = $places;
            $vol -> prix = $prix;
            $vol -> depart_aeroport_id = $depart_id;
            $vol -> final_aeroport_id = $arrivee_id;
            $vol -> save();

            return view('Gestionnaire.gestio_confirm_add', ['vol' => $vol]);
        } else {
            return redirect()->back()->with('error', 'Aéroport non trouvé.');
        }
    }

    public function GestioDeleteVol(Request $request) {
        $vol_id = $request->get('vol_id');
        $vol = Vol::find($vol_id);
        $vol->delete();
        return view('Gestionnaire.gestio_confirm_delete');
     }

     public function showVolModify(Request $request) {
        $id_vol = $request->get('id_vol');
        $vol = Vol::find($id_vol);
        $jour_d = $vol -> jour_depart;
        $jour_a = $vol -> jour_arrivee;
        $jour_depart = Carbon::createFromFormat('d/m/Y', $jour_d)->format('Y-m-d');
        $jour_arrivee = Carbon::createFromFormat('d/m/Y', $jour_a)->format('Y-m-d');
        $listeaeroport = Aeroport::all();
        return view('Gestionnaire.gestio_modify_vol', ['vol' => $vol, 'listeaeroport' => $listeaeroport,
        'jour_depart' => $jour_depart, 'jour_arrivee' => $jour_arrivee]);
     }

     public function GestioShowPlace(Request $request) {
        $listevol = Vol::all();
        $listereservation = PassagerVol::all();
        return view('Gestionnaire.gestio_place',['listevol' => $listevol, 'listereservation' => $listereservation]);
     }

     public function GestioShowPassager(Request $request) {
        $vol_id = $request->get('vol_id');
        $vol = Vol::find($vol_id);
        $listereservation = PassagerVol::all();
        return view('Gestionnaire.gestio_passager',['vol' => $vol, 'listereservation' => $listereservation]);
     }

     public function GestioShowAeroport(Request $request) {
        $listeaeroport = Aeroport::all();
        return view('Gestionnaire.gestio_add_vol',['listeaeroport' => $listeaeroport]);
     }

     public function GestioModifyVol(Request $request) {

        $numero = $request -> get('m_numero');
        $jour_d = $request -> get('m_jour_depart');
        $jour_a = $request -> get('m_jour_arrivee');
        $heure_depart = $request -> get('m_heure_depart');
        $heure_arrivee = $request -> get('m_heure_arrivee');
        $places = $request -> get('m_places');
        $prix = $request -> get('m_prix');
        $depart_aeroport = $request -> get('m_depart_aeroport');
        $final_aeroport = $request -> get('m_final_aeroport');

        
        $jour_depart = Carbon::parse($jour_d)->format('d/m/Y');
        $jour_arrivee = Carbon::parse($jour_a)->format('d/m/Y');

        $depart = Aeroport::where('nom', $depart_aeroport)->first();
        $arrivee = Aeroport::where('nom', $final_aeroport)->first();

        if ($depart !== null && $arrivee !== null) {

            $id_vol = $request->get('id_vol2');
            $vol = Vol::find($id_vol);
            
            $depart_id = $depart -> id;
            $arrivee_id = $arrivee -> id;

            $vol -> numero = $numero;
            $vol -> jour_depart = $jour_depart;
            $vol -> jour_arrivee = $jour_arrivee;
            $vol -> heure_depart = $heure_depart;
            $vol -> heure_arrivee = $heure_arrivee;
            $vol -> places = $places;
            $vol -> prix = $prix;
            $vol -> depart_aeroport_id = $depart_id;
            $vol -> final_aeroport_id = $arrivee_id;
            $vol -> save();


            return view('Gestionnaire.gestio_confirm_modify', ['vol' => $vol]);
        } else {
            return redirect()->back()->with('error', 'Aéroport non trouvé.');
        }
    }
}
 

