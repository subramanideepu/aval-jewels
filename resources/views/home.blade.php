<x-app-layout title="AVAL JEWELS | Handcrafted Luxury Jewelry">

    <livewire:home.hero-section />
    
    <section class="py-24 bg-brand-green text-white text-center">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl md:text-5xl font-heading mb-8">Wear Your Confidence</h2>
            <p class="text-brand-cream/60 text-lg font-body leading-relaxed">
                At AVAL JEWELS, we don't just sell jewelry; we curate moments of brilliance that last a lifetime. Explore our heritage of three decades.
            </p>
        </div>
    </section>

    <livewire:home.featured-collections />

    <!-- Best Sellers Section -->
    <section class="py-32 bg-brand-cream border-t border-brand-green/5">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] mb-4 block font-bold">Timeless Classics</span>
                <h2 class="text-4xl md:text-5xl font-heading text-brand-green">Our Best Sellers</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($bestSellers as $product)
                    <div class="group relative bg-white border border-brand-gold/10 p-6 transition-all duration-500 hover:shadow-2xl flex flex-col justify-between">
                        <a href="{{ url('/products/' . $product->slug) }}" class="block space-y-6">
                            <!-- Image Container -->
                            <div class="aspect-[4/5] overflow-hidden bg-brand-green relative border border-brand-gold/5">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                <div class="absolute inset-0 bg-brand-dark/45 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center duration-500">
                                    <span class="bg-white text-brand-green px-8 py-3 text-[0.6rem] uppercase tracking-widest font-bold border border-brand-gold/20 shadow-lg">View Details</span>
                                </div>
                                <div class="absolute top-4 left-4 bg-brand-dark/85 text-brand-gold text-[0.55rem] uppercase tracking-widest px-3 py-1.5 border border-brand-gold/25 font-bold">
                                    Best Seller
                                </div>
                            </div>

                            <!-- Text content -->
                            <div class="space-y-2 text-center">
                                <span class="text-[0.6rem] text-brand-gold uppercase tracking-[0.2em] block font-semibold">{{ $product->collection->name ?? 'AVAL COLLECTION' }}</span>
                                <h3 class="font-heading text-lg text-brand-green group-hover:text-brand-gold transition-colors leading-tight">{{ $product->name }}</h3>
                                
                                <!-- Price Display -->
                                <div class="pt-2">
                                    @if($product->sale_price)
                                        <span class="font-body font-bold text-sm text-brand-green">₹{{ number_format($product->sale_price) }}</span>
                                        <span class="font-body text-xs text-brand-green/45 line-through ml-2">₹{{ number_format($product->price) }}</span>
                                    @else
                                        <span class="font-body font-bold text-sm text-brand-green">₹{{ number_format($product->price) }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
            <h2 class="text-4xl md:text-5xl font-heading text-brand-green mb-16">@AVALJEWELS</h2>
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
            <a href="{{ url('/contact') }}" class="btn-gold">Book Appointment</a>
        </div>
    </section>
</x-app-layout>
