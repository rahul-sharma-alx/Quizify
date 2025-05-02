<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Navigation -->
        @include('admin.layouts.navigation')

        <div class="flex-1 flex flex-col">
            <!-- Header -->
            @include('admin.layouts.header')

            <!-- Page Content -->
            <main class="flex-1 p-4 md:p-6 overflow-auto">
                <!-- Breadcrumbs -->
                @include('admin.partials.breadcrumbs')

                <!-- Alerts -->
                @include('admin.partials.alerts')

                @yield('content')
            </main>

            <!-- Footer -->
            @include('admin.layouts.footer')
        </div>
    </div>

    @stack('modals')
    @stack('scripts')
</body>
</html>