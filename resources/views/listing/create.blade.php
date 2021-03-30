@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/listings/create.css')}}">
@endsection

@section('metaTitle')
    {{$pet->name.__(' aanbieden')}}
@endsection


@section('content')
    <div class="listingCard">
        <a href="/" class="listingCard__title"><h2>Barkplaats 🐶</h2></a>
        <form method="POST" action="/listing/store">
            @csrf
            <x-input name="pet_id" type="hidden" value="{{$pet->id}}" required/>
            <x-input name="available" type="hidden" value="{{true}}" required/>

            <div class="listingCard__dates">
                <div class="listingCard__date-field">
                    <x-label for="availableDate" :value="__('Starting date')" />
                    <x-input id="availableDate" type="date" name="availableDate" :value="old('availableDate')" required autofocus />
                </div>

                <div class="listingCard__date-field">
                    <x-label for="endOfStay" :value="__('Return date')" />
                    <x-input id="endOfStay" type="date" name="endOfStay" :value="old('endOfStay')" required autofocus />
                </div>
            </div>

            <div class="listingCard__field">
                <x-label for="compensationAmount" :value="__('Compensation amount')" />
                <x-input id="compensationAmount" type="text" name="compensationAmount" :value="old('compensationAmount')" required autofocus />
            </div>

            <x-button>{{__('Save')}}</x-button>
        </form>
    </div>
@endsection
