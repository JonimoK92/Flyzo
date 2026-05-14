@extends('template')
@section('titre', 'Création de compte')
@section('header_container', 'container-fluid p-5 text-warning bg-creer')
@section('header')
<h1 class="text-warning text-center">Nouveau compte</h1>
@endsection
@section('nav')


<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-3">
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
        </ul>
    </div>
</nav>
@endsection

@section('content')

<div class="container text-warning mt-5 pt-3 pb-3 bg-bl rounded">
  <h2>Créez un compte  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" class="bi bi-person-gear" viewBox="0 0 16 16"style="margin-right: 5px;margin-bottom: 4px;">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                </svg></h2>
  <form action="{{ route('auth.createLogin') }}" method="post">
    <div class="mb-3 mt-3">
      <label for="name"><strong>Nom</strong></label>
      <input type="text" class="form-control" id ="name" name="name">
    </div>

    <div class="mb-3 mt-3">
      <label for="email"><strong>Adresse email</strong></label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
      <label for="pwd"><strong>Mot de passe</strong></label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Se souvenir de moi
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Créer le compte</button>

    @csrf
  </form>
</div>
@endsection
   
<style>
        
  .bg-bl {
  background-image : url('/images/bck3.png');
    background-size : cover;
    background-repeat : no-repeat;
    background-position :center;
}.bg-creer {
            background-image : url('/images/creer.jpg');
            background-size : 1000px;
            background-repeat : repeat;
            background-position :left;
    }
    </style>