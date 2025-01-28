@extends('layouts.admin')
@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Ajouter une consommation alimentaire</li>
        </ul>
    </div>

    <div class="formulaires-admin">
        <h1>Consommation alimentaire pour l'animal</h1>

        <div class="admin-form">
            <form
                action=""
                method="post"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form">
                    <label for="animal_id">Sélectionnez l'animal :</label>
                    <select
                        name="animal_id"
                        id="animal_id"
                    >
                        <option disabled
                                selected>Choisissez un animal
                        </option>
                        @forelse($animals as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                        @empty
                            <option value=""
                                    disabled>Aucun animal trouvé
                            </option>
                        @endforelse
                    </select>
                    @error('animal_id')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form">
                    <label for="food_id">Sélectionnez une alimentation :</label>
                    <select
                        name="food_id"
                        id="food_id"
                    >
                        <option disabled
                                selected>Choisissez une alimentation
                        </option>
                        @forelse( $foods as $food )
                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                        @empty
                            <option value=""
                                    disabled>Aucune alimentation trouvée
                            </option>
                        @endforelse
                    </select>
                    @error('food_id')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form">
                    <label for="quantity">Quantité</label>
                    <input
                        type="text"
                        name="quantity"
                        id="quantity"
                    >
                    @error('quantity')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form">
                    <label for="unit">Choisissez une unité :</label>
                    <select
                        name="unit"
                        id="unit"
                    >
                        <option value="g">grammes</option>
                    </select>
                    @error('unit')
                    {{ $message }}
                    @enderror
                </div>
                <button type="submit"
                        class="btn-submit">Créer
                </button>
            </form>
        </div>
    </div>
    <section class="btn-header">
        <div>
            <a href="{{ route('admin.animals') }}"
               class="btn-send">
                Retour à l'état des animaux
            </a>
        </div>
        <div>
            <a href="{{ route('dashboard') }}"
               class="btn-send">Retour au tableau de bord
            </a>
        </div>
    </section>
@endsection
