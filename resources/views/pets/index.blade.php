@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/pets/catalog.css')}}">
@endsection

@section('metaTitle', 'De sterren van de show!')


@section('content')
    <h1 class="page__title">Dierenoverzicht</h1>
    <div class="petCatalog__wrapper">
        <div class="petCatalog__sidebar">
            <p>Filter op:
        </div>
        <div class="petCatalog">
            @foreach($pets as $pet)
            @if($pet->available === 1)
                <?php
                    $startOfStay = new DateTime($pet->available_date);
                    $endOfStay = new DateTime($pet->end_of_stay);
                    $interval = $startOfStay->diff($endOfStay);
                    $lengthOfStay = $interval->format('%a');
                ?>
                <article class="petCard">
                    <figure class="petCard__figure">
                        <img class="petCard__image" src="{{$pet->image}}" alt="{{$pet->name}}"/>
                    </figure>
                    <section class="petCard__text">
                        <section class="petCard__petInfo">
                            <h2>{{$pet->name}}</h2>
                            <sub>{{$pet->kind}}</sub>
                        </section>
                        <section class="petCard__info">
                            <p>
                                Beschikbaar vanaf:
                                <span>
                                    {{date('d-m-Y', strtotime($pet->available_date))}}
                                </span>
                            </p>
                            <p>
                                Duur van verblijf:
                                <span>
                                    {{$lengthOfStay}} Dagen
                                </span>
                            </p>
                        </section>
                    </section>
                    <section class="petCard__btnSection">
                        <a class="petCard__button" href="/pets/{{{$pet->id}}}">Bekijk het profiel van {{$pet->name}}!</a>
                    </section>
                </article>
            @endif
            @endforeach
        </div>
    </div>
@endsection
