<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground">
    <div class="flex min-h-[100dvh] flex-col items-center justify-center bg-background px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-md text-center">
            <h1 class="mt-4 text-6xl font-bold tracking-tight text-foreground sm:text-7xl">
                @yield('code')
            </h1>
            <p class="mt-4 text-lg text-muted-foreground" >
                @yield('message')
            </p>
            <div class="mt-6">
                <x-ux::button href="{{ config('app.url') }}">
                    @lang('Go to Homepage')
                </x-ux::button>
            </div>
        </div>
    </div>
</body>
</html>
