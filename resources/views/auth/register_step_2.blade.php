<x-guest-layout>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Selangkah lagi!</h1>
        <p class="text-gray-600">
            Bantu kami mengonfirmasi bahwa kamu adalah<br>
            Mahasiswa Teknik Komputer ITS
        </p>
    </div>
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
        <!-- <div class="mt-4">
            <x-input-label for="member_id_image" :value="__('Member ID Image')" />
            <input id="member_id_image" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="file" name="member_id_image" required />
            <x-input-error :messages="$errors->get('member_id_image')" class="mt-2" />
        </div> -->

        <!-- File Upload Area -->
        <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors cursor-pointer mt-4" onclick="document.getElementById('member_id_image').click();" id="upload-area">
            <div class="flex flex-col items-center" id="upload-prompt">
                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                <p class="text-gray-600 mb-1">
                    <span class="font-medium">Unggah foto Kartu Tanda Mahasiswa (PDF/JPG/PNG)</span>
                </p>
                <p class="text-sm text-gray-500" id="file-name">Klik untuk memilih file</p>
            </div>

            <div class="flex flex-col items-center hidden" id="file-selected">
                <svg class="w-12 h-12 text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-green-600 mb-1 font-medium">File berhasil diunggah</p>
                <p class="text-sm text-gray-500" id="selected-file-name"></p>
                <p class="text-xs text-gray-400 mt-2">(Klik untuk mengubah file)</p>
            </div>

            <input id="member_id_image" class="hidden" type="file" name="member_id_image" required accept=".pdf,.jpg,.jpeg,.png" onchange="updateFileName(this);" />
            <x-input-error :messages="$errors->get('member_id_image')" class="mt-2" />
        </div>

        <script>
            function updateFileName(input) {
                if (input.files && input.files[0]) {
                    const fileName = input.files[0].name;
                    document.getElementById('selected-file-name').textContent = fileName;
                    document.getElementById('upload-prompt').classList.add('hidden');
                    document.getElementById('file-selected').classList.remove('hidden');
                    document.getElementById('upload-area').classList.add('border-green-300');
                    document.getElementById('upload-area').classList.remove('border-gray-300');
                } else {
                    document.getElementById('file-name').textContent = 'Klik untuk memilih file';
                    document.getElementById('upload-prompt').classList.remove('hidden');
                    document.getElementById('file-selected').classList.add('hidden');
                    document.getElementById('upload-area').classList.remove('border-green-300');
                    document.getElementById('upload-area').classList.add('border-gray-300');
                }
            }
        </script>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>