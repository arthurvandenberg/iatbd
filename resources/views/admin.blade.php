@extends('layouts.main')

@section('metaTitle', 'Administrator')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
    <div class="admin__wrapper">
        <h1>{{__('Welcome '.Auth::user()->name)}}</h1>
        <div class="admin__row">
            <div class="admin__column">
                <h2>{{__('Users')}}</h2>
                <ul class="admin__list">
                    @foreach($users as $user)
                        <li class="admin__list-item">
                            <span>{{$user->id}} {{$user->name}}</span>
                            <form method="POST" action="/admin/{{$user->id}}/block">
                                @csrf
                                @if($user->blocked === 0)
                                    <x-button onClick="return confirm('{{__('Are you sure?')}}')" class="admin__button">{{__('Block')}}</x-button>
                                @else
                                    <x-button onClick="return confirm('{{__('Are you sure?')}}')" class="admin__button">{{__('Unblock')}}</x-button>
                                @endif
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="admin__column">
                <h2>{{__('Active Requests')}}</h2>
                <ul class="admin__list">
                    @foreach($requests as $request)
                        <?php
                            $request_user = \App\Models\User::find($request->user_id);
                            $request_pet = \App\Models\Pet::find($request->pet_id);
                        ?>
                        <li class="admin__list-item">
                            <span>{{$request_user->name}} heeft aangeboden om op {{$request_pet->name}} te passen.</span>
                            <form method="POST" action="/request/{{$request->id}}/delete">
                                @csrf
                                <x-button onClick="return confirm('{{__('Are you sure?')}}')" class="admin__button">{{__('Delete Request')}}</x-button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
