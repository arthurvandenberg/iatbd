@extends('layouts.main')

@section('metaTitle')
    {{$user->name}} {{$user->lastname}}
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/users/profile.css')}}">
<script>
    const hoverImage = (event) => {
        document.querySelector('.userProfile__image').src = event.src;
        document.querySelector('.userProfile__image').srcset = event.src;
    }
</script>
@endsection

@section('content')
    <div class="userProfile">
        <div class="userProfile__gallery">
            <img class="userProfile__image"
                 srcset="
                 {{asset($user->image640)}} 640w,
                 {{asset($user->image1280)}} 1280w,
                 {{asset($user->image1920)}} 1920w
                 "
                 sizes="(min-width: 1040px) 38.98vw, (min-width: 780px) 51.67vw, 95vw"
                 src="{{asset($user->image)}}"/>
        </div>
        <div class="userProfile__info">
            <div class="userProfile__userInfo">
                <h1 class="userProfile__title">{{$user->name}} {{$user->lastname}}</h1>
                <p>{{$user->age}} jaar</p>
                <p>{{$user->hometown}}</p>
            </div>
            <div class="userProfile__description">
                <p>{{$user->description}}</p>
            </div>
            <div class="userProfile__reviews">
                <h2 class="userProfile__reviews-title">{{__('Want to know what others think about ').$user->name.'?'}}</h2>
                <a href="{{url('users/'.$user->id.'/reviews')}}" class="auth__button">{{__('Check out the Reviews!')}}</a>
            </div>
        </div>
    </div>
    <h2 class="userProfile__reviews-title">Bekijk de foto's van {{$user->name}}</h2>
    <div class="userGallery">
        <img onmouseenter="hoverImage(this)" class="userGallery__image"
             srcset="
             {{asset($user->image640)}} 640w,
             {{asset($user->image1280)}} 1280w,
             {{asset($user->image1920)}} 1920w
             "
             sizes="(min-width: 1040px) calc(10vw - 17px), (min-width: 780px) calc(13.33vw - 17px), (min-width: 440px) calc(31.56vw - 13px), calc(47.5vw - 10px)"
             src="{{asset($user->image)}}" alt="Afbeelding van {{$user->name}}"/>
        @foreach($homeImages as $homeImage)
            <img onmouseenter="hoverImage(this)" class="userGallery__image"
                 srcset="
                 {{asset($homeImage->image640)}} 640w,
                 {{asset($homeImage->image1280)}} 1280w,
                 {{asset($homeImage->image1920)}} 1920w
                 "
                 sizes="(min-width: 1040px) calc(10vw - 17px), (min-width: 780px) calc(13.33vw - 17px), (min-width: 440px) calc(31.56vw - 13px), calc(47.5vw - 10px)"
                 src="{{asset($homeImage->image)}}" alt="Afbeelding van het huis van {{$user->name}}"/>
        @endforeach
    </div>
@endsection
