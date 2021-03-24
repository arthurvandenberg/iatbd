@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection

@section('metaTitle', 'Dashboard')
    
<?php 
    $user = Auth::user(); 
    $kind_of_pets = \App\Models\KindOfPet::all();
    $pets_of_user = \App\Models\User::find(Auth::id())->allPets;
?>

@section('content')
    <div class="dashboard__wrapper">
        <div>
            <div>
                {{ __('Welcome, ') . $user->name . '!'}}
            </div>
            <br>
            <div>
                <ul>
                    @foreach($pets_of_user as $pet)
                        <li>
                            {{$pet->name}}
                            <form method="POST" action="/pets/{{$pet->id}}/delete">
                                @csrf
                                <x-button>{{__('Delete')}}</x-button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <br>
            <div>
                {{ __('Sign your pet up: ') }}
                <form method="POST" action="/pets/create">
                    @csrf
                    <div class="auth__field">
                        <x-label for="name" :value="__('Your pet\'s name: ')" />
                        <x-input id="name"  type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="auth__field">
                        <x-label for="kind" :value="__('Kind')" />
                        <select id="kind" name="kind" required autofocus>
                            @foreach($kind_of_pets as $kind)
                                @if($kind->kind !== 'Beer')
                                    <option :value="{{$kind->kind}}">{{$kind->kind}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="auth__field">
                        <x-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" :value="old('description')" required autofocus></textarea>
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
        </div>
    </div>
@endsection
