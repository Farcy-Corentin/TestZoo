@extends('layouts.admin')
@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>État actuel des animaux</li>
        </ul>
    </div>
    <div class="animals-container">
        <h2 class="title-h2">État actuel des animaux</h2>
        <div class="btn-nav">
            <div class="btn-back">
                <a href="{{ route('dashboard') }}"
                   class="btn-send">Retour au tableau de bord</a>
            </div>
            @can('view', App\Models\FoodConsum::class)
            <div class="btn-next">
                <a href="{{ route('dashboard') }}"
                   class="btn-send">Voir l'historique des repas</a>
            </div>
            @endcan
            @can('view', App\Models\VeterinarianReport::class)
                <div class="btn-next">
                    <a href="{{ route('veterinarian-reports') }}"
                       class="btn-send">Voir l'historique des rapports</a>
                </div>
            @endcan
        </div>
        <div class="animal-list-container">
            <table class="table-list">
                <thead class="table-primary">
                <tr>
                    <th>Nom de l'animal</th>
                    <th>Habitat</th>
                    <th>Nourriture</th>
                    <th>Grammage</th>
                    <th>État de l'animal</th>
                    <th>Date du compte-rendu</th>
                    <th>Nom du vétérinaire</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $animals as $animal )
                    <tr>
                        <td data-label="Name"
                            class="td-wrap">{{ $animal['name'] }}
                        </td>
                        <td data-label="Habitat"
                            class="td-wrap">{{ $animal['habitat']->name }}
                        </td>
                        <td data-label="Nourriture"
                            class="td-wrap">{{ $animal['lastFoodConsum']->food->name }}
                        </td>
                        <td data-label="Grammage"
                            class="td-wrap">{{ $animal['lastFoodConsum']->quantity }} {{ $animal['lastFoodConsum']->unit }}
                        </td>
                        <td data-label="Etat"
                            class="td-wrap">{{ $animal['lastVeterinarianReport']['animal_state'] }}
                        </td>
                        <td data-label="Date"
                            class="td-wrap">{{ $animal['lastVeterinarianReport']['created_at'] }}
                        </td>
                        <td data-label="Veterinarian"
                            class="td-wrap">{{ $animal['lastVeterinarianReport']['veterinarian_name'] }}
                        </td>
                        <td
                            data-label="Actions"
                            class="td-wrap"
                        >
                            @can('view', App\Models\FoodConsum::class)
                                <a href="{{ route('foods-consum.create') }}"
                                   title="Ajouter un repas">
                                    <img src="/asset/icons/animals.svg"
                                         alt="Icone d'ajout de nourriture pour l'animal"
                                         class="icon-eat"
                                    >
                                </a>
                            @endcan
                            @can('view', App\Models\VeterinarianReport::class)
                                <a href="{{ route('veterinarian-reports.create') }}"
                                   title="Ajouter un rapport vétérinaire">
                                    <img src="/asset/icons/reports.svg"
                                         alt="icone d'ajout d'un report vétérinaire"
                                         class="icon-report"
                                    >
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
