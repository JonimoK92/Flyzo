<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Aeroport;
use App\Models\Passager;
use App\Models\Vol;
use App\Models\PassagerVol;
use App\Models\PanierVol;

class ControllerVol extends Controller
{
    public function showVolEtAeroport(Request $request) {
        $listeaeroport = Aeroport::all();
        $listevol = Vol::all();
        return view('Flyzo.affiche_vol',['listevol' => $listevol,'listeaeroport' =>$listeaeroport]);
    }

    public function showVol2(Request $request) {
        $listevol = Vol::all();
        return view('Gestionnaire.gestio_edit_vol',['listevol' => $listevol]);
    }
    


    public function form_filtre(Request $request){

        $listeaeroport = Aeroport::all();
        $departAeroport = $request->post('aeroport_depart_form');
        $arriveeAeroport = $request->post('aeroport_arrivee_form');
        $dateDepartForm = $request->post('date_depart_form');
        $dateArriveeForm = $request->post('date_arrivee_form');
        $vols_filtree = Vol::query();
        if( $departAeroport ){
            $vols_filtree->whereHas('depart_aeroport',function ($query) use ($departAeroport){
                $query->where('nom',$departAeroport);
            });
        }
        if($arriveeAeroport){
            $vols_filtree->whereHas('final_aeroport',function ($query) use ($arriveeAeroport){
                $query->where('nom',$arriveeAeroport);
            });
        }
        if($dateDepartForm){
            $dateDepartBD = Carbon::parse($dateDepartForm)->format('d/m/Y');
            $vols_filtree->where('jour_depart', $dateDepartBD);
        }
        if($dateArriveeForm){
            $dateArriveeBD = Carbon::parse($dateArriveeForm)->format('d/m/Y');
            $vols_filtree->where('jour_arrivee', $dateArriveeBD);
        }
        $vols_filtree = $vols_filtree->get();
        return view('Flyzo.vol_filtre', ['vols_fl' => $vols_filtree,'listeaeroport' =>$listeaeroport]);
    }
    

    public function afficheVol(): View
    {
        return view('Flyzo.affiche_vol');
    }

    public function afficheListeVol() {
        $listeV = Vol::all();
        return $listeV;
    }


