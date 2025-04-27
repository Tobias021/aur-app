<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Opravné daňové doklady' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <header class="bg-white shadow-md shadow-gray-200">
            <div class="flex py-5 justify-center ">
                <img alt="Logo Aurinet" class="h-20 w-20 md:my-3 " src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flookaside.fbsbx.com%2Flookaside%2Fcrawler%2Fmedia%2F%3Fmedia_id%3D100065026773584&f=1&nofb=1&ipt=de6acc0de5b8955829cc412e7171e9f11f1a8fdb3fb82c69364eb9a0883d8ba6&ipo=images"/>
                <div class="md:flex align-middle ">
                <a href="/" class="text-5xl w-full h-auto content-center mx-auto font-bold font-mono px-10">
                    <span class="text-red-600 font-extrabold">O</span>pravné <span class="text-red-600 font-extrabold">D</span>aňové <span class="text-red-600 font-extrabold">D</span>oklady
                </a>
                </div>
            </div>
            <nav class="flex  m-auto size-fit">
                <x-nav-button href="/odd" title="Opravné doklady"/>
                <x-nav-button href="/zakaznik" title="Zákazníci"/>
            </nav>
        </header>

        {{ $slot }}
    </body>
</html>
