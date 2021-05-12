@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/pets/catalog.css')}}">
<script>
    const filterAnimals = (event) => {
        let henk = document.querySelectorAll(".petCard");
        henk.forEach( function(item){
            if(event.value === "Alle diersoorten"){
                if(item.classList.contains('hidden')){
                    item.classList.remove('hidden');
                }
            }
            else {
                if(!item.classList.contains(event.value)){
                    item.classList.add('hidden');
                } else if(item.classList.contains('hidden')){
                    item.classList.remove('hidden');
                }
            }
        });
    }
</script>
@endsection

@section('metaTitle', 'De sterren van de show!')

<?php
    $kinds_of_pet = \App\Models\KindOfPet::all();
?>

@section('content')
    <h1 class="page__title">Dierenoverzicht</h1>
    <div class="petCatalog__sidebar">
        <label for="petFilter">Filter op: </label>
        <select id="petFilter" onChange="filterAnimals(this)" class="auth__input">
            <option>Alle diersoorten</option>
            @foreach($kinds_of_pet as $kind_of_pet)
                <option>{{$kind_of_pet->kind}}</option>
            @endforeach
        </select>
    </div>
    <div class="petCatalog">
        @foreach($pets as $pet)
            <?php $owner = \App\Models\User::find($pet->owner_id); ?>
            @if($pet->suspended === 0)
                <article class="petCard {{$pet->kind}}">
                    <a href="/pets/{{{$pet->id}}}">
                        <figure class="petCard__figure">
                            <img class="petCard__image"
                                 srcset="
                                 {{$pet->image640}} 640w,
                                 {{$pet->image1280}} 1280w,
                                 {{$pet->image1920}} 1920w
                                 "
                                 sizes="(min-width: 1040px) calc(20vw - 27px), (min-width: 780px) calc(26.67vw - 27px), (min-width: 380px) calc(47.37vw - 19px), 95vw"
                                 src="{{$pet->image}}" alt="{{$pet->name}}"/>
                        </figure>
                        <section class="petCard__text">
                            <div class="petCard__petInfo">
                                <h2>{{$pet->name}}</h2>
                                <sub>{{$owner->hometown}}</sub>
                            </div>
                            <div class="petCard__btnSection">
                                <x-button class="petCard__button" href="/pets/{{{$pet->id}}}">Bekijk het profiel van {{$pet->name}}!</x-button>
                            </div>
                        </section>
                    </a>
                </article>
            @endif
        @endforeach
    </div>
@endsection
