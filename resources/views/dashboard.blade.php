@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<script>
    const toggleActive = (event) => {
        if(!document.querySelector('#dashboard__review-section').classList.contains('active')){
            document.querySelector('#dashboard__review-section').classList.add('active');
            console.log('show')
        } else {
            document.querySelector('#dashboard__review-section').classList.remove('active');
            console.log('hide')
        }
    }
</script>
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
    $homeImages = \App\Models\User::find(Auth::id())->getHomeImages;
?>

@section('content')
    <div class="dashboard__wrapper">
        <h1 class="dashboard__title">{{ __('Welcome, ') . $user->name . '!'}}</h1>
        <article class="dashboard__row">
            <section class="dashboard__column">
            <h2 class="dashboard__column-title">{{ __('Sign your pet up: ') }}</h2>
                <form method="POST" action="/pets/create" class="dashboard__pet-form" enctype="multipart/form-data">
                    @csrf
                    <div class="auth__field name">
                        <x-label for="name" :value="__('Your pet\'s name: ')" />
                        <x-input id="name"  type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="auth__field kind">
                        <x-label for="kind" :value="__('Kind')" />
                        <select id="kind" name="kind" class="auth__input" required autofocus>
                            @foreach($kind_of_pets as $kind)
                                @if($kind->kind !== 'Beer')
                                    <option :value="{{$kind->kind}}">{{$kind->kind}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="auth__field image">
                        <x-label for="image" :value="__('Upload een foto van je huisdier: ')"/>
                        <x-input id="image" type="file" name="image" required/>
                    </div>
                    <div class="auth__field description">
                        <x-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" class="auth__input" :value="old('description')" rows="5" required autofocus></textarea>
                    </div>
                    <x-button class="dashboard__button-pet-form">
                        {{ __('Register') }}
                    </x-button>
                    @if(Session::has('pet_create_success'))
                        <p class="dashboard__alert success">
                            {{ Session::get('pet_create_success') }}<button onclick="this.parentElement.remove();" class="dashboard__alert-button">x</button>
                        </p>
                    @endif
                </form>
            </section>
            <section class="dashboard__column right">
                <section class="dashboard__column-row">
                    <h2 class="dashboard__column-title">{{ __('Your Pets: ') }}</h2>
                    <ul class="dashboard__list">
                        @foreach($pets_of_user as $pet)
                            <li class="dashboard__list-item">
                                <span><a href="/pets/{{$pet->id}}">{{$pet->name}}</a></span>
                                <div class="dashboard__form-section">
                                    <form method="GET" action="/listing/create/{{$pet->id}}">
                                        @csrf
                                        <x-button class="dashboard__button-left">{{__('Create Listing')}}</x-button>
                                    </form>
                                    <form method="POST" action="/pets/{{$pet->id}}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <x-button onClick="return confirm('{{__('Are you sure?')}}')" class="dashboard__button">{{__('Delete')}}</x-button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @if(Session::has('listing_success'))
                        <p class="dashboard__alert success">
                            {{ Session::get('listing_success') }}<button onclick="this.parentElement.remove();" class="dashboard__alert-button">x</button>
                        </p>
                    @endif
                </section>
                <section class="dashboard__column-row">
                    <h2 class="dashboard__column-title">{{ __('Your offers: ') }}</h2>
                    <ul class="dashboard__list">
                        @forelse($requested_pets as $pet_requests)
                            @foreach($pet_requests as $request)
                                <?php
                                    $request_user = \App\Models\User::find($request->user_id);
                                    $request_pet = \App\Models\Pet::find($request->pet_id);
                                    $request_listing = $request->getListing;
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
                                        <form method="POST" action="/request/{{$request->id}}/accept">
                                            @csrf
                                            <x-button class="dashboard__button-accept">
                                                {{__('Confirm')}}
                                            </x-button>
                                        </form>
                                        <form method="POST" action="/request/{{$request->id}}/delete">
                                            @csrf
                                            @method('DELETE')
                                            <x-button class="dashboard__button-decline">
                                                {{__('Decline')}}
                                            </x-button>
                                        </form>
                                    </li>
                                    @elseif($request->finished === 0)
                                        <li class="dashboard__list-item">
                                            <span class="dashboard__pending">{{$request_user->name}} past van {{date('d-m-Y', strtotime($request_listing->available_date))}} tot {{date('d-m-Y', strtotime($request_listing->end_of_stay))}} op {{$request_pet->name}}</span>
                                        </li>
                                    @if(\Carbon\Carbon::now() >= $request_pet->end_of_stay)
                                        <li class="dashboard__list-item">
                                            <form method="POST" action="/request/{{$request->id}}/finish" class="dashboard__return-form">
                                                @csrf
                                                <x-button class="dashboard__button-return">{{__('Confirm the return of ').$request_pet->name}}</x-button>
                                            </form>
                                        </li>
                                    @endif
                                    @elseif($request->reviewed === 0)
                                        <li class="dashboard__list-item">
                                            <span>Heeft {{$request_pet->name}} het leuk gehad bij {{$request_user->name}}?</span>
                                            <a class="auth__button dashboard__button" onClick="toggleActive(this);">Laat een Review achter</a>
                                        </li>
                                        <li class="dashboard__list-item dashboard__pending" id="dashboard__review-section">
                                            <form method="POST" action="/users/reviews/store/{{$request->id}}" class="dashboard__review-form">
                                                @csrf
                                                <x-label for="title" :value="__('Title')" />
                                                <x-input id="title" type="text" name="title" :value="old('title')" required autofocus />

                                                <x-label for="review" :value="__('Your Review: ')" />
                                                <textarea id="review"  type="date" name="review" class="auth__input" :value="old('review')" rows="5" required autofocus></textarea>

                                                <x-input id="reviewed_user"  type="hidden" name="reviewed_user" value="{{$request_user->id}}" required autofocus />
                                                <x-input id="author"  type="hidden" name="author" value="{{Auth::id()}}" required autofocus />
                                                <x-button class="dashboard__review-button">{{__('Send')}}</x-button>
                                            </form>
                                        </li>
                                    @endif
                            @endforeach
                        @empty
                            <li>{{__('No pet')}}</li>
                        @endforelse
                    </ul>
                    @if(Session::has('review_create_success'))
                        <p class="dashboard__alert success">
                            {{ Session::get('review_create_success') }}<button onclick="this.parentElement.remove();" class="dashboard__alert-button">x</button>
                        </p>
                    @endif
                </section>
            </section>
        </article>
        <article class="dashboard__row">
            <section class="dashboard__column">
                <h2 class="dashboard__column-title">{{__('Offers you\'ve made: ')}}</h2>
                <ul class="dashboard__list">
                    @forelse($requests_of_user as $my_request)
                        <?php
                            $my_request_pet = \App\Models\Pet::find($my_request->pet_id);
                        ?>
                        @if($my_request->confirmed === 0)
                            <li class="dashboard__list-item">
                                <span>{{__('You have offered to sit ').$my_request_pet->name}}</span>
                                <form method="POST" action="/request/{{$my_request->id}}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="dashboard__button">
                                        {{__('Cancel Offer')}}
                                    </x-button>
                                </form>
                            </li>
                        @elseif($my_request->finished === 0)
                            <li class="dashboard__list-item">
                                <span class="dashboard__pending">{{__('You will be sitting ').$my_request_pet->name.__(' from ').date('d-m-Y', strtotime($my_request_pet->available_date)).__(' until ').date('d-m-Y', strtotime($my_request_pet->end_of_stay)).__('... Exciting!')}}</span>
                            </li>
                        @else
                            @continue
                        @endif
                    @empty
                        <li class="dashboard__list-item dashboard__pending">{{__('You haven\'t made any offers yet.')}}</li>
                    @endforelse
                </ul>
            </section>
            <section class="dashboard__column">
                <h2 class="dashboard__column-title">{{__('Add a photo of your home to your profile')}}</h2>
                <div class="dashboard__home-new">
                    <form method="POST" action="/image/store" enctype="multipart/form-data" >
                        @csrf
                        <x-input type="file" name="image" required/>
                        <x-button>{{__('Upload')}}</x-button>
                    </form>
                    @if(Session::has('image_upload_success'))
                        <p class="dashboard__alert success">
                            {{ Session::get('image_upload_success') }}<button onclick="this.parentElement.remove();" class="dashboard__alert-button">x</button>
                        </p>
                    @endif
                </div>
            </section>
        </article>
        <article class="dashboard__home-wrapper">
            <h2 class="dashboard__column-title">{{__('Images of your home: ')}}</h2>
            <section class="dashboard__home-images">
                @forelse($homeImages as $image)
                    <figure>
                        <img src="{{$image->image}}" alt="Image of house"/>
                        <form method="POST" action="/image/{{$image->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <button onClick="return confirm('{{__('Are you sure?')}}')" class="dashboard__home-delete-btn">X</button>
                        </form>
                    </figure>
                @empty
                    <p>{{__('No images found')}}</p>
                @endforelse
            </section>
        </article>
    </div>
@endsection
