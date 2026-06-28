<x-app-layout title="AVAL JEWELS | Handcrafted Luxury Jewelry">

    <livewire:home.hero-section />
    
    <section class="py-24 bg-brand-green text-white text-center">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl md:text-5xl font-heading mb-8">Wear Your Confidence Everyday</h2>
            <p class="text-brand-cream/60 text-lg font-body leading-relaxed">
                At AVAL JEWELS, we bring you beautifully crafted jewelry for both everyday elegance and special occasions. Discover our collections designed to enhance your confidence and style.
            </p>
        </div>
    </section>

    <livewire:home.featured-collections />

    <!-- Best Sellers Section -->
    <section class="py-32 bg-brand-cream border-t border-brand-green/5 pb-48">
        <div class="container mx-auto px-6">
            <div class="text-center mb-28">
                <span class="text-brand-gold text-[0.65rem] uppercase tracking-[0.5em] mb-4 block font-bold">Timeless Classics</span>
                <h2 class="section-title text-brand-green">Our Best Sellers</h2>
            </div>

            @php
                $romans = ['I', 'II', 'III', 'IV', 'V', 'VI'];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-10">
                @foreach($bestSellers as $product)
                    <div class="luxury-card group p-6 flex flex-col justify-between border border-brand-gold/10 hover:border-brand-gold/30 transition-luxury duration-700 {{ $loop->iteration % 2 == 0 ? 'lg:translate-y-12' : '' }}">
                        <a href="{{ url('/products/' . $product->slug) }}" class="block space-y-6">
                            <!-- Image Container -->
                            <div class="aspect-[4/5] overflow-hidden bg-brand-green relative border border-brand-gold/10">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                
                                <!-- Premium Inner Frame -->
                                <div class="absolute inset-4 border border-brand-gold/10 group-hover:inset-3 group-hover:border-brand-gold/30 transition-all duration-700 pointer-events-none"></div>
                                
                                <div class="absolute inset-0 bg-brand-dark/35 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center duration-500">
                                    <span class="border border-brand-gold text-brand-gold bg-brand-green px-5 py-2.5 text-[0.6rem] uppercase tracking-[0.2em] font-bold shadow-2xl transition-all duration-500 transform translate-y-4 group-hover:translate-y-0 hover:bg-brand-gold hover:text-brand-green">
                                        View Masterpiece
                                    </span>
                                </div>
                                <div class="absolute top-4 left-4 bg-brand-dark/95 text-brand-gold text-[0.55rem] uppercase tracking-[0.2em] px-3 py-1.5 border border-brand-gold/20 font-bold">
                                    Best Seller
                                </div>
                                <!-- Wishlist Toggle -->
                                <div class="absolute top-4 right-4 z-20">
                                    <livewire:wishlist.wishlist-toggle :product-id="$product->id" :variant="'icon'" :wire:key="'wishlist-home-'.$product->id" />
                                </div>
                            </div>

                            <!-- Text content -->
                            <div class="space-y-2 text-center">
                                <span class="text-brand-gold/20 font-heading text-3xl tracking-widest block mb-1">{{ $romans[$loop->index] ?? '' }}</span>
                                <span class="text-[0.55rem] text-brand-gold uppercase tracking-[0.3em] block font-semibold">{{ $product->collection->name ?? 'AVAL COLLECTION' }}</span>
                                
                                <div class="w-8 h-[1px] bg-brand-gold/20 mx-auto my-2"></div>
                                
                                <h3 class="font-heading text-lg text-brand-green group-hover:text-brand-gold transition-colors duration-300 leading-tight">{{ $product->name }}</h3>
                                
                                <!-- Price Display -->
                                <div class="pt-2 font-body">
                                    @if($product->sale_price)
                                        <span class="font-bold text-sm text-brand-green">₹{{ number_format($product->sale_price) }}</span>
                                        <span class="text-xs text-brand-green/45 line-through ml-2">₹{{ number_format($product->price) }}</span>
                                    @else
                                        <span class="font-bold text-sm text-brand-green">₹{{ number_format($product->price) }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Craftsmanship Trust Section -->
    <section class="py-36 bg-brand-cream border-t border-brand-green/5">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-24 items-center">
                
                <!-- Left Side: Overlapping Imagery -->
                <div class="lg:col-span-6 relative">
                    <div class="relative group">
                        <!-- Background Double Frame -->
                        <div class="absolute -inset-4 border border-brand-gold/15 scale-100 group-hover:scale-98 transition-transform duration-1000"></div>
                        
                        <!-- Main image -->
                        <div class="aspect-[4/5] md:aspect-[3/4] overflow-hidden bg-brand-green luxury-outline-frame">
                            <img src="{{ asset('images/craftsmanship.png') }}" alt="Master Craftsmanship" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000">
                        </div>

                        <!-- Overlapping text badge -->
                        <div class="relative lg:absolute mt-6 lg:mt-0 lg:-bottom-8 lg:-right-8 -right-0 bg-brand-green text-white p-8 max-w-full lg:max-w-xs border border-brand-gold/25 shadow-2xl z-10 transition-transform duration-500 group-hover:translate-y-[-4px]">
                            <span class="text-brand-gold text-[0.55rem] uppercase tracking-[0.4em] mb-2 block font-bold">EST. 2022</span>
                            <h4 class="font-heading text-2xl mb-4">Handcrafted Heritage</h4>
                            <p class="text-brand-cream/60 text-xs font-body leading-relaxed">
                                Every collection tells a unique story of Indian craftsmanship, curated with precision, passion, and love.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Value Stack -->
                <div class="lg:col-span-6 space-y-12">
                    <div class="space-y-4">
                        <span class="text-brand-gold text-[0.65rem] uppercase tracking-[0.5em] block font-bold">Artisan Standards</span>
                        <h2 class="text-4xl md:text-5xl font-heading text-brand-green leading-tight">
                            Our Promise of <span class="text-editorial-gold">Perfection</span>
                        </h2>
                    </div>

                    <div class="space-y-8 divide-y divide-brand-gold/10">
                        <!-- Value 1 -->
                        <div class="flex items-start space-x-6 pt-0">
                            <div class="w-16 h-16 border border-brand-gold/20 flex items-center justify-center text-brand-gold flex-shrink-0 bg-white">
                                <svg class="h-8 w-8 text-brand-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                  <polygon points="6 3 18 3 22 9 12 22 2 9 6 3" />
                                  <line x1="11" y1="3" x2="8" y2="9" />
                                  <line x1="13" y1="3" x2="16" y2="9" />
                                  <line x1="2" y1="9" x2="22" y2="9" />
                                  <line x1="12" y1="22" x2="8" y2="9" />
                                  <line x1="12" y1="22" x2="16" y2="9" />
                                </svg>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-heading text-xl text-brand-green">Everyday Elegance</h3>
                                <p class="text-brand-green/70 text-xs font-body leading-relaxed">
                                    From simple, lightweight designs perfect for daily wear to stunning pieces made for weddings and celebrations.
                                </p>
                            </div>
                        </div>

                        <!-- Value 2 -->
                        <div class="flex items-start space-x-6 pt-8">
                            <div class="w-16 h-16 border border-brand-gold/20 flex items-center justify-center text-brand-gold flex-shrink-0 bg-white">
                                <svg class="h-8 w-8 text-brand-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                  <circle cx="12" cy="8" r="7" />
                                  <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                                </svg>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-heading text-xl text-brand-green">AAA-Grade Quality</h3>
                                <p class="text-brand-green/70 text-xs font-body leading-relaxed">
                                    Beautifully crafted with a premium finish, anti-tarnish coating, and high-quality materials.
                                </p>
                            </div>
                        </div>

                        <!-- Value 3 -->
                        <div class="flex items-start space-x-6 pt-8">
                            <div class="w-16 h-16 border border-brand-gold/20 flex items-center justify-center text-brand-gold flex-shrink-0 bg-white">
                                <svg class="h-8 w-8 text-brand-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" />
                                  <path d="M12 6V12L16 14" />
                                  <path d="M12 2V6" />
                                  <path d="M12 18V22" />
                                  <path d="M6 12H2" />
                                  <path d="M22 12H18" />
                                </svg>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-heading text-xl text-brand-green">Bespoke Designing</h3>
                                <p class="text-brand-green/70 text-xs font-body leading-relaxed">
                                    Work directly with our designer boutique to customize pieces custom to your personality and style.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-32 bg-brand-dark text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>
        <div class="container mx-auto px-6 relative z-10">
            <h3 class="text-brand-gold font-body text-xs uppercase tracking-[0.5em] mb-10 font-bold">Featured Video</h3>
            <div class="aspect-video max-w-5xl mx-auto bg-brand-green shadow-2xl relative group cursor-pointer overflow-hidden">
                <img src="{{ asset('images/hero.png') }}" alt="Video Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-1000 opacity-60">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-24 h-24 border border-brand-gold rounded-full flex items-center justify-center group-hover:bg-brand-gold group-hover:scale-110 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-brand-gold group-hover:text-brand-green ml-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <livewire:home.testimonials />

    <section class="py-32 bg-brand-cream">
        <div class="container mx-auto px-6 text-center">
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] mb-4 block font-bold">Follow Our Journey</span>
            <h2 class="text-4xl md:text-5xl font-heading text-brand-green mb-16 hover:text-brand-gold transition-colors">
                <a href="https://www.instagram.com/houseofaval/" target="_blank">@houseofaval</a>
            </h2>
            <x-instagram-gallery :items="[
                ['image' => asset('images/earrings.png')],
                ['image' => asset('images/necklace.png')],
                ['image' => asset('images/bangles.png')],
                ['image' => asset('images/earrings.png')],
                ['image' => asset('images/necklace.png')],
                ['image' => asset('images/bangles.png')],
            ]" />
        </div>
    </section>

    <section class="py-32 bg-brand-green text-white text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-4xl md:text-6xl font-heading mb-10">Experience True Luxury</h2>
            <p class="text-brand-gold text-sm font-body uppercase tracking-[0.3em] mb-12">Visit our boutique for a personalized consultation.</p>
            <a href="{{ url('/contact') }}" class="btn-gold">Book Private Viewing</a>
        </div>
    </section>
</x-app-layout>
