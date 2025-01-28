<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>@yield('title', 'Welcome') - Zoo Arcadia</title>
    @vite(['resources/css/admin/app.scss', 'resources/js/app.js'])
</head>
<body>
<header>
    <div class="logo-header">
        <a href="{{ route('home') }}">
            <img alt="logo arcadia mobile"
                 class="logo-header"
                 src="/asset/logos/admin-logo.svg"/>
        </a>
    </div>

    <div class="nav-header">
        <nav>
            <a href="#">
                <img alt="Menu burger"
                     class="menu-burger"
                     src="/asset/icons/white-menu-burger.svg">
            </a>
        </nav>
        <div class="nav-links">
            <ul id="nav-link">
                <li><a href="{{ route('home')}}">Aller au zoo</a></li>
            </ul>
        </div>
    </div>
</header>
<main>


    <div class="form-connect">
        <h1>Connexion</h1>
        <div class="formulaires-admin">
            <form
                action="{{ route('auth.authenticate') }}"
                method="post">
                @csrf

                <div class="form">
                    <label for="email">Email</label>
                    <input
                        placeholder="Email"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form">
                    <label for="password">Mot de passe</label>
                    <input
                        placeholder="Password"
                        type="password"
                        name="password"
                        id="password"
                        value="{{ old('password') }}"
                    >
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form">
                    <!-- TODO : faire le lien de pour la page du mot de passe oublié. -->
                    <a href="">Mot de passe oublié ?</a>
                    <button type="submit"
                            class="btn-send">Se connecter
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
<footer>
    <section class="bg-logo-footer">
        <img
            src="/asset/logos/logo-header.svg"
            alt="Le logo arcadia"
        >
        <div class="title-footer">
            <h4>&copy; Zooparc Arcadia</h4>
        </div>
    </section>
    <section class="bg-footer"></section>
</footer>
</body>
</html>
