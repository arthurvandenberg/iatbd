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
                <?php $owner = \App\Models\User::find($pet->owner_id); ?>
                @if($pet->suspended === 0)
                    <div class="petCard">
                        <a href="/pets/{{{$pet->id}}}">
                            <div class="petCard__figure">
                                <img class="petCard__image" src="{{$pet->image}}" alt="{{$pet->name}}"/>
                            </div>
                            <div class="petCard__text">
                                <div class="petCard__petInfo">
                                    <h2>{{$pet->name}}</h2>
                                    <sub>{{$owner->hometown}}</sub>
                                </div>
                                <div class="petCard__btnSection">
                                    <x-button class="petCard__button" href="/pets/{{{$pet->id}}}">Bekijk het profiel van {{$pet->name}}!</x-button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
