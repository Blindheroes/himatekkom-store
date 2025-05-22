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

<body class="min-h-screen bg-gray-50 flex">

    <!-- Left Side - Form -->
    <div class="w-1/2 flex items-center justify-center p-8">

        <div class="w-full max-w-md ">

            {{ $slot }}
        </div>
    </div>

    <!-- Right Side - Background Image -->
    <div class="hidden lg:block relative w-0 flex-1">
        <div class="absolute inset-0 h-full w-full flex items-center justify-center">
            <!-- Gradient Layer -->
            <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-yellow-100"></div>

            <!-- Image Layer -->
            <div class="absolute inset-0 bg-[url('{{ asset('auth/decoration-bgs.png') }}')] bg-cover bg-center bg-no-repeat"></div>

            <!-- Optional semi-transparent overlay -->
            <div class="absolute inset-0 bg-yellow-50 bg-opacity-20"></div>
        </div>
    </div>






    <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>


    </div> -->
</body>

</html>