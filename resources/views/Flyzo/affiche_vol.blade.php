@extends('template')
@section('titre', 'Vols disponibles')
@section('header_container', 'container-fluid py-5 text-warning bg-voldisp')
@section('header')
@endsection

@section('nav')


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item" style="margin-right: 2rem;">
                <a href="{{ route('page_home') }}" class="nav-link btn btn-outline-light text-warning" style="display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" style="margin-right: 5px;">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                    </svg>
                    Home
                </a>
            </li>
        
            <li class="nav-item" style="margin-right: 0.5rem;">
                <a href="{{ route('affiche_vol') }}" class="nav-link btn btn-outline-light text-warning" style="display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16" style="margin-right: 5px;">
                        <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599"/>
                    </svg>
                    Vols
                </a>
            </li>

        <li class="nav-item" style="margin-left: 1rem; margin-right: 0.5rem;">
                <a href="{{ route('panier') }}" class="nav-link btn btn-outline-light text-warning" style="display:flex; align-items:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16" style = "margin-right: 5px;">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                     Panier
                </a>
            </li>

            <li class="nav-item" style="margin-left: 1rem; margin-right: 0.5rem;">
                <a href="{{ route('page_home') }}" class="nav-link btn btn-outline-light text-warning" style="display:flex; align-items:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16"style = "margin-right: 5px; margin-top:5px;">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                </svg>
                     Retour
                </a>
            </li>
            
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item" style="margin-left: 1rem;">
                <a href="{{ route('auth.login') }}" class="nav-link btn btn-outline-light text-warning" style="display:flex; align-items:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style = "margin-right: 5px;">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                     Se connecter
                </a>
            </li>
       </ul>
    </div>
</nav>
@endsection


@section('content')



<div class = "bg-bl rounded text-center my-4 py-4 text-warning">
    <h2><strong>Tous les vols disponibles </strong></h2>
</div>


    <div class="container bg-warning rounded pt-3 pb-1 mt-5 mb-4" style="margin-top: -5rem;">
<form action="{{ route('filtre_vol') }}" method="POST">
    <div class="row gx-2"> <div class="col">
    <select class="form-control form-control-lg" name="aeroport_depart_form" >
        <option value="" disabled selected hidden>Aéroport de départ :</option>
        @foreach($listeaeroport as $aeroport)
            <option value="{{ $aeroport->nom }}">{{ $aeroport->nom }}</option>
        @endforeach
    </select>
        </div>
        <div class="col">
        <select class="form-control form-control-lg" name="aeroport_arrivee_form">
        <option value="" disabled selected hidden>Aéroport d'arrivée :</option>
        @foreach($listeaeroport as $aeroport)
            <option value="{{ $aeroport->nom }}">{{ $aeroport->nom }}</option>
        @endforeach
    </select>
        </div>
        <div class="col">
            <input type="date" class="form-control form-control-lg" placeholder="Date de départ :" name="date_depart_form">
        </div>
        <div class="col">
            <input type="date" class="form-control form-control-lg" placeholder="Date d'arrivée :" name="date_arrivee_form">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success btn-lg w-100">Rechercher</button>
        </div>
    </div>
    @csrf
</form>
</div>

    <div class="container mt-5">

        <div class="row justify-content-center bg-bl rounded"> 
            @foreach ($listevol as $liste)
            <div class="col-md-2 small-case p-4 my-3 border rounded-4 me-5 mb-2 bg-warning">
                <img src="{{ asset('images/voyage_avion.jpg') }}" alt="Image avion">
                <hr class="my-5">
                <p>Numéro : <strong>{{$liste->numero}}</strong></p>
                <p><strong>{{ $liste->depart_aeroport->nom }} - {{ $liste->final_aeroport->nom }}</strong></p>
                <p>Départ le : <strong>{{ $liste->jour_depart }} </strong> à <strong> {{$liste->heure_depart}} </strong> </p>
                <p>Arrivée le : <strong> {{ $liste->jour_arrivee }} </strong> à <strong> {{$liste->heure_arrivee}} </strong> </p>
                <p>Prix : <strong class="text-danger">{{ $liste->prix }} €</strong></p>

            <form action="{{ route('reservation') }}" method="POST">
                <input type = "hidden" name ="vol_id" value = "{{ $liste->id }} ">
                    <button type="submit" class="btn btn-primary btn-md bg-primary">Réserver le vol</button>    
                    @csrf
            </form>
            <form action="{{ route('confirm_panier') }}" method="POST">
            <p>Quantité :</p><input type="number" name="vol_quantite" value="1" class="small-input" min="1">
                <input type = "hidden" name ="id_vol" value = "{{ $liste->id }} ">
                    <button type="submit" class="btn btn-primary btn-md bg-success">Ajouter au panier</button>
                    @csrf
            </form>
            </div>
            @endforeach



        </div>
    </div>

@endsection


<style>
        .small-case {
            text-align: center;
        }

        .small-case img {
            max-width: 100%; 
            height: auto;
            padding: 1em;
        }

        .small-case p {
            font-size: 0.8em; 
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .small-case hr {
        margin-top: 1em;
        margin-bottom: 1em;
        }


        .small-input {
             width: 52px; 
            height: 30px; 
            padding: 6px;
            font-size: 14px;
            border-radius: 10px;
            margin-bottom :9px;
        
        }
        .bg-voldisp{
        background-image : url('/images/voldisp.jpg');
        background-size : 1000px;
        background-repeat : repeat;
        background-position:center;
        }
        .bg-bl {
  background-image : url('/images/g.jpg');
    background-size : cover;
    background-repeat : no-repeat;
    background-position :center;
}

    </style>