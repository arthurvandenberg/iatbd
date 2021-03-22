@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection

@section('metaTitle', 'Vind dé oppas voor jouw huisdier!')

@section('preContent')
    <img class="home__heroImage" src="{{asset('img/hero_2.jpg')}}"/>
@endsection

@section('content')
    <h1>Barkplaats 🐶</h1>
    <sub>Vind hier de perfecte oppas voor jouw huisdier!</sub>
@endsection