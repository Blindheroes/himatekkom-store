<x-layouts.auth title="Masuk">

    <div>
        <h1 class="text-center text-2xl font-bold">
            <span class="text-yellow-500">Masuk</span> untuk<br>mengakses dashboard mu
        </h1>

        <form action="{{route('login.store')}}" method="POST" class="mt-8 space-y-6">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" />
                @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" />
                @error('password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between">
                <a href="{{ route('filament.seller.auth.password-reset.request') }}" class="text-sm text-yellow-500">Lupa sandi?</a>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full py-3 rounded-lg bg-yellow-500 text-white font-medium">
                Masuk
            </button>
        </form>

        <!-- Register & Disclaimer -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register.index') }}" class="font-medium text-yellow-500">Daftar sekarang</a>
        </p>
        <p class="mt-2 text-center text-xs text-gray-400">
            Platform Seller hanya dapat digunakan oleh Mahasiswa Teknik Komputer ITS
        </p>
    </div>
</x-layouts.auth>