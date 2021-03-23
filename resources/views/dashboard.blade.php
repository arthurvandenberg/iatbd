@extends('layouts.main')

@section('content')
    <div class="dashboard__wrapper">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{ __('You\'re logged in!') }}
            </div>
        </div>
    </div>
@endsection
