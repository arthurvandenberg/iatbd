@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection

@section('metaTitle', 'Dashboard')

<?php
    $user = Auth::user();
    $kind_of_pets = \App\Models\KindOfPet::all();
    $pets_of_user = \App\Models\User::find(Auth::id())->getPets;
    $requested_pets = array();
    foreach($pets_of_user as $pet){
        array_push($requested_pets, \App\Models\Pet::find($pet->id)->getRequests);
    }
    array_splice($requested_pets, 0,1);
?>

@section('content')
    <div class="dashboard__wrapper">
        <h1 class="dashboard__title">{{ __('Welcome, ') . $user->name . '!'}}</h1>
        <div class="dashboard__pet-wrapper">
            <div class="dashboard__column">
            <h2 class="dashboard__column-title">{{ __('Sign your pet up: ') }}</h2>
                <form method="POST" action="/pets/create">
                    @csrf
                    <div class="auth__field">
                        <x-label for="name" :value="__('Your pet\'s name: ')" />
                        <x-input id="name"  type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="auth__field">
                        <x-label for="kind" :value="__('Kind')" />
                        <select id="kind" name="kind" class="auth__input" required autofocus>
                            @foreach($kind_of_pets as $kind)
                                @if($kind->kind !== 'Beer')
                                    <option :value="{{$kind->kind}}">{{$kind->kind}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="auth__field">
                        <x-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" class="auth__input" :value="old('description')" rows="5" required autofocus></textarea>
                    </div>

                    <div class="auth__field">
                        <x-label for="availableDate" :value="__('Available From: ')" />
                        <x-input id="availableDate"  type="date" name="availableDate" :value="old('availableDate')" required autofocus />
                    </div>

                    <div class="auth__field">
                        <x-label for="lengthOfStay" :value="__('Length of Stay')" />
                        <x-input id="lengthOfStay"  type="text" name="lengthOfStay" :value="old('lengthOfStay')" required autofocus />
                    </div>

                    <div class="auth__field">
                        <x-label for="compensationAmount" :value="__('Compensation Amount')" />
                        <x-input id="compensationAmount"  type="text" name="compensationAmount" :value="old('compensationAmount')" required autofocus />
                    </div>
                    <x-button>
                        {{ __('Register') }}
                    </x-button>
                </form>
            </div>
            <div class="dashboard__column right">
                <div class="dashboard__row">
                    <h2 class="dashboard__column-title">{{ __('Your Pets: ') }}</h2>
                    <ul class="dashboard__list">
                        @foreach($pets_of_user as $pet)
                            <li class="dashboard__list-item">
                                <span>{{$pet->name}}</span>
                                <form method="POST" action="/pets/{{$pet->id}}/delete">
                                    @csrf
                                    <x-button onClick="return confirm('{{__('Are you sure?')}}')" class="dashboard__button">{{__('Delete')}}</x-button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="dashboard__row">
                    <h2 class="dashboard__column-title">{{ __('Your offers: ') }}</h2>
                    <ul class="dashboard__list">
                        @forelse($requested_pets as $pet_requests)
                            @foreach($pet_requests as $request)
                                @if($request->confirmed === 0)
                                    <li class="dashboard__list-item">
                                        <span>{{\App\Models\User::find($request->user_id)->name}} wil op {{\App\Models\Pet::find($request->pet_id)->name}} passen!</span>
                                        <form method="GET" action="/users/{{$request->user_id}}" target="_blank">
                                            @csrf
                                            <x-button class="dashboard__button">Bekijk profiel</x-button>
                                        </form>
                                    </li>
                                @elseif($request->finished === 0)
                                    <li class="dashboard__list-item">
                                        <span style="width: 100%; text-align: center;">{{\App\Models\User::find($request->user_id)->name}} past vanaf {{\App\Models\Pet::find($request->pet_id)->available_date}} voor {{\App\Models\Pet::find($request->pet_id)->length_of_stay}} op {{\App\Models\Pet::find($request->pet_id)->name}}</span>
                                    </li>
                                @elseif($request->reviewed === 0)
                                    <li class="dashboard__list-item">
                                        <span>Tevreden over {{\App\Models\User::find($request->user_id)->name}}?</span>
                                        <x-button class="dashboard__button">Laat een Review achter</x-button>
                                    </li>
                                @endif
                            @endforeach
                            @empty
                                <li>{{__('No requests')}}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
