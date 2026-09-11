<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8" />
    @head
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground min-h-full font-sans antialiased">
    <main class="flex min-h-dvh items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-md text-center">
            <p class="text-muted-foreground text-sm font-medium">
                @yield('title')
            </p>
            <h1 class="text-6xl font-semibold tracking-[-0.05em] sm:text-7xl">
                @yield('code')
            </h1>
            <p class="text-muted-foreground mt-4 text-base leading-7">
                @yield('message')
            </p>
            <a
                href="{{ url('/') }}"
                class="bg-foreground text-background focus-visible:ring-ring focus-visible:ring-offset-background mt-6 inline-flex h-10 items-center justify-center rounded-md px-4 text-sm font-medium transition-opacity hover:opacity-80 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-none"
            >
                @lang('Go to homepage')
            </a>
        </div>
    </main>
</body>
</html>
