@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/pets/profile.css')}}">
@endsection

@section('metaTitle')
{{$pet->name}} de {{$pet->kind}}
@endsection

@section('content')
    <a href="/pets">&larr; Terug naar het overzicht</a>
    <div class="petProfile">
        <figure class="petProfile__gallery">
            <img class="petProfile__image"
                 srcset="
                 {{asset($pet->image640)}} 640w,
                 {{asset($pet->image1280)}} 1280w,
                 {{asset($pet->image1920)}} 1920w
                 "
                 sizes="(min-width: 1040px) 36.02vw, (min-width: 780px) 48.33vw, 95vw"
                 src="{{asset($pet->image)}}"/>
        </figure>
        <article class="petProfile__info">
            <section class="petProfile__petInfo">
                <h1 class="petProfile__title">{{$pet->name}} de {{$pet->kind}}</h1>
                <sub>Eigenaar: {{$owner->name}}</sub>
            </section>
            <section class="petProfile__description">
                <p>{{$pet->description}}</p>
            </section>
            <section class="petProfile__listings">
                <h2 class="petProfile__listings-title">{{__('Sitting Options')}}</h2>
                <ul class="petProfile__listings-list">
                    @forelse($listings as $listing)
                        <?php
                        $startOfStay = new DateTime($listing->available_date);
                        $endOfStay = new DateTime($listing->end_of_stay);
                        $interval = $startOfStay->diff($endOfStay);
                        $lengthOfStay = $interval->format('%a');

                        ?>
                        <li class="petProfile__listings-list-item">
                            <span><p>Vanaf: {{date('d-m-Y', strtotime($listing->available_date))}} voor {{$lengthOfStay}} @if($lengthOfStay > 1) dagen @else dag @endif Vergoeding: {{$listing->compensation_amount}}</p></span>
                            @if($listing->available === 0)
                                <x-button type="disabled" disabled class="petProfile__button disabled">Niet meer beschikbaar</x-button>
                            @else
                                @auth
                                    <form method="POST" action="/request/create">
                                        @csrf
                                        <input name="pet_id" type="hidden" value="{{$pet->id}}"/>
                                        <input name="user_id" type="hidden" value="{{$user->id}}"/>
                                        <input name="listing_id" type="hidden" value="{{$listing->id}}"/>
                                        @if($user->blocked === 1)
                                            <x-button type="disabled" disabled class="petProfile__button disabled">Je kunt niet reageren</x-button>
                                        @elseif(count(\App\Models\Listing::find($listing->id)->getRequests->where('user_id', $user->id)) > 0)
                                            <x-button type="disabled" disabled class="petProfile__button disabled">Je hebt al gereageerd</x-button>
                                        @else
                                            <x-button class="petProfile__button">Bied je aan!</x-button>
                                        @endif
                                    </form>
                                @endauth
                                @guest
                                    <form method="GET" action="/login">
                                        @csrf
                                        <x-button class="petProfile__button">Log in om je aan te bieden!</x-button>
                                    </form>
                                @endguest
                            @endif
                        </li>
                    @empty
                        <h3>{{$pet->name}} heeft op het moment geen oppas nodig.</h3>
                    @endforelse
                </ul>
                @if(Session::has('request_create_success'))
                    <p class="dashboard__alert success">
                        {{ Session::get('request_create_success') }}<button onclick="this.parentElement.remove();" class="dashboard__alert-button">x</button>
                    </p>
                @endif
            </section>
        </article>
    </div>
@endsection
