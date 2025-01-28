@extends('layouts.admin')
@vite(['resources/js/components/veterinarianReportForm.js'])
@section('content')
    <div class="dashboard">
        <h2>Tableau de bord</h2>
    </div>
    <div class="fil-ariane">
        <ul>
            <li>Accueil ></li>
            <li>Compte-rendu Vétérinaire</li>
        </ul>
    </div>

    <div class="btn-back">
        <a href="{{ route('dashboard') }}"
           class="btn-send">Retour tableau de bord</a>
    </div>

    <div class="container veto-report">
        <h2 class="title-cards">Ajouter un rapport</h2>
        <form
            action="{{ route('veterinarian-reports.create') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf


            <div class="add-report">

                <div class="form-select">
                    <label for="animal-name">Nom de l'animal :</label>
                    <select name="animal_id"
                            id="animal-name"
                    >
                        <option disabled
                                selected>Choisissez le nom de l'animal
                        </option>
                        @forelse( $animals as $animal )
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

                <div class="form-select"
                     id="food-consumed-section">
                    <div>Sélectionnez un animal pour voir la nourriture consommée.</div>
                    <label for="food_consum_id">Dernier repas consommé :</label>
                    <div id="food-consumed-list"></div>
                </div>
                <div class="form-select">
                    <label for="animal_state">État de l'animal :</label>
                    <select name="animal_state"
                            id="animal_state">
                        <option disabled
                                selected>Choisir un état de santé
                        </option>
                        <option value="En bonne santé">En bonne santé</option>
                        <option value="À surveiller">À surveiller</option>
                        <option value="Signe de vieillesse">Signe de vieillesse</option>
                    </select>
                    @error('animal_state')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form">
                    <label for="content">Observations :</label>
                    <textarea name="content"
                              id=""
                              cols="30"
                              rows="10"></textarea>
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="div-create">
                <button type="submit"
                        class="btn-submit"
                >
                    Ajouter
                </button>
            </div>
        </form>
    </div>
    <section class="btn-header">
        <div>
            <a href="{{ route('admin.animals') }}"
               class="btn-send">
                Retour à l'état des animaux
            </a>
        </div>
        <div>
            <a href="{{ route('veterinarian-reports') }}"
               class="btn-send">
                Historique des rapports
            </a>
        </div>
    </section>
@endsection
