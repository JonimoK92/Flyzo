@extends('template')
@section('titre','Flyzo')
@section('content')
@section('header_container', 'container-fluid p-5 text-warning d-flex align-items-center bg-avion')
@section('header')
<img src="{{ asset('images/logo.png') }}" alt="logo" width="150" height="120">
@endsection

@section('nav')


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav" style="margin-right: auto;">
            <li class="nav-item" style="margin-right: 2rem;">
                <button type="button" class="btn btn-outline-light text-warning" style="display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" style="margin-right: 5px;">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                    </svg>
                    Home     
                </button>   
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

<div class="container-fluid bg-primary text-white pt-5 text-center" style="padding-bottom: 80px; padding-left:100px;">
  <h1 style= "margin-top : 30px;"><strong>Trouvez votre prochain séjour</strong></h1>
  <br>
  <p>Réservez votre vol au meilleur prix et envolez-vous !</p>

  
</div>
@endsection

<div class="container bg-warning rounded pt-3 pb-1" style="margin-top: -5rem;">
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
        <select class="form-control form-control-lg" name="aeroport_arrivee_form" >
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

@endsection

<style>
  .bg-avion{
    background-image : url('/images/avion.jpg');
    background-size : 2000px;
    background-repeat : no-repeat;
    background-position : center;
  }

</style>