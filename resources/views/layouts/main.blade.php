<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barkplaats | @yield('metaTitle')</title>
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">
        @yield('styles')
    </head>
    <body>
        <header class="header">
            <a href="/" class="header__title-link"><h2 class="header__title">Barkplaats 🐶</h2></a>
            <nav class="header__navigation">
                <ul class="header__list">
                    <li class="header__item"><a class="header__link" href="/pets">Dieren</a></li>
                    <li class="header__item"><a class="header__link" href="/users">Oppassers</a></li>
                    @guest 
                        <li class="header__item"><a class="header__link" href="/">Log in</a></li>
                    @endguest
                    @auth 
                        <li class="header__item"><a class="header__link" href="/">Log uit</a></li>
                    @endauth
                </ul>
            </nav>
        </header>
        <main>
            @yield('preContent')
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
                <p>© Copyright 2021 | Barklaats</p>
            </div>
        </footer>
    </body>
</html>