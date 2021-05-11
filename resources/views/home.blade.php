@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('metaTitle', 'Vind dé oppas voor jouw huisdier!')

@section('preContent')
    <img class="home__heroImage" src="{{asset('img/hero_2.jpg')}}"/>
@endsection

@section('content')
    <section class="home__wrapper">
        <h1>Barkplaats 🐶</h1>
        <sub>Vind hier de perfecte oppas voor jouw huisdier!</sub>
        @guest
            <a href="/register" class="home__button">Meld je aan &rarr;</a>
        @endguest
        @auth
            <a href="/pets" class="home__button">Bekijk het aanbod &rarr;</a>
        @endauth
    </section>
@endsection
