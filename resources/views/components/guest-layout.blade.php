<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AVAL JEWELS') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/branding/aval-jewels-favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/branding/aval-jewels-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            maroon: '#5B0013',
                            gold: '#D4AF37',
                            cream: '#FFFDF7',
                            dark: '#2C0009',
                        }
                    },
                    fontFamily: {
                        heading: ['Playfair Display', 'serif'],
                        body: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        .font-heading { font-family: 'Playfair Display', serif; }
        .font-body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-brand-maroon font-body antialiased selection:bg-brand-gold selection:text-brand-maroon">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="mb-8">
            <x-brand-logo size="xl" />
        </div>

        <div class="w-full sm:max-w-md px-10 py-12 bg-white/5 backdrop-blur-xl border border-brand-gold/20 shadow-2xl overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>