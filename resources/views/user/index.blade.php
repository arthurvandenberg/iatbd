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
                        <img class="userCard__image"
                             srcset="
                                 {{$user->image640}} 640w,
                                 {{$user->image1280}} 1280w,
                                 {{$user->image1920}} 1920w
                                 "
                             sizes="(min-width: 1040px) calc(20vw - 20px), (min-width: 780px) calc(26.67vw - 20px), (min-width: 440px) calc(47.5vw - 15px), 95vw"
                             src="{{$user->image}}" alt="{{$user->name}}"/>
                    </figure>
                    <section class="userCard__text userCard__userInfo">
                        <h2>{{$user->name}} <span>({{$user->age}})</span></h2>
                        <sub>{{$user->hometown}}</sub>
                    </section>
                    <section class="userCard__btnSection">
                        <a class="userCard__button" href="/users/{{{$user->id}}}">Bekijk het profiel van {{$user->name}}!</a>
                    </section>
                </article>
            @endif
        @endforeach
    </div>
@endsection
