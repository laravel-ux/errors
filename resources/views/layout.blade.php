<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('code') — @yield('title')</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-background font-sans text-foreground antialiased">
    <main class="flex min-h-dvh items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-md text-center">
            <h1 class="text-6xl font-semibold tracking-[-0.05em] sm:text-7xl">
                @yield('code')
            </h1>
            <p class="mt-4 text-base leading-7 text-muted-foreground">
                @yield('message')
            </p>
            <a
                href="{{ url('/') }}"
                class="mt-6 inline-flex h-10 items-center justify-center rounded-md bg-foreground px-4 text-sm font-medium text-background transition-opacity hover:opacity-80 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:ring-offset-background"
            >
                @lang('Go to homepage')
            </a>
        </div>
    </main>
</body>
</html>
