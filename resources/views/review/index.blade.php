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
            <?php $reviewer = \App\Models\User::find($review->review_by); ?>
            <article class="reviewCard">
                <h2 class="reviewCard__title">{{$review->title}}</h2>
                <p class="reviewCard__review">{{$review->review}}</p>
                <p class="reviewCard__reviewer">Review door: {{$reviewer->name." ".$reviewer->lastname}}</p>
            </article>
        @empty
            <h2>{{__('No Reviews about this User')}}</h2>
        @endforelse
    </div>
@endsection
