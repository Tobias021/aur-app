<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <h1 class="text-3xl font-bold underline bg-yellow-700 border-red-600 border-">
          Hello world!
        </h1>

        {{ $slot }}
    </body>
</html>
