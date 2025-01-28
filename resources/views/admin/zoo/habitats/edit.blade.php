@extends('layouts.admin')

@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div>
        <ul>
            <li>Accueil ></li>
            <li>Éditer un service</li>
        </ul>
    </div>
    <h1>Modifier l'habitat : "{{ $habitat->name }}"</h1>
    <section class="btn-header">
        <div>
            <a href="{{ route('habitats.create') }}"
               class="btn-send">
                Créer un habitat
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
            action="{{ route ('habitats.update', ["name" => $habitat->name]) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="form">
                <label for="name">Nom de l'habitat :</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $habitat->name }}"
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
                    value="{{ $habitat->description }}"
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
                    value="{{ $habitat->image }}"
                >
                @error('image')
                {{ $message }}
                @enderror
            </div>
            <button type="submit"
                    class="btn-send">Modifier
            </button>
        </form>
        <form action="{{ route ('habitats.delete', ["name" => $habitat->name]) }}"
              method="post">
            @csrf
            @method('DELETE')
            <div>
                <button type="submit"
                        class="btn-send">Supprimer
                </button>
            </div>
        </form>

    </div>

@endsection
