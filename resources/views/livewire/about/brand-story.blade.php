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
                    <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold">The Heritage</span>
                    <h2 class="text-5xl md:text-6xl font-heading text-brand-green leading-tight">Three Decades of<br>Pure Brilliance</h2>
                </div>
                
                <p class="text-brand-green/70 text-lg font-body leading-relaxed font-light">
                    Founded in 1990, <span class="font-bold text-brand-green">AVAL JEWELS</span> began with a single vision: to create jewelry that doesn't just adorn, but empowers. Our journey from a boutique workshop to Chennai's premier luxury jeweler is paved with trust, artistry, and an unwavering commitment to quality.
                </p>

                <p class="text-brand-green/70 text-lg font-body leading-relaxed font-light">
                    Every piece in our collection is a labor of love, handcrafted by master artisans who have preserved traditional Indian techniques while embracing modern minimal aesthetics. We believe that true luxury lies in the details—the precision of a setting, the fire of a diamond, and the story of the wearer.
                </p>

                <div class="grid grid-cols-2 gap-10 pt-6">
                    <div>
                        <span class="block text-4xl font-heading text-brand-gold mb-2">100%</span>
                        <span class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold">Hallmarked Gold</span>
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
