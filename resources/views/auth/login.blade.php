<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="header__title-link"><h2 class="header__title">Barkplaats 🐶</h2></a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="auth__field">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="auth__field">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="auth__field">
                <label for="remember_me" class="auth__label auth__label-checkbox">
                    <input id="remember_me" type="checkbox" class="auth__input-checkbox" name="remember">
                    <span class="auth__checkmark"></span>
                    {{ __('Remember me') }}
                </label>
            </div>

            
            <div class="auth__submit">
                @if (Route::has('password.request'))
                <a class="auth__forgot" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <a class="auth__register-link" href="{{route('register')}}">{{__('Don\'t have an account yet?')}}</a>
    </x-auth-card>
</x-guest-layout>
