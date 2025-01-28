@extends('layouts.admin')

@section('content')

    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Créer un animal</li>
        </ul>
    </div>

    <div class="formulaires-admin">

        <h1>Créer un animal</h1>

        <form
            action="{{ route ('animals.create') }}"
            method="post" enctype="multipart/form-data"
        >
            @csrf

            <div class="form">
                <label for="name">Nom de l'animal :</label>
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
                <label for="breed">Race de l'animal :</label>
                <input
                    type="text"
                    name="breed"
                    id="breed"
                    value="{{ old('breed') }}"
                >
                @error('breed')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                <label for="habitat_id">Sélectionnez un habitat: </label>
                <select name="habitat_id"
                        id="habitat_id">
                    <option disabled selected>Choisissez un habitat</option>
                    @forelse($habitats as $habitat)
                    <option value="{{ $habitat->id }}">{{ $habitat->name }}</option>
                    @empty
                    <option value="" disabled>Aucun habitat trouvé</option>
                    @endforelse
                </select>
            </div>

            <div class="form">
                <label for="image">Image de l'animal :</label>
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

            <button type="submit" class="btn-create">Créer</button>
        </form>
    </div>
@endsection
