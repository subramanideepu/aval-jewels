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
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/branding/aval-jewels-favicon.svg') }}">
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
        
        /* Premium Preloader Animations */
        @keyframes drawOutline {
            0% {
                stroke-dashoffset: 280;
            }
            50% {
                stroke-dashoffset: 0;
            }
            100% {
                stroke-dashoffset: -280;
            }
        }
        .diamond-outline {
            stroke-dasharray: 280;
            stroke-dashoffset: 280;
            animation: drawOutline 2.2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        @keyframes pulseSlow {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.9; }
        }
        .animate-pulse-slow {
            animation: pulseSlow 3s ease-in-out infinite;
        }

        @keyframes glowPulse {
            0%, 100% { transform: scale(0.7); opacity: 0.2; }
            50% { transform: scale(1.2); opacity: 0.6; }
        }
        .animate-glow {
            animation: glowPulse 3s ease-in-out infinite;
        }

        @keyframes fadeTracking {
            0% {
                letter-spacing: 0.2em;
                opacity: 0;
            }
            100% {
                letter-spacing: 0.4em;
                opacity: 1;
            }
        }
        .animate-fade-tracking {
            animation: fadeTracking 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        @keyframes scaleLine {
            0% { transform: scaleX(0); opacity: 0; }
            100% { transform: scaleX(1); opacity: 1; }
        }
        .animate-scale-line {
            animation: scaleLine 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.5s forwards;
        }
    </style>
</head>
<body class="bg-brand-cream text-brand-maroon font-body antialiased selection:bg-brand-gold selection:text-brand-maroon">
    
    <!-- Premium Preloader -->
    <div id="preloader" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-[#242E1C] transition-all duration-700 ease-out">
        <div class="relative flex flex-col items-center">
            <!-- SVG Diamond -->
            <div class="relative mb-6 animate-pulse-slow">
                <svg class="w-24 h-24" viewBox="0 0 100 100">
                    <defs>
                        <linearGradient id="preloader-gold" x1="0%" y1="100%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#9A7B3E" />
                            <stop offset="50%" stop-color="#F3E5C8" />
                            <stop offset="100%" stop-color="#C5A059" />
                        </linearGradient>
                    </defs>
                    <!-- Animated Outer Diamond Outline -->
                    <path class="diamond-outline" d="M 50,10 L 80,35 L 50,90 L 20,35 Z" fill="none" stroke="url(#preloader-gold)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    <!-- Inner Facet Lines -->
                    <path class="diamond-facets" d="M 50,10 L 50,90 M 20,35 L 80,35 M 35,35 L 50,10 L 65,35 L 50,90 L 35,35 Z" fill="none" stroke="url(#preloader-gold)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" opacity="0.3" />
                </svg>
                <!-- Glowing background effect -->
                <div class="absolute inset-0 -z-10 bg-[#C5A059]/10 blur-xl rounded-full scale-75 animate-glow"></div>
            </div>
            
            <!-- Brand Name with tracking expansion -->
            <div class="text-center">
                <h1 class="font-heading text-white text-xl tracking-[0.4em] uppercase font-light mb-2 animate-fade-tracking">
                    AVAL JEWELS
                </h1>
                <div class="w-12 h-[1px] bg-[#C5A059]/40 mx-auto scale-x-0 animate-scale-line"></div>
                <p class="text-[#C5A059]/60 text-[0.55rem] uppercase tracking-[0.3em] mt-2 font-body font-medium">
                    Handcrafted Luxury
                </p>
            </div>
        </div>
    </div>
    
    <script>
        (function() {
            const startTime = Date.now();
            window.addEventListener('load', function() {
                const elapsed = Date.now() - startTime;
                const delay = Math.max(1000 - elapsed, 0); // Minimum 1s display to appreciate the luxury animation
                setTimeout(() => {
                    const preloader = document.getElementById('preloader');
                    if (preloader) {
                        preloader.classList.add('opacity-0', 'pointer-events-none');
                        setTimeout(() => {
                            preloader.remove();
                        }, 700);
                    }
                }, delay);
            });
            
            // Safety timeout in case load event is delayed
            setTimeout(() => {
                const preloader = document.getElementById('preloader');
                if (preloader) {
                    preloader.classList.add('opacity-0', 'pointer-events-none');
                    setTimeout(() => {
                        preloader.remove();
                    }, 700);
                }
            }, 4000);
        })();
    </script>
    
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
