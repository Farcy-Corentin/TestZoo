@extends('layouts.admin')

@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Modifier un horaire</li>
        </ul>
    </div>
    <h1>Modifier les horaires de {{ $opening->day_open }}</h1>

    <section class="btn-header">
        <div>
            <a href="{{ route('openings.create') }}"
               class="btn-send">
                Créer un horaire
            </a>
        </div>
        <div>
            <a href="{{ route('dashboard') }}"
               class="btn-send">Retour au tableau de bord
            </a>
        </div>
    </section>

    <div class="formulaires-admin">
        <form
            action="{{ route ('openings.update', ["day_open" => $opening->day_open]) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="form">
                <label for="day_open">Jour d'ouverture :</label>
                <input
                    type="text"
                    name="day_open"
                    id="day_open"
                    value="{{ $opening->day_open }}"
                >
                @error('day_open')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                <label for="hour_open">Heure d'ouverture :</label>
                <input type="text"
                       name="hour_open"
                       id="hour_open"
                       value=""
                >
                @error('hour_open')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                <label for="hour_close">Heure de fermeture :</label>
                <input type="text"
                       name="hour_close"
                       id="hour_close"
                >
                @error('hour_close')
                {{ $message }}
                @enderror
            </div>

            <button type="submit"
                    class="btn-send"
            >
                Modifier
            </button>
        </form>
        <form action="{{ route ('openings.delete', ["day_open" => $opening->day_open]) }}"
              method="post">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn-send"
            >
                Supprimer
            </button>
        </form>

    </div>

@endsection