    public function createVol() {
        $Paris = Aeroport::where('nom','Paris')->first();
        $Paris_id = $Paris -> id;
    
        $Madrid = Aeroport::where('nom','Madrid')->first();
        $Madrid_id = $Madrid -> id;
    
        $Londres = Aeroport::where('nom','Londres')->first();
        $Londres_id = $Londres -> id;
    
        $Berlin = Aeroport::where('nom','Berlin')->first();
        $Berlin_id = $Berlin -> id;
    
        $Bruxelles = Aeroport::where('nom','Bruxelles')->first();
        $Bruxelles_id = $Bruxelles -> id;
    
        $vol = new Vol();
        $vol -> numero = "VOL100";
        $vol -> jour_depart = "01/04/2025";
        $vol -> jour_arrivee = "06/04/2025";
        $vol -> heure_depart = "08:00";
        $vol -> heure_arrivee = "10:30";
        $vol -> places = 200;
        $vol -> prix = 150;
        $vol -> depart_aeroport_id = $Paris_id;
        $vol -> final_aeroport_id = $Madrid_id;
        $vol -> save();
    
        $vol1 = new Vol();
        $vol1 -> numero = "VOL101";
        $vol1 -> jour_depart = "06/04/2025";
        $vol1 -> jour_arrivee = "11/04/2025";
        $vol1 -> heure_depart = "09:00";
        $vol1 -> heure_arrivee = "11:00";
        $vol1 -> places = 180;
        $vol1 -> prix = 170;
        $vol1 -> depart_aeroport_id = $Madrid_id;
        $vol1 -> final_aeroport_id = $Paris_id;
        $vol1 -> save();
    
        $vol2 = new Vol();
        $vol2 -> numero = "VOL102";
        $vol2 -> jour_depart = "02/04/2025";
        $vol2 -> jour_arrivee = "07/04/2025";
        $vol2 -> heure_depart = "10:00";
        $vol2 -> heure_arrivee = "12:20";
        $vol2 -> places = 220;
        $vol2 -> prix = 200;
        $vol2 -> depart_aeroport_id = $Paris_id;
        $vol2 -> final_aeroport_id = $Berlin_id;
        $vol2 -> save();
    
        $vol3 = new Vol();
        $vol3 -> numero = "VOL103";
        $vol3 -> jour_depart = "07/04/2025";
        $vol3 -> jour_arrivee = "12/04/2025";
        $vol3 -> heure_depart = "07:30";
        $vol3 -> heure_arrivee = "09:45";
        $vol3 -> places = 170;
        $vol3 -> prix = 180;
        $vol3 -> depart_aeroport_id = $Berlin_id;
        $vol3 -> final_aeroport_id = $Paris_id;
        $vol3 -> save();
    
        $vol4 = new Vol();
        $vol4 -> numero = "VOL104";
        $vol4 -> jour_depart = "03/04/2025";
        $vol4 -> jour_arrivee = "08/04/2025";
        $vol4 -> heure_depart = "11:00";
        $vol4 -> heure_arrivee = "12:30";
        $vol4 -> places = 160;
        $vol4 -> prix = 190;
        $vol4 -> depart_aeroport_id = $Paris_id;
        $vol4 -> final_aeroport_id = $Londres_id;
        $vol4 -> save();
    
        $vol5 = new Vol();
        $vol5 -> numero = "VOL105";
        $vol5 -> jour_depart = "08/04/2025";
        $vol5 -> jour_arrivee = "13/04/2025";
        $vol5 -> heure_depart = "13:00";
        $vol5 -> heure_arrivee = "14:45";
        $vol5 -> places = 210;
        $vol5 -> prix = 160;
        $vol5 -> depart_aeroport_id = $Londres_id;
        $vol5 -> final_aeroport_id = $Paris_id;
        $vol5 -> save();
    
        $vol6 = new Vol();
        $vol6 -> numero = "VOL106";
        $vol6 -> jour_depart = "04/04/2025";
        $vol6 -> jour_arrivee = "09/04/2025";
        $vol6 -> heure_depart = "14:00";
        $vol6 -> heure_arrivee = "15:30";
        $vol6 -> places = 190;
        $vol6 -> prix = 210;
        $vol6 -> depart_aeroport_id = $Paris_id;
        $vol6 -> final_aeroport_id = $Bruxelles_id;
        $vol6 -> save();
    
        $vol7 = new Vol();
        $vol7 -> numero = "VOL107";
        $vol7 -> jour_depart = "09/04/2025";
        $vol7 -> jour_arrivee = "14/04/2025";
        $vol7 -> heure_depart = "16:00";
        $vol7 -> heure_arrivee = "17:30";
        $vol7 -> places = 230;
        $vol7 -> prix = 220;
        $vol7 -> depart_aeroport_id = $Bruxelles_id;
        $vol7 -> final_aeroport_id = $Paris_id;
        $vol7 -> save();
    
        $vol8 = new Vol();
        $vol8 -> numero = "VOL108";
        $vol8 -> jour_depart = "05/04/2025";
        $vol8 -> jour_arrivee = "10/04/2025";
        $vol8 -> heure_depart = "17:00";
        $vol8 -> heure_arrivee = "19:10";
        $vol8 -> places = 250;
        $vol8 -> prix = 230;
        $vol8 -> depart_aeroport_id = $Madrid_id;
        $vol8 -> final_aeroport_id = $Berlin_id;
        $vol8 -> save();
    
        $vol9 = new Vol();
        $vol9 -> numero = "VOL109";
        $vol9 -> jour_depart = "10/04/2025";
        $vol9 -> jour_arrivee = "15/04/2025";
        $vol9 -> heure_depart = "06:00";
        $vol9 -> heure_arrivee = "08:15";
        $vol9 -> places = 195;
        $vol9 -> prix = 240;
        $vol9 -> depart_aeroport_id = $Berlin_id;
        $vol9 -> final_aeroport_id = $Madrid_id;
        $vol9 -> save();
    
        $vol10 = new Vol();
        $vol10 -> numero = "VOL110";
        $vol10 -> jour_depart = "11/04/2025";
        $vol10 -> jour_arrivee = "16/04/2025";
        $vol10 -> heure_depart = "12:00";
        $vol10 -> heure_arrivee = "13:20";
        $vol10 -> places = 200;
        $vol10 -> prix = 250;
        $vol10 -> depart_aeroport_id = $Madrid_id;
        $vol10 -> final_aeroport_id = $Bruxelles_id;
        $vol10 -> save();
    
        $vol11 = new Vol();
        $vol11 -> numero = "VOL111";
        $vol11 -> jour_depart = "12/04/2025";
        $vol11 -> jour_arrivee = "17/04/2025";
        $vol11 -> heure_depart = "15:00";
        $vol11 -> heure_arrivee = "17:00";
        $vol11 -> places = 180;
        $vol11 -> prix = 200;
        $vol11 -> depart_aeroport_id = $Bruxelles_id;
        $vol11 -> final_aeroport_id = $Madrid_id;
        $vol11 -> save();
    
        $vol12 = new Vol();
        $vol12 -> numero = "VOL112";
        $vol12 -> jour_depart = "13/04/2025";
        $vol12 -> jour_arrivee = "18/04/2025";
        $vol12 -> heure_depart = "08:30";
        $vol12 -> heure_arrivee = "09:50";
        $vol12 -> places = 160;
        $vol12 -> prix = 180;
        $vol12 -> depart_aeroport_id = $Berlin_id;
        $vol12 -> final_aeroport_id = $Londres_id;
        $vol12 -> save();
    
        $vol13 = new Vol();
        $vol13 -> numero = "VOL113";
        $vol13 -> jour_depart = "14/04/2025";
        $vol13 -> jour_arrivee = "19/04/2025";
        $vol13 -> heure_depart = "10:00";
        $vol13 -> heure_arrivee = "11:40";
        $vol13 -> places = 200;
        $vol13 -> prix = 175;
        $vol13 -> depart_aeroport_id = $Londres_id;
        $vol13 -> final_aeroport_id = $Berlin_id;
        $vol13 -> save();
    
        $vol14 = new Vol();
        $vol14 -> numero = "VOL114";
        $vol14 -> jour_depart = "15/04/2025";
        $vol14 -> jour_arrivee = "20/04/2025";
        $vol14 -> heure_depart = "06:00";
        $vol14 -> heure_arrivee = "08:30";
        $vol14 -> places = 180;
        $vol14 -> prix = 220;
        $vol14 -> depart_aeroport_id = $Berlin_id;
        $vol14 -> final_aeroport_id = $Londres_id;
        $vol14 -> save();
    
        $vol15 = new Vol();
        $vol15 -> numero = "VOL115";
        $vol15 -> jour_depart = "16/04/2025";
        $vol15 -> jour_arrivee = "21/04/2025";
        $vol15 -> heure_depart = "11:00";
        $vol15 -> heure_arrivee = "13:10";
        $vol15 -> places = 220;
        $vol15 -> prix = 210;
        $vol15 -> depart_aeroport_id = $Paris_id;
        $vol15 -> final_aeroport_id = $Bruxelles_id;
        $vol15 -> save();
    
        $vol16 = new Vol();
        $vol16 -> numero = "VOL116";
        $vol16 -> jour_depart = "17/04/2025";
        $vol16 -> jour_arrivee = "22/04/2025";
        $vol16 -> heure_depart = "08:00";
        $vol16 -> heure_arrivee = "09:20";
        $vol16 -> places = 200;
        $vol16 -> prix = 180;
        $vol16 -> depart_aeroport_id = $Bruxelles_id;
        $vol16 -> final_aeroport_id = $Paris_id;
        $vol16 -> save();
    
        $vol17 = new Vol();
        $vol17 -> numero = "VOL117";
        $vol17 -> jour_depart = "18/04/2025";
        $vol17 -> jour_arrivee = "23/04/2025";
        $vol17 -> heure_depart = "15:00";
        $vol17 -> heure_arrivee = "16:30";
        $vol17 -> places = 210;
        $vol17 -> prix = 200;
        $vol17 -> depart_aeroport_id = $Paris_id;
        $vol17 -> final_aeroport_id = $Londres_id;
        $vol17 -> save();
    
        $vol18 = new Vol();
        $vol18 -> numero = "VOL118";
        $vol18 -> jour_depart = "19/04/2025";
        $vol18 -> jour_arrivee = "24/04/2025";
        $vol18 -> heure_depart = "12:30";
        $vol18 -> heure_arrivee = "14:00";
        $vol18 -> places = 220;
        $vol18 -> prix = 230;
        $vol18 -> depart_aeroport_id = $Londres_id;
        $vol18 -> final_aeroport_id = $Paris_id;
        $vol18 -> save();
    
        $vol19 = new Vol();
        $vol19 -> numero = "VOL119";
        $vol19 -> jour_depart = "20/04/2025";
        $vol19 -> jour_arrivee = "25/04/2025";
        $vol19 -> heure_depart = "14:00";
        $vol19 -> heure_arrivee = "15:30";
        $vol19 -> places = 210;
        $vol19 -> prix = 240;
        $vol19 -> depart_aeroport_id = $Paris_id;
        $vol19 -> final_aeroport_id = $Berlin_id;
        $vol19 -> save();
    
        $vol20 = new Vol();
        $vol20 -> numero = "VOL120";
        $vol20 -> jour_depart = "21/04/2025";
        $vol20 -> jour_arrivee = "26/04/2025";
        $vol20 -> heure_depart = "11:00";
        $vol20 -> heure_arrivee = "13:00";
        $vol20 -> places = 250;
        $vol20 -> prix = 250;
        $vol20 -> depart_aeroport_id = $Berlin_id;
        $vol20 -> final_aeroport_id = $Paris_id;
        $vol20 -> save();

        $vol21 = new Vol();
        $vol21 -> numero = "VOL121";
        $vol21 -> jour_depart = "22/04/2025";
        $vol21 -> jour_arrivee = "27/04/2025";
        $vol21 -> heure_depart = "10:00";
        $vol21 -> heure_arrivee = "12:30";
        $vol21 -> places = 230;
        $vol21 -> prix = 260;
        $vol21 -> depart_aeroport_id = $Paris_id;
        $vol21 -> final_aeroport_id = $Bruxelles_id;
        $vol21 -> save();
    
        $vol22 = new Vol();
        $vol22 -> numero = "VOL122";
        $vol22 -> jour_depart = "23/04/2025";
        $vol22 -> jour_arrivee = "28/04/2025";
        $vol22 -> heure_depart = "07:00";
        $vol22 -> heure_arrivee = "09:30";
        $vol22 -> places = 240;
        $vol22 -> prix = 230;
        $vol22 -> depart_aeroport_id = $Bruxelles_id;
        $vol22 -> final_aeroport_id = $Londres_id;
        $vol22 -> save();
    
        $vol23 = new Vol();
        $vol23 -> numero = "VOL123";
        $vol23 -> jour_depart = "24/04/2025";
        $vol23 -> jour_arrivee = "29/04/2025";
        $vol23 -> heure_depart = "13:00";
        $vol23 -> heure_arrivee = "14:30";
        $vol23 -> places = 200;
        $vol23 -> prix = 220;
        $vol23 -> depart_aeroport_id = $Londres_id;
        $vol23 -> final_aeroport_id = $Madrid_id;
        $vol23 -> save();
    
        $vol24 = new Vol();
        $vol24 -> numero = "VOL124";
        $vol24 -> jour_depart = "25/04/2025";
        $vol24 -> jour_arrivee = "30/04/2025";
        $vol24 -> heure_depart = "15:00";
        $vol24 -> heure_arrivee = "17:00";
        $vol24 -> places = 220;
        $vol24 -> prix = 240;
        $vol24 -> depart_aeroport_id = $Madrid_id;
        $vol24 -> final_aeroport_id = $Paris_id;
        $vol24 -> save();
    
        $vol25 = new Vol();
        $vol25 -> numero = "VOL125";
        $vol25 -> jour_depart = "26/04/2025";
        $vol25 -> jour_arrivee = "01/05/2025";
        $vol25 -> heure_depart = "10:30";
        $vol25 -> heure_arrivee = "12:00";
        $vol25 -> places = 250;
        $vol25 -> prix = 270;
        $vol25 -> depart_aeroport_id = $Paris_id;
        $vol25 -> final_aeroport_id = $Berlin_id;
        $vol25 -> save();
    
        $vol26 = new Vol();
        $vol26 -> numero = "VOL126";
        $vol26 -> jour_depart = "27/04/2025";
        $vol26 -> jour_arrivee = "02/05/2025";
        $vol26 -> heure_depart = "16:00";
        $vol26 -> heure_arrivee = "18:00";
        $vol26 -> places = 200;
        $vol26 -> prix = 250;
        $vol26 -> depart_aeroport_id = $Berlin_id;
        $vol26 -> final_aeroport_id = $Londres_id;
        $vol26 -> save();
    
        $vol27 = new Vol();
        $vol27 -> numero = "VOL127";
        $vol27 -> jour_depart = "28/04/2025";
        $vol27 -> jour_arrivee = "03/05/2025";
        $vol27 -> heure_depart = "07:30";
        $vol27 -> heure_arrivee = "09:50";
        $vol27 -> places = 210;
        $vol27 -> prix = 260;
        $vol27 -> depart_aeroport_id = $Londres_id;
        $vol27 -> final_aeroport_id = $Bruxelles_id;
        $vol27 -> save();
    
        $vol28 = new Vol();
        $vol28 -> numero = "VOL128";
        $vol28 -> jour_depart = "29/04/2025";
        $vol28 -> jour_arrivee = "04/05/2025";
        $vol28 -> heure_depart = "09:00";
        $vol28 -> heure_arrivee = "10:30";
        $vol28 -> places = 230;
        $vol28 -> prix = 280;
        $vol28 -> depart_aeroport_id = $Bruxelles_id;
        $vol28 -> final_aeroport_id = $Paris_id;
        $vol28 -> save();
    
        $vol29 = new Vol();
        $vol29 -> numero = "VOL129";
        $vol29 -> jour_depart = "30/04/2025";
        $vol29 -> jour_arrivee = "05/05/2025";
        $vol29 -> heure_depart = "13:30";
        $vol29 -> heure_arrivee = "15:00";
        $vol29 -> places = 240;
        $vol29 -> prix = 290;
        $vol29 -> depart_aeroport_id = $Paris_id;
        $vol29 -> final_aeroport_id = $Madrid_id;
        $vol29 -> save();
    
        $vol30 = new Vol();
        $vol30 -> numero = "VOL130";
        $vol30 -> jour_depart = "01/05/2025";
        $vol30 -> jour_arrivee = "06/05/2025";
        $vol30 -> heure_depart = "11:30";
        $vol30 -> heure_arrivee = "13:00";
        $vol30 -> places = 200;
        $vol30 -> prix = 300;
        $vol30 -> depart_aeroport_id = $Madrid_id;
        $vol30 -> final_aeroport_id = $Paris_id;
        $vol30 -> save();

        $listeV = Vol::all();
        return $listeV;
    }
}
