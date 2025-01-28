@extends('layouts.base')
@vite(['resources/js/components/sendEmail.js'])
@section('header')
    <img
        alt="image de fond"
        class="bg-header"
        src="/storage/asset/images/cat-jp.jpg"
    >
    <div class="text-header">
        <h1>Une question sur le ZooParc Arcadia ? Un renseignement ?
            Envoyez votre demande</h1>
    </div>
@endsection
@section('content')
    <div class="form-contact">
        <h2 class="title-contact">Contactez-nous</h2>
        <div class="contact-form">
            <form
                action=""
                method="POST"
                class="form-contact-us"
            >
                @csrf
                <div class="form-group">
                    <label for="name"
                           class="contact-label">Votre nom</label>
                    <input type="text"
                           name="name"
                           id="name"
                           placeholder="Mon nom"
                           required>
                    @error('name')
                    {{ $message }}
                    @enderror
                    <label for="email"
                           class="contact-label">Votre email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           placeholder="Mon email"
                           required>
                    @error('email')
                    {{ $message }}
                    @enderror
                    <label for="message"
                           class="contact-label">Votre message</label>
                    <textarea
                        class="message-contact"
                        name="message"
                        id="message"
                        placeholder="Mon message"
                        cols="30"
                        rows="10"
                        required></textarea>
                    @error('message')
                    {{ $message }}
                    @enderror
                    <input type="submit"
                           value="Envoyer"
                           class="btn-contact"
                    >
                </div>
            </form>
        </div>
    </div>
@endsection
