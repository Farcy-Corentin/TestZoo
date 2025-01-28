@extends('layouts.admin')

@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div>
        <ul>
            <li>Accueil ></li>
            <li>Éditer un animal</li>
        </ul>
    </div>
    <h1>Modifier un animal</h1>

    <div class="add-animaux">
        <a href="{{ route('animals.create') }}"
           class="btn-primary-dark">
            Retour création d'un animal
        </a>
    </div>
    <div class="formulaires-admin">
        <form
            action="{{ route ('animals.edit', ["name" => $animal->name]) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="form">
                <label for="name">Nom de l'animal :</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $animal->name }}"
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
                    value="{{ $animal->breed }}"
                >
                @error('breed')
                {{ $message }}
                @enderror
            </div>

            <div class="form">
                <label for="habitat_id">Sélectionnez un habitat: </label>
                <select name="habitat_id"
                        id="habitat_id">

                    @forelse( $habitats as $habitat )
                        @if( request('name') === $habitat->name )
                        <option disabled selected>{{ $habitat->name }}</option>
                        @endif
                        <option value="{{ $habitat->id }}">{{ $habitat->name }}</option>
                    @empty
                        <option value="" disabled>Aucun habitat trouvé</option>
                    @endforelse
                </select>
            </div>

            <div class="form">
                <label for="description">Description :</label>
                <input
                    type="text"
                    name="description"
                    id="description"
                    value="{{ $animal->description }}"
                >
                @error('description')
                {{ $message }}
                @enderror
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
            <button type="submit">Modifier</button>


        </form>
        <form action="{{ route ('animals.delete', ["name" => $animal->name]) }}"
              method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>

@endsection
