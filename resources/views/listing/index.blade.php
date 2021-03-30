@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/pets/catalog.css')}}">
@endsection

@section('metaTitle', 'Het aanbod')


@section('content')
    <h1 class="page__title">Dierenoverzicht</h1>
    <div class="petCatalog__wrapper">
        <div class="petCatalog__sidebar">
            <p>Filter op:
        </div>
        <div class="petCatalog">
    @foreach($listings as $listing)
    <?php
        $pet = \App\Models\Listing::find($listing->id)->getPet;
        $startOfStay = new DateTime($listing->available_date);
        $endOfStay = new DateTime($listing->end_of_stay);
        $interval = $startOfStay->diff($endOfStay);
        $lengthOfStay = $interval->format('%a');
    ?>
        @if($listing->available === 1)
            <article class="petCard">
                <figure class="petCard__figure">
                    <img class="petCard__image" src="{{asset($pet->image)}}" alt="{{$pet->name}}"/>
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
                                {{date('d-m-Y', strtotime($listing->available_date))}}
                            </span>
                        </p>
                        <p>
                            Duur van verblijf:
                            <span>
                                @if($lengthOfStay > 1)
                                    {{$lengthOfStay}} Dagen
                                @else
                                    {{$lengthOfStay}} Dag
                                @endif
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
@endsection
