@extends('layouts.admin')
@vite(['resources/js/components/updateReviewForm.js'])
@section('content')
    <div class="header-dash">
        <div class="dashboard">
            <h2>Tableau de bord</h2>
        </div>
        <div class="fil-ariane">
            <ul>
                <li>Accueil ></li>
                <li>Gestion des avis</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h2>Gestion des avis</h2>
        <div class="card-content">
            @if( empty($reviewsWithPagination['items']) )
                <p>Il n'y a pas d'avis en attente.</p>
            @endif
            @foreach( $reviewsWithPagination['items'] as $review )
                <div class="card-content-review"
                     data-id="{{ $review['id'] }}">
                    <h3>{{ $review['author'].' le '.$review['created_at'] }}</h3>
                    <p>{{ $review['content'] }}</p>
                    <div class="btn-check">
                        <button type="submit"
                                class="btn-rejected">
                            <img src="/asset/icons/rejected.svg"
                                 alt="Icône checkbox refuser l'avis">
                        </button>
                        <button type="submit"
                                class="btn-validated">
                            <img src="/asset/icons/validated.svg"
                                 alt="Icône checkbox valider l'avis">
                        </button>
                    </div>
                </div>
                <div class="btn-actions">
                    @if($reviewsWithPagination['prev_page'])
                        <a href="{{ $reviewsWithPagination['prev_page'] }}">Précédent</a>
                    @endif

                    @if($reviewsWithPagination['next_page'])
                        <a href="{{ $reviewsWithPagination['next_page'] }}">Suivant</a>
                    @endif
                </div>
            @endforeach

        </div>
        <div class="send">
            <a href="{{ route('reviews.list') }}"
               class="btn-send">Retour</a>
        </div>
    </div>
@endsection
