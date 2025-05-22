<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 items-center justify-center text-center">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">
            <span class="text-orange-500">Daftar</span> dan dapatkan<br>
            uang saku tambahan
        </h1>
    </div>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 " />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center justify-center mt-4 gap-4">
            <div class="w-full">
                <x-primary-button class="w-full justify-center">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>

            <div class="w-full">
                <x-primary-button class="w-full justify-center">
                    <a href="{{ url('/auth/google') }}" class="flex items-center justify-center w-full">
                        {{ __('Login with Google') }}
                    </a>
                </x-primary-button>
            </div>
            <!-- Step indicator -->
            <div class="text-center text-sm text-gray-500">
                Langkah 1 dari 2
            </div>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-2" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <p class="text-xs text-gray-400 mt-2">
                Platform Seller hanya dapat digunakan oleh Mahasiswa Teknik Komputer ITS
            </p>
        </div>

    </form>




</x-guest-layout>