<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>@yield('title', 'Welcome') - Zoo Arcadia</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ HEADER ~~~~~~~~~~~~~~~~~~~~~~~~ -->
<header>
    <div class="div-header">
        <nav>
            <a href="#">
                <img alt="Menu burger" class="menu-burger" src="/asset/icons/white-menu-burger.svg">
            </a>
            <a href="{{ route('home') }}">
                <img alt="logo arcadia mobile" class="logo-header" src="/asset/logos/logo-footer.svg"/>
                <img src="/asset/logos/logo-header.svg" class="logo-desktop"
                     alt="logo arcadia desktop">
            </a>
            <a href="{{ route('ticketing') }}">
                <img alt="icon ticket" class="icon-ticket" src="/asset/icons/icon-ticket.svg"/>
            </a>
        </nav>
        <div class="nav-links">
            <ul id="nav-link">
                <li><a href="{{ route('animals') }}">Animaux</a></li>
                <li><a href="{{ route('habitats')}}">Habitats</a></li>
                <li><a href="{{ route('services')}}">Services</a></li>
                <li><a href="{{ route('contact')}}">Contact</a></li>
                <li><a href="{{ route('ticketing')}}">Billetterie</a></li>
            </ul>
        </div>
    </div>
</header>

<main>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~ Section background header title ~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <section id="bg-header">
        @yield('header')
    </section>
    @include('partials.flashMessage')
    @yield('content')


</main>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ NAV FOOTER ~~~~~~~~~~~~~~~~~~~~~~~~ -->
<section class="container-navfooter">
    <div class="navfooter-content">
        <a href="{{ route('home')}}"><img alt="Le logo d'Arcadia"
                         class="logo-footer"
                         src="/asset/logos/logo-header.svg">
        </a>

        <div class="navfooter-location">
            <h3>Nous rendre visite</h3>
            <img alt="Icône de localisation"
                 class="icon-footer"
                 src="/asset/icons/map.svg">
            <ul>
                <li><em>ZooParc Arcadia</em></li>
                <li>123 le Chemin de Brocéliande</li>
                <li>35380 PAIMPONT</li>
                <li>BRETAGNE | FRANCE</li>
            </ul>
        </div>

        <div class="navfooter-website">
            <h3>Plan du site</h3>
            <ul>
                <li><a href="{{ route('home')}}">Accueil</a></li>
                <li><a href="{{ route('habitats') }}">Habitats</a></li>
                <li><a href="{{ route('animals') }}">Animaux</a></li>
                <li><a href="{{ route('services')}}">Services</a></li>
                <li><a href="{{ route('review')}}">Avis</a></li>
            </ul>
        </div>

        <div class="navfooter-infos">
            <h3>Infos Pratiques</h3>
            <ul>
                <li><a href="{{ route('contact')}}">Contact</a></li>
                <li><a href="{{ route('legal-notices')}}">Mentions légales</a></li>
                <li><a href="{{ route('login')}}">Compte Pro</a></li>
            </ul>
        </div>

    </div>
</section>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ FOOTER ~~~~~~~~~~~~~~~~~~~~~~~~ -->
<section class="container-footer">
    <h4>&copy; Zooparc Arcadia : Zoo en Ille et vilaine (35) en Bretagne</h4>
    <span>Application en Laravel réalisée par Isabelle Radermecker Jurain - ECF École Studi</span>
</section>

</body>
</html>
