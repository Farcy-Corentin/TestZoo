@extends('layouts.admin')
@section('content')
    <div class="header-dash">
        <div class="dashboard">
            <h2>Tableau de bord</h2>
        </div>
        <div class="fil-ariane">
            <ul>
                <li>Accueil ></li>
                <li>Organisation des avis</li>
            </ul>
        </div>
    </div>
    <h2 class="review-title">Organisation des avis</h2>
    <section class="btn-header">
        <div>
            <a href="{{ route('dashboard') }}"
               class="btn-send btn-pending"
            >
                Retour au tableau de bord
            </a>
        </div>
        <div>
            <a href="{{ route('reviews.pending') }}"
               class="btn-send btn-pending"
            >
                Voir les avis en attente
            </a>
        </div>
    </section>
    <div class="reviews-container">
        <div class="list-container">
            <table class="table-list">
                <thead class="table-primary">
                <tr>
                    <th>Auteur</th>
                    <th>Description</th>
                    <th>Note</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $reviewsData as $review )
                    <tr>
                        <td data-label="Auteur"
                            class="td-wrap">{{ $review['author'] }}</td>
                        <td data-label="Description">{{ $review['content'] }}</td>
                        <td data-label="Note">{{ $review['rating'] }}</td>
                        <td data-label="Date"
                            class="td-wrap">{{ $review['created_at'] }}</td>
                        <td data-label="Status">
                            @if( $review['status'] === 'validated' )
                                Validé
                            @endif
                            @if( $review['status'] === 'rejected' )
                                Rejeté
                            @endif
                            @if( $review['status'] === 'pending' )
                                En attente
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="send">
            <div class="links-reviews">
                <a href="{{ route('dashboard') }}"
                   class="btn-send"
                >
                    Retour
                </a>
            </div>
        </div>
    </div>
@endsection
