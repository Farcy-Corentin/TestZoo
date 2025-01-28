@extends('layouts.admin')
@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Créer un Zoo</li>
        </ul>
    </div>
    <div class="formulaires-admin">
        <h1>Créer un zoo</h1>
        <form method="POST"
              action="{{ route('zoo.create') }}">
            @csrf

            <div>
                <label for="name">Nom du Zoo</label>
                <input
                    type="text"
                    name="name"
                >
                @error('name')
                {{ $message }}
                @enderror
            </div>

            <div>
                <label for="description">Décrivez votre zoo :</label>
                <input
                    type="text"
                    name="description"
                >
                @error('description')
                {{ $message }}
                @enderror
            </div>

            <div>
                <button type="submit" class="btn-create">Créer</button>
            </div>
        </form>
    </div>

@endsection

