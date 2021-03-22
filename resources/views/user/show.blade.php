@extends('layouts.main')

@section('metaTitle')
    {{$user->name}} {{$user->lastname}}
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/users/profile.css')}}">
@endsection

@section('content')
    <div class="userProfile">
        <div class="userProfile__gallery">
            <img class="userProfile__image" src="{{asset($user->image)}}"/>
        </div>
        <div class="userProfile__info">
            <div class="userProfile__userInfo">
                <h1 class="userProfile__title">{{$user->name}} {{$user->lastname}}</h1>
                <p>{{$user->age}} jaar</p>
                <p>Past op: {{$user->sits}}</p>
            </div>
            <div class="userProfile__description">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam laborum perspiciatis eveniet nostrum voluptas? Commodi veritatis expedita, quibusdam atque totam natus incidunt laudantium sapiente pariatur odit cum similique quod dolor.</p>
            </div>
        </div>
    </div>
    <div class="userGallery">
        
    </div>
@endsection