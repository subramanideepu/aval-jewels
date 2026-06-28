<section class="py-32 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
            <div class="relative group" x-data="{ loaded: false }" x-intersect="loaded = true">
                <div class="absolute -inset-4 border border-brand-gold/20 scale-105 group-hover:scale-100 transition-transform duration-1000"></div>
                <img src="{{ asset('images/craftsmanship.png') }}" alt="Our Craftsmanship" class="relative z-10 w-full shadow-2xl grayscale hover:grayscale-0 transition-all duration-1000">
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-brand-gold/10 -z-0"></div>
            </div>

            <div class="space-y-10">
                <div class="space-y-4">
                    <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold">Our Story</span>
                    <h2 class="text-5xl md:text-6xl font-heading text-brand-green leading-tight">Elegance in<br>Every Moment</h2>
                </div>
                
                <p class="text-brand-green/70 text-lg font-body leading-relaxed font-light">
                    Founded in 2022 by <span class="font-bold text-brand-green">Pushpa Menon</span>, <span class="font-bold text-brand-green">AVAL JEWELS</span> began with a single vision: to create beautifully crafted jewelry that brings you everyday elegance. At Aval Jewels, we invite you to wear your confidence every day.
                </p>

                <p class="text-brand-green/70 text-lg font-body leading-relaxed font-light">
                    From simple, lightweight designs perfect for daily wear to stunning pieces made for weddings and celebrations, every creation is designed to enhance your confidence and style. With a perfect blend of tradition and modern charm, Aval Jewels helps you shine in every moment.
                </p>

                <div class="grid grid-cols-2 gap-10 pt-6">
                    <div>
                        <span class="block text-4xl font-heading text-brand-gold mb-2">Premium</span>
                        <span class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold">AAA-Grade Quality</span>
                    </div>
                    <div>
                        <span class="block text-4xl font-heading text-brand-gold mb-2">Bespoke</span>
                        <span class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold">Custom Designs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
