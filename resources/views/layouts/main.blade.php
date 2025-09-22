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
    <script src="https://kit.fontawesome.com/364218679d.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <x-navbar />

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <!-- Page Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto flex flex-col gap-[40px] sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <footer class="bg-black shadow-sm p-4 sticky top-0">
        <footer class="rounded-lg shadow-sm m-4 bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 flex items-center justify-center">
                <span class="text-sm sm:text-center text-gray-400">© 2025 <a href="https://flowbite.com/"
                        class="hover:underline">Posyantek Lebak Denok & Universitas Al-Khairiyah</a>.
                </span>
            </div>
        </footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
