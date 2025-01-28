@extends('layouts.admin')
@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Services</li>
        </ul>
    </div>

    <div class="formulaires-admin">
        <h1>Créer un service</h1>

        <form
            action="{{ route('services.create') }}"
            method="post" enctype="multipart/form-data"
        >
            @csrf
            <div class="form">
                <label for="name">Nom du service :</label>
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
                <textarea name="description"
                          id="description"
                ></textarea>
                @error('description')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                    <label for="image">Choisissez une image du service :</label>
                    <input
                        class="input-file"
                        type="file"
                        name="image"
                        id="image"
                        value="{{ old('image') }}"
                    >
                    @error('image')
                    {{ $message }}
                    @enderror
            </div>
            <button type="submit"
                    class="btn-account">Créer un service
            </button>
        </form>
    </div>
    <div class="btn-list">
        <a href="{{ route('dashboard') }}"
           class="btn-send">Retour tableau de bord</a>
    </div>
@endsection
