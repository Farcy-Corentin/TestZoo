@extends('layouts.admin')

@section('content')

    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Créer un habitat</li>
        </ul>
    </div>
    <h1>Créer un habitat</h1>

    <section class="btn-header">
        <div>
            <a href="{{ route('admin.habitats') }}"
               class="btn-send">
                Liste des habitats
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
            action="{{ route ('habitats.create') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form">
                <label for="name">Nom de l'habitat :</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                >
                @error('name')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                <label for="description">Description :</label>
                <input
                    type="text"
                    name="description"
                    id="description"
                    value="{{ old('description') }}"
                >
                @error('description')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                <label for="image">Image de l'habitat :</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    value="{{ old('image') }}"
                >
                @error('image')
                {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit"
                        class="btn-send">Enregistrer
                </button>
            </div>

        </form>
    </div>
@endsection
