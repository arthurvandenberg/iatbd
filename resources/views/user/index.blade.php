@extends('layouts.main')

@section('metaTitle', 'Oppassers')

@section('styles')
<link rel="stylesheet" href="{{asset('css/users/catalog.css')}}">
@endsection

@section('title', 'Gebruikersoverzicht')

@section('content')
    <h1 class="page__title">Oppassers</h1>

    <div class="userCatalog">
        @foreach($users as $user)
            @if($user->blocked !== 1)
                <article class="userCard">
                    <figure class="userCard__figure">
                        <img class="userCard__image" src="{{$user->image}}" alt="{{$user->name}}"/>
                    </figure>
                    <section class="userCard__text">
                        <section class="userCard__userInfo">
                            <h2>{{$user->name}} <span>({{$user->age}})</span></h2>
                            <sub>Past op: <span>{{$user->preferred_animals}}</span></sub>
                        </section>
                    </section>
                    <section class="userCard__btnSection">
                        <a class="userCard__button" href="/users/{{{$user->id}}}">Bekijk het profiel van {{$user->name}}!</a>
                    </section>
                </article>
            @endif
        @endforeach
    </div>
@endsection