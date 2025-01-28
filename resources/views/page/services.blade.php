@extends('layouts.base')
@section('header')
    <img alt="image de fond"
         class="bg-header"
         src="/storage/asset/images/{{ $cover }}">
    <div class="text-header">
        <h1>Les Services proposés,
            pour mieux vous accueillir</h1>
    </div>
@endsection
@section('content')
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ services ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    @foreach( $services as $service )
        <section class="container-services">
            <h2 class="title-services">{{ $service->name }}</h2>
            <div class="div-services">
                <div class="img-services">
                    <img
                        alt="Photo {{ $service->name }}"
                        class="image-services"
                        src="/storage/asset/images/{{ $service->image }}"
                    >
                </div>
                <div class="description-services">
                    <p class="p-services">
                        {{ $service->description }}
                    </p>
                </div>
            </div>
        </section>
    @endforeach

@endsection
