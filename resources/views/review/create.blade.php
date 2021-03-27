@extends('layouts.main')

@section('metaTitle')
    Nieuwe Review
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/review/create.css')}}">
@endsection

@section('title', 'Nieuwe Review')


@section('content')
    <h2>
        Schrijf hieronder een review over {{$user->name}} :)
    </h2>
    <form method="POST" action="/users/reviews/store">
        @csrf
        <div class="auth__field">
            <x-label for="title" :value="__('Title')" />
            <x-input id="title" type="text" name="title" :value="old('title')" required autofocus />
        </div>

        <div class="auth__field">
            <x-label for="review" :value="__('Your Review: ')" />
            <textarea id="review"  type="date" name="review" class="auth__input" :value="old('review')" required autofocus></textarea>
        </div>
        <x-input id="reviewed_user"  type="hidden" name="reviewed_user" value="{{$user->id}}" required autofocus />
        <x-input id="author"  type="hidden" name="author" value="{{Auth::id()}}" required autofocus />
        <x-button>{{__('Send')}}</x-button>
    </form>
@endsection
