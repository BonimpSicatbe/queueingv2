@php
    $date = now()->format('F d, Y');
    $time = now()->format('h:i:s A');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/a10f8182c0.js" crossorigin="anonymous"></script>
        @livewireStyles
    </head>

    <body>
        <div class="flex flex-col gap-4 h-screen w-full p-2 sm:p-6 bg-blue-100">
            <div class="flex flex-col gap-8 sm:gap-16 h-full w-full max-w-full sm:max-w-[80%] mx-auto">
                {{-- header --}}
                <div class="flex flex-col sm:flex-row gap-4 w-full items-center justify-center">
                    <img class="w-24 h-24 sm:w-auto sm:h-[100px]" src="{{ asset('images/dole-logo.png') }}" alt="" srcset="">

                    <div class="flex flex-col gap-2 uppercase font-bold text-lg sm:text-xl text-center">
                        <div>Department of Labor and Employment</div>
                        <div class="font-normal">Cavite Provincial Office</div>
                        <div class="text-base sm:text-lg uppercase">{{ $date }} - <span id="current-time">{{ $time }}</span></div>
                    </div>

                    <div class="w-24 h-24 sm:w-[100px] sm:h-[100px] hidden sm:block"></div>
                </div>

                {{-- body --}}
                <div class="h-full overflow-auto">{{ $slot }}</div>

                {{-- footer --}}
                <x-layouts.footer></x-layouts.footer>
            </div>
        </div>

        <script>
            function updateTime() {
                const now = new Date();
                const options = {
                    timeZone: 'Asia/Manila',
                    hour12: true,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const timeString = now.toLocaleTimeString('en-US', options);
                document.getElementById('current-time').textContent = timeString;
            }
            setInterval(updateTime, 1000);
            updateTime();
        </script>
        @livewireScripts
    </body>

</html>
