<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="header__title-link"><h2 class="header__title">Barkplaats 🐶</h2></a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="auth__field">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name"  type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="auth__field">
                <x-label for="lastname" :value="__('Last Name')" />

                <x-input id="lastname"  type="text" name="lastname" :value="old('lastname')" required autofocus />
            </div>

            <div class="auth__field">
                <x-label for="birthday" :value="__('Date of Birth')" />

                <x-input id="birthday"  type="date" name="birthday" :value="old('birthday')" required autofocus />
            </div>

            <div class="auth__field">
                <x-label for="hometown" :value="__('Home Town')" />

                <x-input id="hometown"  type="text" name="hometown" :value="old('hometown')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="auth__field">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="auth__field">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" 
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="auth__field">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" 
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="auth__submit">
                <a class="auth__forgot" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
