<x-guest-layout>
    <x-auth-session-status :status="session('status')" />
    <h1>SpiceCloud Kitchens</h1>

    <form method="POST" action="{{ route('login') }}">
        <h1 class="formText">Login</h1>
        <h3>Welcome Back!</h3>
        @csrf

        <div class="pariDiv">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pariDiv">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class=""
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

     <div>
            <label for="remember_me" class="r">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>


        <div class="pariDiv">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="btn btn-primary">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
