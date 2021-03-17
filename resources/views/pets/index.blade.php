@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="css/pets/catalog.css">
@endsection

@section('metaTitle', 'De sterren van de show!')

@section('content')
    <div class="petCatalog">
        @foreach($pets as $pet)
        @if($pet->available === 1)
            <article class="petCard">
                <figure class="petCard__figure">
                    <img class="petCard__image" src="{{$pet->image}}" alt="{{$pet->name}}"/>
                </figure>
                <section class="petCard__text">
                    <section class="petCard__petInfo">
                        <p>{{$pet->name}}</p>
                        <p>{{$pet->kind}}</p>
                    </section>
                    <section class="petCard__info">
                        <p>Beschikbaar vanaf: {{$pet->available_date}}</p>
                        <p>Duur van verblijf: {{$pet->length_of_stay}}</p>
                        <p>Vergoeding: {{$pet->compensation_amount}}</p>
                    </section>
                </section>
                <section class="petCard__btnSection">
                    <button class="petCard__button">Bied je aan!</button>
                </section>
            </article>
        @endif
        @endforeach
    </div>
@endsection