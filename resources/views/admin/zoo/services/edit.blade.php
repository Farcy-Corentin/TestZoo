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
    <h1>Liste des services</h1>

    <section class="btn-header">
        <div>
            <a href="{{ route('services.create') }}"
               class="btn-send">
                Créer un service
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
            action="{{ route('services.update', ['name' => $service->name]) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('Patch')
            <div class="form">
                <label for="name">Nom du service :</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $service->name }}"
                >
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form">
                <label for="description">Description :</label>
                <textarea
                    name="description"
                    id="description"
                >{{ $service->description }}</textarea>
                @error('description')
                {{ $message }}
                @enderror
            </div>
            <div class="form">
                <label for="image">Choisissez une image :</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    value="{{ $service->image }}"
                >
                @error('image')
                {{ $message }}
                @enderror
            </div>
            <div>
                <button type="submit"
                        class="btn-send">Modifier le service
                </button>
            </div>
        </form>
        <form action="{{ route('services.delete', ["name" => $service->name]) }}"
              method="post"
        >
            @csrf
            @method('DELETE')
            <div>
                <button type="submit"
                        class="btn-send">Supprimer le service
                </button>
            </div>
        </form>
    </div>
@endsection
