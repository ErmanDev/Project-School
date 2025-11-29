<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'San Isidro College') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/jpeg/sic_logo.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    
        @if(env('GOOGLE_ANALYTICS_ID'))
      
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
        </script>
        @endif
    </head>
    <body class="font-sans antialiased theme-app">
        @if(request()->routeIs('home') || request()->routeIs('about') || request()->routeIs('academic-programs.*') || request()->routeIs('admissions.*') || request()->routeIs('news-and-events.*') || request()->routeIs('student-services.*') || request()->routeIs('directory.*') || request()->routeIs('faculty-staff.*') || request()->routeIs('alumni.*') || request()->routeIs('contact.*') || request()->routeIs('downloads.*'))
            @yield('slot')
        @else
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
                <div>
                    <a href="/">
                        <img src="{{ asset('images/jpeg/sic_logo.jpg') }}" class="w-24 h-24" alt="Logo" />
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        @endif
    </body>
</html>
