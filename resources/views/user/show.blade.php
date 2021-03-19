@extends('layouts.main')

@section('metaTitle')
    {{$user->name}}
@endsection

@section('title', 'Profiel van Gebruiker')

@section('content')

    <h1 class="page__title">{{$user->name}}</h1>

@endsection