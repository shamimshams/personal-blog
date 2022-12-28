<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Blog' }} - {{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    @yield('meta')
    @vite(['resources/css/main.css'])
    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('header')
</head>

<body class="bg-white text-black antialiased dark:bg-gray-900 dark:text-white">
    <div>
        <div class="mx-auto max-w-3xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
            <div class="flex h-screen flex-col justify-between">

                @include('layouts.header')

                <main class="mb-auto">
                    @yield('content')
                </main>

                @include('layouts.footer')
            </div>
        </div>
    </div>

    @stack('footer')
</body>

</html>
