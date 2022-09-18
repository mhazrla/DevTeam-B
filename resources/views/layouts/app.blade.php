<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        @include('layouts.sidebar')
        @include('layouts.navigation')

        <!-- Page Heading -->
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                {{ $header }}
                {{ $slot }}

            </div>
        </main>


        <footer
            class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/"
                    class="hover:underline">Flowbite™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </footer>


    </div>
    </div>

    <script>
        CKEDITOR.replace( 'description' ).require;
    </script>
</body>

</html>
