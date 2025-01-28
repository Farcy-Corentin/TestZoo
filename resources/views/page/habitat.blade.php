@extends('layouts.base')
@section('header')
    <img
        alt="image de fond"
        class="bg-header"
        src="/storage/asset/images/{{ $habitat->image }}"
    >
    <div class="text-header">
        <h1>{{ $habitat->name }}</h1>
    </div>
@endsection
@section('content')
    <section class="container section-habitat {{ strtolower($habitat->name) }}">
    <h2>{{ $habitat->name }}</h2>

    @forelse( $habitat->animals as $animal )
        <div class="card-container">
            <div class="card-content">
                <div>
                    <article class="card-article">
                        <div class="card-image">
                            <img
                                src="/storage/asset/images/{{ $animal->image }}"
                                alt="Photo d'un animal"
                                class="card-img"
                            >
                        </div>
                        <div class="card-data">
                            <h3 class="card-name">
                                {{ $animal->name }}
                            </h3>
                            <div class="card-description">
                                {{ $animal->description }}
                            </div>
                                <a class="card-button" href="{{ route('animal', [$animal->name]) }}">Fiche animal</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    @empty
        <p>Il y a aucun animal</p>
    @endforelse
    </section>
@endsection
