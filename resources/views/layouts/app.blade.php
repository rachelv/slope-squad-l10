<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Slope Squad' }}</title>

        <script src="https://kit.fontawesome.com/abf7f32d1b.js" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-open-sans text-black-900 {{ $bgColor ?? 'bg-black-50' }}">
        {{ $slot }}
    </body>
</html>

