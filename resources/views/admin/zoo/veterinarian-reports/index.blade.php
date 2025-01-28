@extends('layouts.admin')
@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Liste des Compte-rendu Vétérinaire</li>
        </ul>
    </div>
    <div class="container-block">
        <h2 class="title-cards">Historique des rapports vétérinaire :</h2>
        <div class="btn-nav-reports">
            <div class="btn-back">
                <a href="{{ route('admin.animals') }}"
                   class="btn-send">État des animaux</a>
            </div>
            <div class="btn-back">
                <a href="{{ route('dashboard') }}"
                   class="btn-send">Retour au tableau de bord</a>
            </div>
            @can('view', App\Models\VeterinarianReport::class)
                <div class="btn-back">
                    <a href="{{ route('veterinarian-reports.create') }}"
                       class="btn-send">Créer un rapport</a>
                </div>
            @endcan
        </div>
        <div class="list-reports">
            @foreach($veterinarianReports as $veterinarianReport)
                <div class="card-reports">
                    <div class="card-name">{{$veterinarianReport->animal->name}}</div>
                    <div class="card-content">
                        <div class="card-state">{{$veterinarianReport->state}}</div>
                        <div class="card-author">Rapport fait par : {{$veterinarianReport->user->name}}</div>
                        <div class="card-description">Le : {{$veterinarianReport->created_at}}</div>
                        <div class="card-description">{{$veterinarianReport->content}}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
