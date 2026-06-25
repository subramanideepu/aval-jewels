<div>
    <!-- Dynamic Filters Navigation -->
    <div class="bg-brand-cream border-b border-brand-green/5 sticky top-20 z-40">
        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-wrap items-center justify-center gap-6 md:gap-12">
                <button wire:click="selectCollection('')" 
                        class="text-[0.65rem] uppercase tracking-widest font-bold pb-1 transition-all duration-300 {{ empty($slug) ? 'border-b-2 border-brand-gold text-brand-green' : 'text-brand-green/40 hover:text-brand-green' }}">
                    All Pieces
                </button>
                @foreach($collections as $col)
                    <button wire:click="selectCollection('{{ $col->slug }}')" 
                            class="text-[0.65rem] uppercase tracking-widest font-bold pb-1 transition-all duration-300 {{ $slug === $col->slug ? 'border-b-2 border-brand-gold text-brand-green' : 'text-brand-green/40 hover:text-brand-green' }}">
                        {{ $col->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Collection Description / Title -->
    @if($selectedCollection)
        <div class="bg-brand-cream pt-16 text-center">
            <div class="container mx-auto px-6 max-w-2xl">
                <h2 class="text-3xl font-heading text-brand-green mb-4">{{ $selectedCollection->name }}</h2>
                <p class="text-brand-green/60 text-xs font-body leading-relaxed max-w-md mx-auto">{{ $selectedCollection->description }}</p>
            </div>
        </div>
    @endif

    <!-- Catalog Product Grid -->
    <section class="py-24 bg-brand-cream">
        <div class="container mx-auto px-6">
            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
                    @foreach($products as $product)
                        <div class="group relative bg-white border border-brand-gold/10 p-6 transition-all duration-500 hover:shadow-2xl flex flex-col justify-between">
                            <a href="{{ url('/products/' . $product->slug) }}" class="block space-y-6">
                                <!-- Image Container -->
                                <div class="aspect-[4/5] overflow-hidden bg-brand-green relative border border-brand-gold/5">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-brand-dark/45 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center duration-500">
                                        <span class="bg-white text-brand-green px-8 py-3 text-[0.6rem] uppercase tracking-widest font-bold border border-brand-gold/20 shadow-lg">View Details</span>
                                    </div>
                                    <!-- Badge -->
                                    <div class="absolute top-4 left-4 bg-brand-dark/85 text-brand-gold text-[0.55rem] uppercase tracking-widest px-3 py-1.5 border border-brand-gold/25 font-bold">
                                        BIS Hallmarked
                                    </div>
                                </div>

                                <!-- Text content -->
                                <div class="space-y-2 text-center">
                                    <span class="text-[0.6rem] text-brand-gold uppercase tracking-[0.2em] block font-semibold">{{ $product->collection->name ?? 'AVAL COLLECTION' }}</span>
                                    <h3 class="font-heading text-xl text-brand-green group-hover:text-brand-gold transition-colors leading-tight">{{ $product->name }}</h3>
                                    
                                    <!-- Price Display -->
                                    <div class="pt-2">
                                        @if($product->sale_price)
                                            <span class="font-body font-bold text-base text-brand-green">₹{{ number_format($product->sale_price) }}</span>
                                            <span class="font-body text-xs text-brand-green/45 line-through ml-2">₹{{ number_format($product->price) }}</span>
                                        @else
                                            <span class="font-body font-bold text-base text-brand-green">₹{{ number_format($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 opacity-60 space-y-4">
                    <i class="fas fa-gem text-4xl text-brand-gold/40"></i>
                    <p class="font-body text-sm text-brand-cream/60 tracking-wider">No masterpieces found in this collection.</p>
                </div>
            @endif
        </div>
    </section>
</div>
