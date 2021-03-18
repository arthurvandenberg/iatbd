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
                    <li class="header__item"><a class="header__link" href="/">Log in</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('preContent')
            <div class="page__wrapper">@yield('content')</div>
        </main>
        <footer class="footer"></footer>
    </body>
</html>