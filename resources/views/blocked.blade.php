@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/blocked.css')}}">
@endsection

@section('content')
    <div class="blocked__wrapper">
        <h1 class="blocked__title">:(</h1>
        <p class="blocked__subtitle">{{__('We\'re sorry! It seems your account has been suspended.')}}</p>
        <p class="blocked__cta">{{__('Do you think this is a mistake?')}} <a class="blocked__cta-link" href="mailto:info@barkplaats.nl?subject='Help! My account has been suspended :('">{{__('Shoot us an e-mail about it!')}}</a></p>
    </div>
@endsection
