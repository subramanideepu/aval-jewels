<div class="bg-brand-cream min-h-screen pt-32 pb-24">
    <div class="container mx-auto px-6">
        <!-- Page Header Banner -->
        <div class="text-center mb-16 relative">
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold mb-4 block">Our Catalog</span>
            <h1 class="text-5xl md:text-7xl font-heading text-brand-green leading-tight mb-6">The Boutique Shop</h1>
            <p class="text-brand-green/60 text-xs font-body max-w-md mx-auto leading-relaxed">
                Discover our collection of beautifully crafted jewelry made for both everyday elegance and special occasions.
            </p>
        </div>

        <!-- Catalog Sidebar & Grid Split Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
            
            <!-- Sidebar Controls (Search & Filters) -->
            <div class="bg-white p-8 border border-brand-gold/15 space-y-10 rounded-sm shadow-xl shadow-brand-green/5 sticky top-32">
                <!-- Search Box -->
                <div class="space-y-3">
                    <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Search Shop</label>
                    <div class="relative">
                        <input type="text" 
                               wire:model.live.debounce.400ms="search" 
                               placeholder="e.g. Necklace, Ruby" 
                               class="w-full bg-transparent border border-brand-green/10 px-4 py-2.5 text-xs text-brand-green font-body focus:outline-none focus:border-brand-gold rounded-sm placeholder:text-brand-green/30">
                        <div class="absolute right-3 top-3 text-brand-green/30 pointer-events-none text-xs">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>

                <!-- Collection Filters -->
                <div class="space-y-4">
                    <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block border-b border-brand-green/5 pb-2">Collections</label>
                    <div class="space-y-2">
                        <button wire:click="selectCollection('')" 
                                class="w-full text-left text-xs font-body transition-colors py-1 flex items-center justify-between {{ empty($selectedCollection) ? 'text-brand-gold font-bold' : 'text-brand-green/70 hover:text-brand-green' }}">
                            <span>All Pieces</span>
                            @if(empty($selectedCollection)) <i class="fas fa-check text-[0.6rem]"></i> @endif
                        </button>
                        @foreach($collections as $col)
                            <button wire:click="selectCollection('{{ $col->slug }}')" 
                                    class="w-full text-left text-xs font-body transition-colors py-1 flex items-center justify-between {{ $selectedCollection === $col->slug ? 'text-brand-gold font-bold' : 'text-brand-green/70 hover:text-brand-green' }}">
                                <span>{{ $col->name }}</span>
                                @if($selectedCollection === $col->slug) <i class="fas fa-check text-[0.6rem]"></i> @endif
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Sorting Box -->
                <div class="space-y-3">
                    <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block border-b border-brand-green/5 pb-2">Sort Masterpieces</label>
                    <div class="relative">
                        <select wire:model.live="sort" class="w-full bg-transparent border border-brand-green/10 px-3 py-2 text-xs text-brand-green font-body focus:outline-none focus:border-brand-gold appearance-none pr-8 rounded-sm">
                            <option value="default">New Arrivals</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                            <option value="best_sellers">Best Sellers</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-brand-gold text-[0.6rem]">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Reset Filter Action -->
                @if($search || $selectedCollection || $sort !== 'default')
                    <button wire:click="resetFilters" class="w-full text-center text-red-500 hover:text-red-700 text-[0.6rem] uppercase tracking-widest font-bold pt-2 border-t border-brand-green/5 block transition-colors">
                        Clear All Filters
                    </button>
                @endif
            </div>

            <!-- Product Grid -->
            <div class="lg:col-span-3">
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach($products as $product)
                            <div class="luxury-card group p-5 flex flex-col justify-between border border-brand-gold/10 hover:border-brand-gold/30 rounded-sm">
                                <a href="{{ url('/products/' . $product->slug) }}" class="block space-y-5">
                                    <!-- Image Container -->
                                    <div class="aspect-[4/5] overflow-hidden bg-brand-green relative border border-brand-gold/10">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-brand-dark/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center duration-500">
                                            <span class="bg-white text-brand-green px-5 py-3 text-[0.55rem] uppercase tracking-[0.2em] font-bold border border-brand-gold/20 shadow-xl transform translate-y-3 group-hover:translate-y-0 transition-transform duration-500">View Masterpiece</span>
                                        </div>
                                        <div class="absolute top-3 left-3 bg-brand-dark/95 text-brand-gold text-[0.5rem] uppercase tracking-widest px-2.5 py-1.5 border border-brand-gold/20 font-bold">
                                            Designer
                                        </div>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="space-y-2 text-center">
                                        <span class="text-[0.5rem] text-brand-gold uppercase tracking-[0.2em] block font-semibold">{{ $product->collection->name ?? 'AVAL COLLECTION' }}</span>
                                        <h3 class="font-heading text-lg text-brand-green group-hover:text-brand-gold transition-colors duration-300 leading-tight">{{ $product->name }}</h3>
                                        
                                        <!-- Price -->
                                        <div class="pt-1 font-body">
                                            @if($product->sale_price)
                                                <span class="font-bold text-sm text-brand-green">₹{{ number_format($product->sale_price) }}</span>
                                                <span class="text-xs text-brand-green/40 line-through ml-2">₹{{ number_format($product->price) }}</span>
                                            @else
                                                <span class="font-bold text-sm text-brand-green">₹{{ number_format($product->price) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white border border-brand-gold/10 text-center py-24 rounded-sm shadow-xl shadow-brand-green/5 space-y-6">
                        <div class="w-16 h-16 bg-brand-gold/10 text-brand-gold rounded-full flex items-center justify-center mx-auto text-2xl">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-heading text-2xl text-brand-green">No Masterpieces Found</h3>
                            <p class="text-brand-green/50 text-xs font-body max-w-xs mx-auto leading-relaxed">
                                We couldn't find any jewelry pieces matching your search or filters. Try adjusting them.
                            </p>
                        </div>
                        <button wire:click="resetFilters" class="btn-gold !px-8 !py-3">
                            Reset All Filters
                        </button>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
