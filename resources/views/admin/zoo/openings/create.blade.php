@extends('layouts.admin')

@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Créer un horaire</li>
        </ul>
    </div>

    <div class="formulaires-admin">

        <h1>Créer un horaire</h1>

        <form
            action="{{ route ('openings.create') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form">
                <label for="day_open">Jour d'ouverture :</label>
                <input
                    type="text"
                    name="day_open"
                    id="day_open"
                    value="{{ old('day_open') }}"
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
                    class="btn-create">
                Créer
            </button>
        </form>
    </div>
@endsection
