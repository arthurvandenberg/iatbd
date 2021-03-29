@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/pets/profile.css')}}">
@endsection

@section('metaTitle')
{{$pet->name}} de {{$pet->kind}}
@endsection

<?php
    $startOfStay = new DateTime($pet->available_date);
    $endOfStay = new DateTime($pet->end_of_stay);
    $interval = $startOfStay->diff($endOfStay);
    $lengthOfStay = $interval->format('%a');
?>

@section('content')
    <a href="/pets">&larr; Terug naar het overzicht</a>
    <div class="petProfile">
        <div class="petProfile__gallery">
            <img class="petProfile__image" src="{{asset($pet->image)}}"/>
        </div>
        <div class="petProfile__info">
            <div class="petProfile__petInfo">
                <h1 class="petProfile__title">{{$pet->name}} de {{$pet->kind}}</h1>
                <sub>Eigenaar: {{$owner->name}}</sub>
            </div>
            <div class="petProfile__description">
                <p>{{$pet->description}}</p>
            </div>
            <div class="petProfile__stayInfo">
                <p>Beschikbaar vanaf: <span>{{date('d-m-Y', strtotime($pet->available_date))}}</span></p>
                <p>Duur van verblijf: <span>{{$lengthOfStay}} Dagen</span></p>
                <p>Vergoeding: <span>{{$pet->compensation_amount}}</span></p>
            </div>
            <div class="petProfile__btnSection">
                Wil jij op {{$pet->name}} passen?
                @auth
                    <form method="POST" action="/request/create">
                        @csrf
                        <input name="pet_id" type="hidden" value="{{$pet->id}}"/>
                        <input name="user_id" type="hidden" value="{{Auth::id()}}"/>
                        <x-button class="petProfile__button">Bied je aan!</x-button>
                    </form>
                @endauth
                @guest
                    <a href="/login" class="petProfile__button">Log in om je aan te bieden!</a>
                @endguest
            </div>
        </div>
    </div>
@endsection
