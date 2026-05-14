@extends('template')
@section('titre', 'Récapitulatif du vol ajouté')
@section('header_container', 'container-fluid p-5 text-warning bg-vol_ajout')
@section('header')
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

            <li class="nav-item" style="margin-right: 2rem;">
                <a href="{{ route('account_co') }}" class="nav-link btn btn-outline-light text-warning" style="display: flex; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                </svg>
                    Compte
                </a>
            </li>
            <li class="nav-item" style="margin-left: 1rem; margin-right: 0.5rem;">
                <a href="{{ route('gestio_add') }}" class="nav-link btn btn-outline-light text-warning" style="display:flex; align-items:center;">
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

<div class = "  text-center bg-success rounded mt-5 pb-4 pt-4 ">
<h1> Votre vol a bien été ajouté.</h1>
</div>

<div class="container mt-3 pb-5 bg-bl rounded-2">
  <h3 class='text-center text-warning mt-4 mb-4'><strong>Récapitulatif du vol ajouté </strong></h3>   

  <table class="table table-dark table-striped">
    
    <tbody>
    <tr>
        <td>Numéro du vol :</td>
        <td class="text-warning">{{ $vol->numero }}</td>
      </tr>
      <tr>
        <td>Jour de départ :</td>
        <td class="text-warning">{{ $vol->jour_depart }}</td>
      </tr>
      <tr>
        <td>Jour d'arrivée :</td>
        <td class="text-warning">{{ $vol->jour_arrivee }}</td>
      </tr>
      <tr>
        <td>Heure de départ : </td>
        <td class="text-warning">{{ $vol->heure_depart }}</td>
      </tr>
      <tr>
        <td>Heure d'arrivée : </td>
        <td class="text-warning">{{ $vol->heure_arrivee }}</td>
      </tr>
      <tr>
        <td>Nombre de places : </td>
        <td class="text-warning">{{ $vol->places }}</td>
      </tr>

      <tr>
        <td>Prix :</td>
        <td class="text-warning">{{ $vol->prix }}</td>
      </tr>

      <tr>
        <td>Aéroport de départ :</td>
        <td class="text-warning">{{ $vol->depart_aeroport->nom }}</td>
      </tr>
      <tr>
        <td>Aéroport d'arrivée :</td>
        <td class="text-warning">{{ $vol->final_aeroport->nom }}</td>
      </tr>

    </tbody>
  </table>
</div>

@endsection

<style>
       .bg-bl {
  background-image : url('/images/g.jpg');
    background-size : cover;
    background-repeat : no-repeat;
    background-position :center;
}
        .bg-vol_ajout{
        background-image : url('/images/vol_ajout.jpg');
        background-size : 1000px;
        background-repeat : repeat;
        background-position:top;
    }
    </style>