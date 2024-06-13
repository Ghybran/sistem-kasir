
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <script src="https://unpkg.com/idb/build/iife/index-min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
        <script src="js/script.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <main>
        <div class="min-h-screen bg-yellow-50 dark:bg-gray-900 rounded-2xl">

            @php
                $userRole = Auth::user()->role ?? 'default';
            @endphp

            @if($userRole == 'admin')
                @include('admin.header')
            @elseif($userRole == 'master')
                @include('master.header')
            @endif

            @php
                $userRole = Auth::user()->role ?? 'default';
            @endphp

            @if($userRole == 'admin')
                @include('layouts.navigation.navigation-admin')
            @elseif($userRole == 'master')
                @include('layouts.navigation.navigation-master')
            @endif

            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
