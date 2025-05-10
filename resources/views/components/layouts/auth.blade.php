<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Auth Page' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Adjust if not using Vite --}}
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="flex w-full max-w-4xl bg-white shadow-lg rounded-xl p-8 space-x-8">
            <div class="w-1/2">
                <img src="{{ asset('assets/auth-background.png') }}" alt="Auth Background" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="w-1/2">
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>