<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeroport;
use App\Models\Passager;
use App\Models\Vol;
use App\Models\PassagerVol;
use App\Models\PanierVol;

class ControllerAeroport extends Controller
{
    public function showAeroport() {
        $listeaeroport = Aeroport::all();
        return view('Flyzo.page_home',['listeaeroport' => $listeaeroport]);
    }

    public function showAeroport1() {
        $listeaeroport = Aeroport::all();
        return view('Flyzo.affiche_vol',['listeaeroport' => $listeaeroport]);
    }

    public function afficheListeAeroport() {
        $listeA = Aeroport::all();
        return $listeA;
    }

    public function createAeroport() {
        $a = new Aeroport();
        $a -> nom = "Paris";
        $a -> save();

        $a1 = new Aeroport();
        $a1 -> nom = "Bruxelles";
        $a1 -> save();

        $a2 = new Aeroport();
        $a2 -> nom = "Londres";
        $a2 -> save();

        $a3 = new Aeroport();
        $a3 -> nom = "Berlin";
        $a3 -> save();

        $a4 = new Aeroport();
        $a4->nom = "Madrid";
        $a4 -> save();

        $listeA = Aeroport::all();
        return $listeA;

    }
}
