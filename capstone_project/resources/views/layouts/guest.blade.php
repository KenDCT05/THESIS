<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-pink-50 text-gray-800">
    <div class="min-h-screen flex flex-col justify-center items-center">
        
        <!-- Logo or Title -->
        <div class="mb-6 text-center">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-pink-500 mx-auto" />
            </a>
            <h1 class="mt-2 text-xl font-bold text-pink-700">Welcome to LMS</h1>
        </div>

        <!-- Auth Card Slot -->
        <div class="w-full max-w-md px-6 py-8 bg-white border border-pink-200 rounded-xl shadow-lg">
            {{ $slot }}
        </div>

        <!-- Footer (Optional) -->
        <div class="mt-6 text-sm text-gray-500">
            &copy; {{ date('Y') }} LMS. All rights reserved.
        </div>
    </div>
</body>
</html>
