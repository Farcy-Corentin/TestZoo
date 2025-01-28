@extends('layouts.base')
@vite(['resources/js/components/carousel.js'])
@section('header')
    <img alt="image de fond"
         class="bg-header"
         src="/asset/images/red-fox-istockphoto.jpg">
    <div class="text-header">
        <h1>Présentation</h1>
    </div>
@endsection

@section('content')
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ Section présentation ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <section class="home-container">
        <div class="home-content">
            <h2 class="home-title">Bienvenue au Zoo Arcadia</h2>
            <img alt="Icon écologie"
                 class="home-icon"
                 src="/asset/icons/icon-ecologie.svg">
            <p class="home-description">
                {{ $zoo->description }}
            </p>
            <img alt="Logo d'Arcadia"
                 class="home-logo"
                 src="/asset/logos/logo-header.svg">
        </div>
    </section>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ Section Habitats ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <section class="container section-habitats">
        <h2>Découvrez nos animaux et leurs
            environnements ...</h2>
        @foreach($habitats as $habitat)
            <div class="card-container">
                <div class="card-content">
                    <div>
                        <article class="card-article">
                            <div class="card-image">
                                <img alt="Photo {{ $habitat->name }}"
                                     class="card-img"
                                     src="/storage/asset/images/{{$habitat->image}}">
                            </div>
                            <div class="card-data">
                                <h3 class="card-name">{{ $habitat->name }}</h3>
                                <a class="card-button"
                                   href="{{ route('habitat', [$habitat->name]) }}">Voir les animaux</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ Section Services ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <section class="container section-services">
        <h2>Nos différents services</h2>
        @foreach($services as $service)
            <div class="card-container">
                <div class="card-content">
                    <div>
                        <article class="card-article">
                            <div class="card-image">
                                <img alt="Photo {{ $service->name }}"
                                     class="card-img"
                                     src="/storage/asset/images/{{$service->image}}">
                            </div>
                            <div class="card-data">
                                <h3 class="card-name">{{ $service->name }}</h3>
                                <a
                                    class="card-button"
                                    href="{{ route('services') }}"
                                >
                                    Voir les services
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ Section Schedules ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <section class="container section-openings">
        <h2>Horaires</h2>
        <h3 class="title-openings">Ouvert tous les jours</h3>
        <div class="content-openings">
            @foreach( $openings as $opening)
                <div class="openings-list">
                    <ul>
                        <li>{{ $opening->day_open }}
                            {{ !$opening->hour_open && !$opening->hour_close
                                ? 'Fermé'
                                : 'de ' . $opening->hour_open . ' à ' . $opening->hour_close }}
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="openings-closed">
            <p>FERMETURE ANNUELLE</p>
            <p>DE NOVEMBRE À JANVIER INCLUS</p>
        </div>
    </section>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ Section Reviews ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <section class="container section-reviews">
        <div class="reviews-container">
            <h2>Partager votre avis</h2>
            <div class="review-content">
                <div class="carousel">
                    <button class="btn-carousel btn-previous">
                        <img src="asset/icons/arrow-left-bold.svg"
                             alt="Icône d'une flèche directionnelle gauche"
                             class="icon-arrow"
                        >
                    </button>
                    <div id="error-container"
                         class="carousel-content">
                        <h3 class="author-rating">author</h3>
                        <span><i>icônes étoiles pour l'avis</i></span>
                        <p>Text contenu dans l'avis</p>
                    </div>
                    <button class="btn-carousel btn-next">
                        <img src="asset/icons/arrow-right-bold.svg"
                             alt="Icône d'une flèche directionnelle droite"
                             class="icon-arrow"
                        >
                    </button>
                </div>
                <div class="btn-create send-review">
                    <a href="{{ route('review') }}">Donnez-nous le vôtre</a>
                </div>
            </div>
        </div>
    </section>
@endsection
