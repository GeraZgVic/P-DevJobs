<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            visibility: hidden;
            opacity: 0;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    @include('layouts.navigationGuest')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current flex justify-center" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    {{-- DarkMmode --}}
    <script>
        // app.js
        function darkExpected() {
            return localStorage.theme === 'dark' || (!('theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches);
        }

        function initDarkMode() {
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (darkExpected()) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        }

        function showContent() {
            document.body.style.visibility = 'visible';
            document.body.style.opacity = 1;
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Agregar evento de clic al botón
            const darkModeButton = document.getElementById('darkModeButton');
            darkModeButton.addEventListener("click", function() {
                if (darkExpected()) localStorage.theme = 'light';
                else localStorage.theme = 'dark';
                initDarkMode();

                // Desencadenar el evento personalizado "toggle-darkmode"
                const event = new Event("toggle-darkmode");
                window.dispatchEvent(event);
            });

            // Inicializar el modo oscuro
            initDarkMode();
            showContent();
        });
    </script>
</body>

</html>
