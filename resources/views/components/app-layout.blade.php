<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'AVAL JEWELS | Handcrafted Luxury Jewelry' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Discover AVAL JEWELS - Chennai\'s premier boutique for handcrafted gold, diamond, and bridal jewelry. Tradition. Elegance. You.' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'AVAL JEWELS | Handcrafted Luxury Jewelry' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Discover AVAL JEWELS - Chennai\'s premier boutique for handcrafted gold, diamond, and bridal jewelry.' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('assets/images/branding/aval-jewels-logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'AVAL JEWELS | Handcrafted Luxury Jewelry' }}">
    <meta property="twitter:description" content="{{ $metaDescription ?? 'Discover AVAL JEWELS - Chennai\'s premier boutique for handcrafted gold, diamond, and bridal jewelry.' }}">
    <meta property="twitter:image" content="{{ $ogImage ?? asset('assets/images/branding/aval-jewels-logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/branding/aval-jewels-favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/branding/aval-jewels-favicon.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/images/branding/aval-jewels-favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/branding/aval-jewels-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        [x-cloak] { display: none !important; }
        
        /* Premium custom scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #FAF8F5;
        }
        ::-webkit-scrollbar-thumb {
            background: #C5A059;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #242E1C;
        }
    </style>
</head>
<body class="bg-brand-cream text-brand-maroon font-body antialiased selection:bg-brand-gold selection:text-brand-maroon">
    
    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    <x-whatsapp-button />

    <livewire:cart.cart-drawer />

    @livewireScripts
</body>
</html>