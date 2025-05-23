<x-guest-layout>


    <div class="items-center">
        <div class="order-2 lg:order-1 text-center ">
            <!-- Main Character Image -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/auth/registration-vector.png') }}"
                    alt="Seller Dashboard Illustration"
                    class="w-1/2 lg:w-1/3 h-auto object-cover">
            </div>


            <div class="space-y-6">
                <!-- Main Heading -->
                <h1 class="text-2xl font-bold text-gray-900 leading-tight">
                    Beli Nasgok taruh di meja,<br>
                    <span class="text-gray-800">Sekarang tinggal duduk manis aja!</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-gray-600 text-base sm:text-sm max-w-md mx-auto lg:mx-0">
                    Makasih udah daftar~ Kalau akunnya sudah aktif, kami akan konfirmasi melalui WhatsApp kamu.
                </p>

                <!-- CTA Button -->
                <div class="pt-4">
                    <a href="{{ route('home') }}">
                        <button class="w-full sm:w-auto bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-3 px-8 rounded-lg transition-colors duration-200 text-lg shadow-sm hover:shadow-md">
                            Kembali ke Beranda
                        </button>
                    </a>

                </div>
            </div>
        </div>



        <!-- Footer Notice -->
        <footer class="mt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                    </svg>
                    <span>Platform Seller hanya dapat digunakan oleh Mahasiswa Teknik Komputer ITS</span>
                </div>
            </div>
        </footer>
    </div>
</x-guest-layout>