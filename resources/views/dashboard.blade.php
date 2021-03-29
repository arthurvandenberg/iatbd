@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection

@section('metaTitle', 'Dashboard')

<?php
    $user = Auth::user();
    $kind_of_pets = \App\Models\KindOfPet::all();
    $pets_of_user = \App\Models\User::find(Auth::id())->getPets;
    $requests_of_user = \App\Models\User::find(Auth::id())->getRequests;
    $requested_pets = array();
    foreach($pets_of_user as $pet){
        array_push($requested_pets, \App\Models\Pet::find($pet->id)->getRequests);
    }
//    array_splice($requested_pets, 0,1);
?>

@section('content')
    <div class="dashboard__wrapper">
        <h1 class="dashboard__title">{{ __('Welcome, ') . $user->name . '!'}}</h1>
        <div class="dashboard__pet-wrapper">
            <div class="dashboard__row">
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
                            <x-label for="endOfStay" :value="__('End of Stay')" />
                            <x-input id="endOfStay"  type="date" name="endOfStay" :value="old('endOfStay')" required autofocus />
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
                    <div class="dashboard__column-row">
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
                    <div class="dashboard__column-row">
                        <h2 class="dashboard__column-title">{{ __('Your offers: ') }}</h2>
                        <ul class="dashboard__list">
                            @forelse($requested_pets as $pet_requests)
                                @foreach($pet_requests as $request)
                                    <?php
                                        $request_user = \App\Models\User::find($request->user_id);
                                        $request_pet = \App\Models\Pet::find($request->pet_id);
                                    ?>
                                    @if($request->confirmed === 0)
                                        <li class="dashboard__list-item">
                                            <span>{{$request_user->name}} wil op {{$request_pet->name}} passen!</span>
                                            <form method="GET" action="/users/{{$request->user_id}}" target="_blank">
                                                @csrf
                                                <x-button class="dashboard__button">Bekijk profiel</x-button>
                                            </form>
                                        </li>
                                        <li class="dashboard__list-item dashboard__button-container">
                                            <form method="POST" action="/request/{{$request->id}}/{{$request_pet->owner_id}}/accept">
                                                @csrf
                                                <x-button class="dashboard__button-accept">
                                                    {{__('Confirm')}}
                                                </x-button>
                                            </form>
                                            <form method="POST" action="/request/{{$request->id}}/{{$request_pet->owner_id}}/delete">
                                                @csrf
                                                <x-button class="dashboard__button-decline">
                                                    {{__('Decline')}}
                                                </x-button>
                                            </form>
                                        </li>
                                        @elseif($request->finished === 0)
                                            <li class="dashboard__list-item">
                                                <span class="dashboard__pending">{{$request_user->name}} past van {{date('d-m-Y', strtotime($request_pet->available_date))}} tot {{date('d-m-Y', strtotime($request_pet->end_of_stay))}} op {{$request_pet->name}}</span>
                                            </li>
                                        @if(\Carbon\Carbon::now() >= $request_pet->end_of_stay)
                                            <li class="dashboard__list-item">
                                                <form method="POST" action="/request/{{$request->id}}/{{$request_pet->owner_id}}/finish" class="dashboard__return-form">
                                                    @csrf
                                                    <x-button class="dashboard__button-return">{{__('Confirm the return of '.$request_pet->name)}}</x-button>
                                                </form>
                                            </li>
                                        @endif
                                        @elseif($request->reviewed === 0)
                                            <li class="dashboard__list-item">
                                                <span>Heeft {{$request_pet->name}} het leuk gehad bij {{$request_user->name}}?</span>
                                                <form method="GET" action="/users/{{$request->user_id}}/reviews/create/{{$request_pet->id}}">
                                                    @csrf
                                                    <x-button class="dashboard__button">Laat een Review achter</x-button>
                                                </form>
                                            </li>
                                        @else
                                            @continue
                                        @endif
                                @endforeach
                            @empty
                                <li>{{__('No pets')}}</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashoard__row">
                <h2 class="dashboard__column-title">{{__('Offers you\'ve made: ')}}</h2>
                <ul class="dashboard__list">
                    @forelse($requests_of_user as $my_request)
                        <?php
                            $my_request_pet = \App\Models\Pet::find($my_request->pet_id);
                        ?>
                        @if($my_request->confirmed === 0)
                            <li class="dashboard__list-item">
                                <span>{{$my_request_pet->name}}</span>
                                <form method="POST" action="/request/{{$my_request->id}}/{{Auth::id()}}/delete">
                                    @csrf
                                    <x-button class="dashboard__button">
                                        {{__('Cancel')}}
                                    </x-button>
                                </form>
                            </li>
                        @elseif($my_request->finished === 0)
                            <li class="dashboard__list-item">
                                <span>{{$my_request_pet->name}}</span>
                            </li>
                        @else
                            @continue
                        @endif
                    @empty
                        {{__('You haven\'t made any offers yet.')}}
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
