@extends('template')
@section('titre', 'Gestionnaire des réservations')
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
            <li class="nav-item" style="margin-left: 1rem; margin-right: 0.5rem;">
                <a href="{{ route('gestio_client') }}" class="nav-link btn btn-outline-light text-warning" style="display:flex; align-items:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16"style = "margin-right: 5px; margin-top:5px;">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                </svg>
                     Retour
                </a>
            </li>
    
        </ul>
        <ul class="navbar-nav"> 
                <li class="nav-item">
                    <form action="{{route('auth.logout')}}" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit" class="nav-link btn btn-outline-danger text-warning ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style= "margin-right: 5px;">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                      </svg>Logout</button>
                    </form>
                </li>
            </ul>
    </div>
</nav>
@endsection

@section('content')
    <div class = "bg-bl rounded text-center text-warning my-4 py-4">
    <h2><strong>Toutes les réservations de </strong></h2>
    <h2 class="text-warning"><strong> {{ $passager->prenom }} {{ $passager->nom }}</strong></h2>
</div>
    <hr >
    <div class="container mt-5">

        <div class="row justify-content-center bg-bl rounded"> 
            @foreach ($listereservation as $liste)
            @if ($liste->passager_id == $passager->id)
            <div class="col-md-2 small-case p-4 my-3 border rounded-4 me-5 mb-2 bg-warning">
                <img src="{{ asset('images/voyage_avion.jpg') }}" alt="Image avion">
                <hr class="my-5">
                <p>Numéro : <strong>{{$liste->vol->numero}}</strong></p>
                <p><strong>{{ $liste->vol->depart_aeroport->nom }} - {{ $liste->vol->final_aeroport->nom }}</strong></p>
                <p>Départ le : <strong>{{ $liste->vol->jour_depart }} </strong> à <strong> {{$liste->vol->heure_depart}} </strong> </p>
                <p>Arrivée le : <strong> {{ $liste->vol->jour_arrivee }} </strong> à <strong> {{$liste->vol->heure_arrivee}} </strong> </p>
                <p> Nombre de billets : <strong> {{ $liste->quantite }} </strong> <p>
                <p>Prix : <strong class="text-danger">{{ $liste->vol->prix; }} €</strong></p>
            </div>
            @endif
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
        .bg-res{
        background-image : url('/images/res1.jpg');
        background-size : 1300px;
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