<x-guest-layout>
    <form method="POST" action="{{ route('register2.post') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="session('register-google.name') ?? old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autocomplete="tel" pattern="[0-9]*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Member ID -->
        <div class="mt-4">
            <x-input-label for="member_id" :value="__('Member ID')" />
            <x-text-input id="member_id" class="block mt-1 w-full" type="text" name="member_id" :value="old('member_id')" required />
            <x-input-error :messages="$errors->get('member_id')" class="mt-2" />
        </div>

        <!-- Member ID Image -->
        <div class="mt-4">
            <x-input-label for="member_id_image" :value="__('Member ID Image')" />
            <input id="member_id_image" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="file" name="member_id_image" required />
            <x-input-error :messages="$errors->get('member_id_image')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- show session (register) -->
    @if (session('register'))
    <div class="mt-4">
        <x-input-error :messages="session('register')" class="mt-2" />
    </div>
    @endif
</x-guest-layout>