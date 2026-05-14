@extends('template')
@section('titre', 'Réservation avec le panier')
@section('header_container', 'container-fluid p-5 text-warning bg-res')
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
                <a href="{{ route('panier') }}" class="nav-link btn btn-outline-light text-warning" style="display:flex; align-items:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16"style = "margin-right: 5px; margin-top:5px;">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                </svg>
                     Retour
                </a>
            </li>
        </ul>
    </div>
</nav>
@endsection

@section('content')
    <div class ="bg-bl rounded my-4 py-4 text-center text-warning">
    <strong>Réservez vos vols en tapant vos coordonnées et potentiellement celles d'autres passagers.</strong>
    <br>
    <strong>Prix total :</strong>
    <strong class="text-danger">{{ $prix_total }} €</strong>

</div>
<hr>

<div class="container mt-5 pt-3 pb-3 bg-bl text-warning rounded">
    <h2 class="text-warning text-center"><strong>Vos coordonnées pour la réservation</strong></h2>
    <form action="{{ route('panier_commande') }}" method="POST">
            @php
                $max_passagers = 0;
                foreach ($vols as $info) {
                    if ($info['quantite'] > $max_passagers) {
                        $max_passagers = $info['quantite'];
                    }
                }
            @endphp

            @for ($i = 0; $i < $max_passagers; $i++)
                <div class="mb-3 mt-3">
                    <label for="no"><strong>Nom du passager {{ $i + 1 }} </strong></label>
                    <input type="text" class="form-control" id="nom" name="passagers[{{ $i }}][nom]" required>
                </div>
                <div class="mb-3">
                    <label for="pr"><strong>Prénom du passager {{ $i + 1 }} </strong></label>
                    <input type="text" class="form-control" id="prenom" name="passagers[{{ $i }}][prenom]" required>
                </div>
                @if ($i == 0)
                    <div class="mb-3 mt-3">
                        <label for="em"><strong>Email du passager {{ $i + 1}} </strong></label>
                        <input type="email" class="form-control" id="email" name="passagers_email" required>
                    </div>
                @endif
                <hr>
            @endfor
            @foreach ($vols as $v => $vol)
            <input type="hidden" name="vols[{{ $v }}][id]" value="{{ $vol['id'] }}">
            <input type="hidden" name="vols[{{ $v }}][quantite]" value="{{ $vol['quantite'] }}">
        @endforeach
            <button type="submit" class="btn btn-primary btn-md">Réserver ces vols</button>
            @csrf
        </form>
    </div>
@endsection

<style>
        .bg-res{
        background-image : url('/images/res1.jpg');
        background-size : 1000px;
        background-repeat : repeat;
        background-position:center;
         }.bg-bl {
  background-image : url('/images/bck3.png');
    background-size : cover;
    background-repeat : no-repeat;
    background-position :center;
}

    </style>