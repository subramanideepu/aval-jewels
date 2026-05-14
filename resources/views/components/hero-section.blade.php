<section {{ $attributes->merge(['class' => 'relative h-screen flex items-center justify-center overflow-hidden']) }}>
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-brand-maroon/40 bg-gradient-to-t from-brand-maroon via-transparent to-brand-maroon/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_0%,rgba(91,0,19,0.4)_100%)]"></div>
    </div>
    
    <!-- Content -->
    <div class="container mx-auto px-6 relative z-10 text-center" 
         x-data="{ show: false }" 
         x-init="setTimeout(() => show = true, 300)">
        
        <span x-show="show" 
              x-transition:enter="transition ease-out duration-1000"
              x-transition:enter-start="opacity-0 translate-y-10"
              x-transition:enter-end="opacity-100 translate-y-0"
              class="text-brand-gold text-xs md:text-sm font-body uppercase tracking-[0.6em] mb-8 block">
            {{ $subtitle }}
        </span>
        
        <h1 x-show="show" 
            x-transition:enter="transition ease-out duration-1000 delay-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="text-5xl md:text-8xl text-white font-heading mb-12 leading-tight">
            {!! $title !!}
        </h1>
        
        <div x-show="show" 
             x-transition:enter="transition ease-out duration-1000 delay-500"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             class="flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0 md:space-x-10">
            <a href="{{ $ctaLink }}" class="btn-gold group relative overflow-hidden">
                <span class="relative z-10">{{ $ctaText }}</span>
                <div class="absolute inset-0 bg-white translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
            </a>
            <a href="/about" class="text-white hover:text-brand-gold transition-all duration-500 font-body text-[0.65rem] uppercase tracking-[0.4em] border-b border-white/20 pb-2 hover:border-brand-gold">
                The Legacy
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-4 animate-pulse">
        <div class="w-px h-20 bg-gradient-to-b from-brand-gold to-transparent"></div>
    </div>
</section>
