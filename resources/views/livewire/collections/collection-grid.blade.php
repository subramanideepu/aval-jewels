<div>
    <!-- Dynamic Filters Navigation -->
    <div class="bg-brand-cream border-b border-brand-green/5 sticky top-20 z-40 backdrop-blur-md bg-brand-cream/95">
        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-wrap items-center justify-center gap-6 md:gap-12">
                <button wire:click="selectCollection('')" 
                        class="text-[0.65rem] uppercase tracking-[0.3em] font-body font-bold pb-2 transition-all duration-500 relative group {{ empty($slug) ? 'text-brand-gold' : 'text-brand-green/50 hover:text-brand-green' }}">
                    All Pieces
                    <span class="absolute bottom-0 left-0 h-[2px] bg-brand-gold transition-all duration-500 {{ empty($slug) ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </button>
                @foreach($collections as $col)
                    <button wire:click="selectCollection('{{ $col->slug }}')" 
                            class="text-[0.65rem] uppercase tracking-[0.3em] font-body font-bold pb-2 transition-all duration-500 relative group {{ $slug === $col->slug ? 'text-brand-gold' : 'text-brand-green/50 hover:text-brand-green' }}">
                        {{ $col->name }}
                        <span class="absolute bottom-0 left-0 h-[2px] bg-brand-gold transition-all duration-500 {{ $slug === $col->slug ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Collection Description / Title -->
    @if($selectedCollection)
        <div class="bg-brand-cream pt-16 text-center animate-fadeIn">
            <div class="container mx-auto px-6 max-w-2xl">
                <h2 class="text-3xl md:text-4xl font-heading text-brand-green mb-4">{{ $selectedCollection->name }}</h2>
                <p class="text-brand-green/60 text-xs font-body leading-relaxed max-w-md mx-auto">{{ $selectedCollection->description }}</p>
            </div>
        </div>
    @endif

    <!-- Catalog Product Grid -->
    <section class="py-20 bg-brand-cream">
        <div class="container mx-auto px-6">
            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
                    @foreach($products as $product)
                        <div class="luxury-card group p-6 flex flex-col justify-between border border-brand-gold/10 hover:border-brand-gold/30">
                            <a href="{{ url('/products/' . $product->slug) }}" class="block space-y-6">
                                <!-- Image Container -->
                                <div class="aspect-[4/5] overflow-hidden bg-brand-green relative border border-brand-gold/10">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-brand-dark/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center duration-500">
                                        <span class="bg-white text-brand-green px-6 py-3 text-[0.6rem] uppercase tracking-widest font-bold border border-brand-gold/20 shadow-xl tracking-[0.2em] transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">View Masterpiece</span>
                                    </div>
                                    <!-- Badge -->
                                    <div class="absolute top-4 left-4 bg-brand-dark/90 text-brand-gold text-[0.55rem] uppercase tracking-widest px-3 py-1.5 border border-brand-gold/20 font-bold">
                                        Designer
                                    </div>
                                </div>

                                <!-- Text content -->
                                <div class="space-y-2 text-center">
                                    <span class="text-[0.55rem] text-brand-gold uppercase tracking-[0.3em] block font-semibold">{{ $product->collection->name ?? 'AVAL COLLECTION' }}</span>
                                    <h3 class="font-heading text-xl text-brand-green group-hover:text-brand-gold transition-colors duration-300 leading-tight">{{ $product->name }}</h3>
                                    
                                    <!-- Price Display -->
                                    <div class="pt-2 font-body">
                                        @if($product->sale_price)
                                            <span class="font-bold text-base text-brand-green">₹{{ number_format($product->sale_price) }}</span>
                                            <span class="text-xs text-brand-green/45 line-through ml-2">₹{{ number_format($product->price) }}</span>
                                        @else
                                            <span class="font-bold text-base text-brand-green">₹{{ number_format($product->price) }}</span>
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
