<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 items-center justify-center text-center">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">
            <span class="text-orange-500">Masuk</span> untuk<br>
            mengakses dashboardmu
        </h1>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif
        <div class="mt-4">


            <div class="flex flex-col  space-y-3 mt-4">
                <x-primary-button class="w-full flex justify-center">
                    {{ __('Continue') }}
                    {{ __('Log in') }}
                </x-primary-button>

                <x-primary-button>
                    <a href="{{ url('/auth/google') }}" class="w-full flex justify-center">
                        {{ __('Login with Google') }}
                    </a>
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>