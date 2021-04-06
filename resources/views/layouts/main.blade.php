<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barkplaats | @yield('metaTitle')</title>
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">
        <script>
            function openNavigation(x) {
                x.classList.toggle("change");
                document.querySelector('.header__navigation-mobile').classList.toggle('open');
            }
        </script>
        @yield('styles')
    </head>
    <body>
        <header class="header">
            <a href="/" class="header__title-link"><h2 class="header__title">Barkplaats 🐶</h2></a>
            <nav class="header__navigation-desktop">
                <ul class="header__list">
                    <li class="header__item"><a class="header__link" href="/pets">Dieren</a></li>
                    <li class="header__item"><a class="header__link" href="/users">Oppassers</a></li>
                    @guest
                        <li class="header__item"><a class="register__button" href="/login">Log In</a></li>
                    @endguest
                    @auth
                        <li class="header__item"><a class="header__link" href="/dashboard">Dashboard</a></li>
                        <li class="header__item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log uit') }}
                            </x-dropdown-link>
                        </form>
                        </li>
                    @endauth
                </ul>
            </nav>
            <div class="header__menuButton" onclick="openNavigation(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </header>
        <main class="page__main">
            <nav class="header__navigation-mobile">
                <ul class="header__list-mobile">
                    <li class="header__item"><a class="header__link" href="/pets">Dieren</a></li>
                    <li class="header__item"><a class="header__link" href="/users">Oppassers</a></li>
                    @guest
                        <li class="header__item"><a class="header__link" href="/login">Log In</a></li>
                    @endguest
                    @auth
                        <li class="header__item"><a class="header__link" href="/dashboard">Dashboard</a></li>
                        <li class="header__item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log uit') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
            <div class="page__wrapper">@yield('content')</div>
        </main>
        <footer class="footer">
            <div class="footer__links">
                <div class="footer__column">
                    <ul class="footer__list">
                        <li class="footer__item"><a href="#" class="footer__link">Algemene voorwaarden</a></li>
                        <li class="footer__item"><a href="#" class="footer__link">Huisregels</a></li>
                        <li class="footer__item"><a href="#" class="footer__link">Meest gestelde vragen</a></li>
                        <li class="footer__item"><a href="#" class="footer__link">Nieuwsbrief</a></li>
                        <li class="footer__item"><a href="#" class="footer__link">Contact</a></li>
                    </ul>
                </div>
                <div class="footer__column">
                    <ul class="footer__list">
                        <li class="footer__item"><a href="#" class="footer__link">Werken als Oppasser</a></li>
                        <li class="footer__item"><a href="#" class="footer__link">Je huisdier inschrijven</a></li>
                        <li class="footer__item"><a href="#" class="footer__link">Social Media</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__copyright">
                <p>© Copyright 2021 | Barkplaats</p>
            </div>
        </footer>
    </body>
</html>
