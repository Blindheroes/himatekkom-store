<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 flex flex-col lg:flex-row">

    <!-- Left Side - Form -->
    <div class="w-full h-screen lg:w-1/2 flex items-center justify-center p-4 lg:p-8 shadow-[5px_0_15px_-3px_rgba(0,0,0,0.3)] z-10">
        <div class="w-full max-w-md">
            {{ $slot }}
        </div>
    </div>

    <!-- Right Side - Background Image -->
    <div class="hidden lg:block lg:relative lg:w-1/2 lg:flex-1">
        <div class="absolute inset-0 h-full w-full flex items-center justify-center overflow-hidden">
            <!-- Gradient Layer -->
            <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-yellow-100"></div>

            <!-- Image Layer -->
            <img src="{{asset('storage/auth/decoration-bgs.png')}}" alt="gambar bg" class="absolute inset-0 bg-cover bg-center bg-no-repeat max-w-screen">

            <!-- Optional semi-transparent overlay -->
            <div class="absolute inset-0 bg-yellow-50 bg-opacity-20"></div>
        </div>
    </div>
</body>

</html>