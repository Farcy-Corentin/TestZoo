@extends('layouts.base')
@section('header')
    <img
        alt="image de fond"
        class="bg-header"
        src="/storage/asset/images/shiba-inu.webp"
    >
    <div class="text-header">
        <h1>Tous nos animaux</h1>
    </div>
@endsection
@section('content')
    <section class="container">
        <h2 class="title-animals">Tous nos animaux</h2>
        <div class="animals-container">
            @foreach ($animals as $animal)
                <div class="animal-card">
                    <a href="{{route('animal', $animal->name)}}"><h3>{{ $animal->name }}</h3></a>
                    <img src="/storage/asset/images/{{ $animal->image }}" alt="image de {{ $animal->name }}">
                    <p>Appartient à l'habitat {{$animal->habitat->name}}</p>
                </div>
            @endforeach
        </div>
        <a href="{{ route('home') }}"
           class="btn-back">Retour à l'accueil</a>
    </section>



@endsection
