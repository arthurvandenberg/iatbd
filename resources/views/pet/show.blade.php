@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/pets/profile.css')}}">
@endsection

@section('metaTitle')
{{$pet->name}} de {{$pet->kind}}
@endsection

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
            <div class="petProfile__listings">
                <h2 class="petProfile__listings-title">{{__('Sitting Options')}}</h2>
                <ul class="petProfile__listings-list">
                    @forelse($listings as $listing)
                        <?php
                        $startOfStay = new DateTime($listing->available_date);
                        $endOfStay = new DateTime($listing->end_of_stay);
                        $interval = $startOfStay->diff($endOfStay);
                        $lengthOfStay = $interval->format('%a');
                        ?>
                        <li class="petProfile__listings-list-item">
                            <span>Vanaf: {{date('d-m-Y', strtotime($listing->available_date))}} voor {{$lengthOfStay}} @if($lengthOfStay > 1) dagen @else dag @endif Vergoeding: {{$listing->compensation_amount}}</span>
                            @if($listing->available === 1)
                            @auth
                                <form method="POST" action="/request/create">
                                    @csrf
                                    <input name="pet_id" type="hidden" value="{{$pet->id}}"/>
                                    <input name="user_id" type="hidden" value="{{Auth::id()}}"/>
                                    <input name="listing_id" type="hidden" value="{{$listing->id}}"/>
                                    <x-button class="petProfile__button">Bied je aan!</x-button>
                                </form>
                            @endauth
                            @guest
                                <a href="/login" class="petProfile__button">Log in om je aan te bieden!</a>
                            @endguest
                            @else
                                <x-button type="disabled" class="petProfile__button disabled">Niet meer beschikbaar</x-button>
                            @endif
                        </li>
                    @empty
                        <h3>{{$pet->name}} heeft op het moment geen oppas nodig.</h3>
                    @endforelse
                </ul>
            </div>
            <div class="petProfile__btnSection">
            </div>
        </div>
    </div>
@endsection
