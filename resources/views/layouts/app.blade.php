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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
    @livewireStyles

    <style>
        :root {
            --brand-maroon: #5B0013;
            --brand-gold: #D4AF37;
            --brand-cream: #FFFDF7;
            --brand-dark: #2C0009;
        }

        .font-heading { font-family: 'Playfair Display', serif; }
        .font-body { font-family: 'Outfit', sans-serif; }

        .btn-gold {
            @apply inline-flex bg-brand-gold text-brand-maroon px-12 py-4 text-[0.7rem] uppercase tracking-[0.4em] font-bold transition-all duration-500 shadow-xl shadow-brand-gold/10 hover:shadow-brand-gold/20 hover:scale-105;
        }

        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-brand-cream text-brand-maroon font-body antialiased selection:bg-brand-gold selection:text-brand-maroon">
    
    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    <x-whatsapp-button />

    @livewireScripts
</body>
</html>
