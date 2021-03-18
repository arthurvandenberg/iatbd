@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/pets/profile.css')}}">
@endsection

@section('metaTitle')
{{$pet->name}} de {{$pet->kind}} 
@endsection

@section('content')
    <div class="petProfile">
        <div class="petProfile__gallery">
            <img class="petProfile__image" src="{{asset($pet->image)}}"/>
        </div>
        <div class="petProfile__info">
            <div class="petProfile__petInfo">
                <h1>{{$pet->name}} de {{$pet->kind}}</h1>
                <sub>Eigenaar: {{$owner->name}}</sub>
            </div>
            <div class="petProfile__stayInfo">
                <p>Beschikbaar vanaf: <span>{{$pet->available_date}}</span></p>
                <p>Duur van verblijf: <span>{{$pet->length_of_stay}}</span></p>
                <p>Vergoeding: <span>{{$pet->compensation_amount}}</span></p>
            </div>
        </div>
    </div>
@endsection