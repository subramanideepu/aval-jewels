<div class="bg-brand-cream min-h-screen pt-32 pb-24">
    <div class="container mx-auto px-6 max-w-6xl">
        <!-- Page Header -->
        <div class="text-center mb-16 relative">
            <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold mb-4 block">Your Curated Collection</span>
            <h1 class="text-5xl md:text-7xl font-heading text-brand-green leading-tight mb-6">Saved Masterpieces</h1>
            <p class="text-brand-green/60 text-xs font-body max-w-md mx-auto leading-relaxed">
                Review and manage your favorite handcrafted designs from the House of Aval.
            </p>
        </div>

        @if (session()->has('message'))
            <div class="max-w-4xl mx-auto mb-10 p-6 bg-brand-gold/10 border border-brand-gold/20 text-brand-green text-xs font-bold uppercase tracking-widest text-center animate-pulse">
                {{ session('message') }}
            </div>
        @endif

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16">
                @foreach($products as $product)
                    <div class="luxury-card group p-6 flex flex-col justify-between border border-brand-gold/10 hover:border-brand-gold/30 rounded-sm transition-all duration-500">
                        <div class="space-y-6">
                            <!-- Image Container -->
                            <div class="aspect-[4/5] overflow-hidden bg-brand-green relative border border-brand-gold/10">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                
                                <!-- Premium Inner Frame -->
                                <div class="absolute inset-4 border border-brand-gold/10 group-hover:inset-3 group-hover:border-brand-gold/30 transition-all duration-700 pointer-events-none"></div>
                                
                                <!-- Overlay Delete Link -->
                                <button wire:click="removeFromWishlist({{ $product->id }})" 
                                        class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/90 border border-brand-gold/25 flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 shadow-md cursor-pointer"
                                        title="Remove from Wishlist">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Product Details -->
                            <div class="space-y-2 text-center">
                                <span class="text-[0.55rem] text-brand-gold uppercase tracking-[0.3em] block font-semibold">{{ $product->collection->name ?? 'AVAL COLLECTION' }}</span>
                                <h3 class="font-heading text-xl text-brand-green group-hover:text-brand-gold transition-colors duration-300 leading-tight">
                                    <a href="{{ url('/products/' . $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                
                                <div class="w-8 h-[1px] bg-brand-gold/20 mx-auto my-2"></div>
                                
                                <!-- Price -->
                                <div class="pt-1 font-body">
                                    @if($product->sale_price)
                                        <span class="font-bold text-sm text-brand-green">₹{{ number_format($product->sale_price) }}</span>
                                        <span class="text-xs text-brand-green/45 line-through ml-2">₹{{ number_format($product->price) }}</span>
                                    @else
                                        <span class="font-bold text-sm text-brand-green">₹{{ number_format($product->price) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Action buttons -->
                        <div class="mt-8 space-y-3 pt-4 border-t border-brand-gold/10">
                            <button wire:click="moveToCart({{ $product->id }})" 
                                    class="w-full btn-gold py-3 text-[0.65rem] font-bold uppercase tracking-widest flex items-center justify-center cursor-pointer">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Move to Bag
                            </button>
                            
                            <button wire:click="removeFromWishlist({{ $product->id }})" 
                                    class="w-full text-center text-brand-green/45 hover:text-brand-gold text-[0.55rem] uppercase tracking-widest font-bold block transition-colors py-2 cursor-pointer">
                                Remove Item
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty state -->
            <div class="max-w-md mx-auto text-center py-20 bg-white border border-brand-gold/15 p-12 shadow-2xl rounded-sm">
                <div class="w-20 h-20 mx-auto mb-8 flex items-center justify-center bg-brand-cream text-brand-gold border border-brand-gold/20 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="font-heading text-2xl text-brand-green mb-4">No Masterpieces Saved</h3>
                <p class="text-brand-green/60 text-xs font-body leading-relaxed mb-10">
                    Your wishlist is currently empty. Explore our collection of handcrafted jewelry and find pieces to elevate your confidence.
                </p>
                <a href="{{ url('/collections') }}" class="btn-gold block w-full text-center py-4">
                    Explore Collections
                </a>
            </div>
        @endif
    </div>
</div>
