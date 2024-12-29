<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('logo/logo.png') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-[url('/public/bg-svg/bg.svg')] bg-cover bg-center dark:bg-gray-900">

        <div class="w-full max-w-sm md:max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="md:grid md:grid-cols-2 md:items-center md:justify-between md:space-x-6">
                <img class="w-[350px] h-[450px] rounded-xl shadow-md hidden md:flex" src="{{ asset('imgs/portrait2.jpg') }}" alt="portrait">

                <div>
                    <div class="flex items-center justify-between">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                        <h5 class="text-xl font-bold text-gray-900 dark:text-white">

                            @if(request()->routeIs('login'))
                            {{ __('Sign in') }}
                            @elseif(request()->routeIs('register'))
                            {{ __('Sign up') }}
                            @endif
                        </h5>
                    </div>
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
</body>

</html>