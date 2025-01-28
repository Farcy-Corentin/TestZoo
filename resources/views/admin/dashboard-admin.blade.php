@extends('layouts.admin')
@section('content')
    <div class="header-dash">
        <div class="dashboard">
            <h2>Tableau de bord</h2>
        </div>
        <div class="fil-ariane">
            <ul>
                <li>Accueil</li>
            </ul>
        </div>
    </div>
    <div class="dashboard-cards">

        @can('view', App\Models\User::class)
            <a href="{{ route('auth.register') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/profil.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des comptes</p>
                    <span>Comptes</span>
                </div>
            </a>
        @endcan

        @can('view', App\Models\Service::class)
            <a href="{{ route('services.create') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/services.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des services</p>
                    <span>Services</span>
                </div>
            </a>
        @endcan

        @can('view', App\Models\Opening::class)
            <a href="{{ route('openings.create') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/openings.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des horaires</p>
                    <span>Horaires</span>
                </div>
            </a>
        @endcan

        @can('view', App\Models\Habitat::class)
            <a href="{{ route('habitats.create') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/habitats.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des habitats</p>
                    <span>Habitats</span>
                </div>
            </a>
        @endcan

        @can('view', App\Models\Animal::class)
            <a href="{{ route('animals.create') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/animals.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des animaux</p>
                    <span>Animaux</span>
                </div>
            </a>
        @endcan

        @can('view', App\Models\VeterinarianReport::class)
            <a href="{{ route('veterinarian-reports') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/reports.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des compte-rendus</p>
                    <span>Compte-rendu</span>
                </div>
            </a>
        @endcan

        <a href="">
            <div class="cards-list">
                <img
                    class="icon-dashboard"
                    src="/asset/icons/animals-views.svg"
                    alt="Icône du tableau de bord"
                >
                <p>Gestion des vues animaux</p>
                <span>Vues animaux</span>
            </div>
        </a>
        @can('view', App\Models\Review::class)
            <a href="{{ route('reviews.list') }}">
                <div class="cards-list">
                    <img
                        class="icon-dashboard"
                        src="/asset/icons/fill-star.svg"
                        alt="Icône du tableau de bord"
                    >
                    <p>Gestion des avis</p>
                    <span>Avis</span>
                </div>
            </a>
        @endcan
    </div>
@endsection
