@extends('layouts.base')
@section('header')
    <img alt="image de fond"
         class="bg-header"
         src="/storage/asset/images/jungle.jpg">
    <div class="text-header">
        <h1>Les différents habitats</h1>
    </div>
@endsection
@section('content')
    <section class="container section-habitats">
        <h2>NOS HABITATS</h2>

        @foreach( $habitats as $habitat )
            <div class="card-container">
                <div class="card-content">
                    <article class="card-article">
                        <div class="card-image {{ strtolower($habitat->name) }}">
                            <img
                                alt="Photo de daim au Japon"
                                class="card-img"
                                src="/storage/asset/images/{{ $habitat->image }}"
                            >
                        </div>
                        <div class="card-data {{ strtolower($habitat->name) }}">
                            <h3 class="card-name">{{ $habitat->name }}</h3>
                            <a
                                class="card-button"
                                href="{{ route('habitat', [$habitat->name]) }}"
                            >
                                Voir l'habitat
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        @endforeach
    </section>
@endsection
