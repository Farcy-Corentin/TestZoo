@extends('layouts.base')
@section('header')
    <img
        alt="image de fond"
        class="bg-header"
        src="/storage/asset/images/{{$animal->image}}"
    >
    <div class="text-header">
        <h1>Fiche informations de {{ $animal->name }} </h1>
    </div>
@endsection
@section('content')
    <section class="container">
        <div class="animal-sheet-container">
            <h2 class="title-sheet">Fiche animal</h2>
            <div class="content-animal-sheet">
                <div class="img-modal">
                    <img src="/storage/asset/images/{{ $animal->image }}"
                         alt="Photo de l'animal {{ $animal->name }}">
                    <!-- TODO : Insérer le lien du rapport véto sur le nom de l'animal sur la fiche animal -->
                    <button class="btn-modal"><a href="">{{ $animal->name }}</a></button>
                </div>
                <div class="description-animal">
                    <h4 class="sous-title">Race :</h4>
                    <p>{{ $animal->breed }}</p>
                    <h4 class="sous-title">Description :</h4>
                    <p>{{$animal->description}}</p>
                </div>
            </div>
            <div class="btns-animal-sheet">
                <button class="btn-back"><a href="{{ route('animals') }}">Retour aux animaux</a></button>
                <button class="btn-back"><a href="{{ route('habitats') }}">Retour aux habitats</a></button>
            </div>
        </div>
    </section>

@endsection
