@extends('template')
@section('titre', 'Page de votre compte ')
@section('header_container', 'container-fluid p-5 text-warning bg-acc')
@section('header')
<h1 class="text-warning text-center"><strong>Home Gestionnaire </strong></h1>
@endsection

@section('nav')


<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-3">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto"> 
                <li class="nav-item" style="margin-right: 2rem;">
                    <a href="{{ route('page_home') }}" class="nav-link btn btn-outline-light text-warning" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" style="margin-right: 5px;">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                        </svg>
                        Home
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
@auth


<div class = "  text-center text-warning bg-bl rounded mt-5  mb-5  pb-4 pt-4 ">
<h2>Bonjour {{Auth::user()->name}} , bienvenue sur votre compte privé </h2>
</div>




<div class="container mt-3 pb-5 bg-bl rounded-2">
  <h4 class="text-warning pb-4"><strong>Pilotez l'ensemble de vos opérations de vol depuis ce tableau de bord </strong></h4>   

  <table class="table table-dark table-striped">
    
    <tbody>
    <tr>
        <td>Programmer un vol avec une date, horaire, aéroport de départ et de destination :</td>
        <td><a href="{{ route('gestio_add') }}" class="btn btn-outline-danger text-warning" style="display: flex text-center">Ajouter un vol </a></td>
      </tr>
      <tr>
        <td>Supprimer ou modifier un vol programmé :</td>
        <td><a href="{{ route('gestio_edit') }}" class="btn btn-outline-danger text-warning" style="display: flex text-center">Modifier un vol </a></td>
      </tr>
      <tr>
        <td>Visualiser toutes les réservations effectuées par les clients :</td>
        <td><a href="{{ route('gestio_client') }}" class="btn btn-outline-danger text-warning" style="display: flex text-center">Voir les clients/réservations</a></td>
      </tr>
      <tr>
        <td>Visualiser le nombre de passagers pour chaque vol et le nombre de places encore disponibles : </td>
        <td><a href="{{ route('gestio_place') }}" class="btn btn-outline-danger text-warning" style="display: flex text-center">Voir le nombre de places/passagers</a></td>
      </tr>
    </tbody>
  </table>
</div>

@endauth
@endsection


<style>
       
        .bg-acc{
        background-image : url('/images/acc.jpg');
        background-size : cover;
        background-repeat : no-repeat;
        background-position:center;
    }
    .bg-bl {
  background-image : url('/images/g.jpg');
    background-size : cover;
    background-repeat : no-repeat;
    background-position :center;
}
    </style>