@extends('layouts.main')

@section('metaTitle')
    Reviews over {{$user->name}}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('css/review/catalog.css')}}">
@endsection

@section('title', 'Reviews')


@section('content')
    <h1 class="page__title">Reviews over {{$user->name}}</h1>
    <div class="reviewCatalog">
        @forelse($reviews as $review)
            <?php $author = \App\Models\User::find($review->author); ?>
            <article class="reviewCard">
                <section class="reviewCard__textContent">
                    <h2 class="reviewCard__title">{{$review->title}}</h2>
                    <p class="reviewCard__review">{{$review->review}}</p>
                    <p class="reviewCard__reviewer">Review door: {{$author->name." ".$author->lastname}}</p>
                </section>
                <figure class="reviewCard__imageContent">
                    <img class="reviewCard__image" src="{{asset($author->image)}}" alt="{{$author->name." ".$author->lastname}}"/>
                </figure>
            </article>
        @empty
            <h2>{{__('No Reviews about this User')}}</h2>
        @endforelse
    </div>
@endsection
