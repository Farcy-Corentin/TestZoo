@extends('layouts.admin')

@section('content')

    <h2 class="title-admin">Créer un compte</h2>

    <div class="admin-form">
        <div>
            <form
                action="{{ route('auth.registerPost') }}"
                method="post">
                @csrf

                <div class="form form-admin">
                    <label for="name">Nom</label>
                    <input class="input-admin"
                           type="name"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                    >
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form form-admin">
                    <label for="email">Email</label>
                    <input class="input-admin"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                    >
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form form-admin">
                    <label for="password">Mot de passe</label>
                    <input class="input-admin"
                           type="password"
                           name="password"
                           id="password"
                           value="{{ old('password') }}"
                    >
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form form-admin">
                    <label for="role">Rôle</label>
                    <select
                        name="role"
                        id="role"
                        value
                    >
                        <option value="">-- Choisir un rôle --</option>
                        <option value="employee">Employé</option>
                        <option value="veterinarian">Vétérinaire</option>
                    </select>
                    @error('role')
                    {{ $message }}
                    @enderror
                </div>

                <button type="submit"
                        class="btn-account">Enregistrer
                </button>
            </form>
        </div>

    </div>
    <div class="btn-list">
        <a href="{{ route('dashboard') }}"
           class="btn-send">Retour tableau de bord</a>
        <!-- TODO : Faire une page avec la liste des employés
        <a href=""
           class="btn-send">Voir la liste des employés</a>-->
    </div>
@endsection
