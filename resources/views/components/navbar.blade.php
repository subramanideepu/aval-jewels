<nav id="main-nav" 
     x-data="{ open: false, scrolled: false }" 
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
     :class="scrolled ? 'bg-brand-maroon/95 backdrop-blur-md py-3 shadow-2xl shadow-brand-dark/30' : 'bg-transparent py-6'"
     class="fixed top-0 left-0 w-full z-50 transition-all duration-500 ease-in-out">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <!-- Logo -->
        <x-brand-logo size="sm" />

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-12">
            @foreach([
                ['name' => 'Home', 'link' => '/'],
                ['name' => 'Collections', 'link' => '/collections'],
                ['name' => 'Our Story', 'link' => '/about'],
                ['name' => 'Contact', 'link' => '/contact']
            ] as $item)
                <a href="{{ $item['link'] }}" 
                   class="relative text-[0.7rem] font-body text-white uppercase tracking-widest transition-colors hover:text-brand-gold group {{ Request::is(trim($item['link'], '/') ?: '/') ? 'text-brand-gold' : '' }}">
                    {{ $item['name'] }}
                    <span class="absolute -bottom-1 left-0 w-0 h-px bg-brand-gold transition-all duration-300 group-hover:w-full {{ Request::is(trim($item['link'], '/') ?: '/') ? 'w-full' : '' }}"></span>
                </a>
            @endforeach
        </div>

        <!-- Icons/CTA -->
        <div class="flex items-center space-x-8">
            <a href="/contact" class="hidden md:inline-flex bg-transparent border border-brand-gold text-brand-gold px-8 py-2.5 text-[0.6rem] uppercase tracking-widest font-bold hover:bg-brand-gold hover:text-brand-maroon transition-all duration-500 shadow-lg shadow-brand-gold/10">
                Book Appointment
            </a>

            <!-- Mobile Toggle -->
            <button @click="open = true" class="lg:hidden text-white hover:text-brand-gold transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <template x-teleport="body">
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-brand-maroon z-[100] flex flex-col items-center justify-center p-6"
             style="display: none;">
            
            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>

            <button @click="open = false" class="absolute top-10 right-10 text-brand-gold hover:rotate-90 transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="flex flex-col items-center space-y-8 relative z-10">
                <!-- Mobile Logo -->
                <x-brand-logo size="lg" :link="false" class="mb-6" />

                <a href="/" @click="open = false" class="text-2xl font-heading text-white hover:text-brand-gold transition-colors tracking-widest">HOME</a>
                <a href="/collections" @click="open = false" class="text-2xl font-heading text-white hover:text-brand-gold transition-colors tracking-widest">COLLECTIONS</a>
                <a href="/about" @click="open = false" class="text-2xl font-heading text-white hover:text-brand-gold transition-colors tracking-widest">OUR STORY</a>
                <a href="/contact" @click="open = false" class="text-2xl font-heading text-white hover:text-brand-gold transition-colors tracking-widest">CONTACT</a>
                
                <div class="pt-8">
                    <a href="/contact" @click="open = false" class="bg-brand-gold text-brand-maroon px-12 py-4 text-xs font-bold uppercase tracking-[0.3em] hover:bg-white transition-colors">
                        Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </template>
</nav>
