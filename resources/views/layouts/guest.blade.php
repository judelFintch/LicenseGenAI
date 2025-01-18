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

<!-- Main Content Area -->
<div class="container mx-auto mt-6">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-gray-100 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold">Navigation</h2>
            <ul class="mt-3 space-y-2">
                <li><a href="/dashboard" class="block py-1 px-2 rounded hover:bg-gray-200">Dashboard</a></li>
                <li><a href="{{route('pages.prompt')}}" class="block py-1 px-2 rounded hover:bg-gray-200">Manage
                        Licenses</a></li>
                <li><a href="/analytics" class="block py-1 px-2 rounded hover:bg-gray-200">Analytics</a></li>
                <li><a href="/settings" class="block py-1 px-2 rounded hover:bg-gray-200">Settings</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-6 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold">Welcome to LicenseGen</h2>
            <p class="mt-3 text-gray-700">
                Manage your licenses efficiently with our robust tools and automated PDF generation.
            </p>

            <div class="mt-6">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-100 mt-8 p-4 text-center">
    <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} LicenseGen. All rights reserved.</p>
</footer>
</body>

</html>