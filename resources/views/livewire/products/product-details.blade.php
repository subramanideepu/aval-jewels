<div class="bg-brand-cream pt-32 pb-24">
    <div class="container mx-auto px-6">
        <!-- Breadcrumbs -->
        <nav class="flex mb-12 text-[0.6rem] uppercase tracking-widest font-bold">
            <a href="{{ url('/') }}" class="text-brand-green/40 hover:text-brand-gold transition-colors">Home</a>
            <span class="mx-4 text-brand-gold">/</span>
            <a href="{{ url('/collections') }}" class="text-brand-green/40 hover:text-brand-gold transition-colors">Collections</a>
            <span class="mx-4 text-brand-gold">/</span>
            <span class="text-brand-green">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Product Gallery -->
            <div x-data="{ activeImage: '{{ asset($product->image) }}' }" class="space-y-6">
                <div class="aspect-[4/5] bg-brand-green overflow-hidden relative group">
                    <img :src="activeImage" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-brand-green/10"></div>
                </div>
                
                @if($product->gallery && count($product->gallery) > 0)
                <div class="grid grid-cols-4 gap-4">
                    <button @click="activeImage = '{{ asset($product->image) }}'" class="aspect-square bg-brand-green overflow-hidden opacity-60 hover:opacity-100 transition-opacity" :class="activeImage === '{{ asset($product->image) }}' ? 'opacity-100 ring-2 ring-brand-gold' : ''">
                        <img src="{{ asset($product->image) }}" class="w-full h-full object-cover">
                    </button>
                    @foreach($product->gallery as $img)
                    <button @click="activeImage = '{{ asset($img) }}'" class="aspect-square bg-brand-green overflow-hidden opacity-60 hover:opacity-100 transition-opacity" :class="activeImage === '{{ asset($img) }}' ? 'opacity-100 ring-2 ring-brand-gold' : ''">
                        <img src="{{ asset($img) }}" class="w-full h-full object-cover">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-12">
                <div>
                    <span class="text-brand-gold text-[0.7rem] uppercase tracking-[0.5em] font-bold mb-4 block">{{ $product->collection->name ?? 'Exquisite Collection' }}</span>
                    <h1 class="text-5xl md:text-7xl font-heading text-brand-green leading-tight">{{ $product->name }}</h1>
                </div>

                <!-- Estimated Price -->
                <div class="flex items-baseline space-x-4">
                    @if($product->sale_price)
                        <span class="text-4xl font-body font-bold text-brand-green">
                            ₹{{ number_format($purity === '18K' ? ($product->sale_price * 0.85) : $product->sale_price) }}
                        </span>
                        <span class="text-xl text-brand-green/40 line-through">
                            ₹{{ number_format($purity === '18K' ? ($product->price * 0.85) : $product->price) }}
                        </span>
                    @else
                        <span class="text-4xl font-body font-bold text-brand-green">
                            ₹{{ number_format($purity === '18K' ? ($product->price * 0.85) : $product->price) }}
                        </span>
                    @endif
                    <span class="text-xs text-brand-gold uppercase tracking-widest font-bold">Estimated Price</span>
                </div>

                <div class="prose prose-brand max-w-none">
                    <p class="text-brand-green/70 text-lg font-body leading-relaxed font-light">
                        {!! $product->description !!}
                    </p>
                </div>

                <!-- Specifications -->
                @if($product->specifications && count($product->specifications) > 0)
                <div class="border-y border-brand-green/10 py-10">
                    <h3 class="text-brand-green font-heading text-2xl mb-8">Specifications</h3>
                    <div class="grid grid-cols-2 gap-x-12 gap-y-6">
                        @foreach($product->specifications as $label => $value)
                        <div class="flex justify-between items-center border-b border-brand-green/5 pb-2">
                            <span class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold">{{ $label }}</span>
                            <span class="text-sm font-body text-brand-green font-medium">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Product Buying Options (Purity & Quantity) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 border-b border-brand-green/10 pb-10">
                    <!-- Purity Selection -->
                    <div class="space-y-3">
                        <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Select Metal Purity</label>
                        <div class="relative">
                            <select wire:model.live="purity" class="w-full bg-transparent border border-brand-green/20 px-4 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-green appearance-none pr-10">
                                @foreach($product->purity_options ?? ['18K', '22K'] as $option)
                                    <option value="{{ $option }}">{{ $option }} Hallmarked Gold</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-brand-gold">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity Selection -->
                    <div class="space-y-3">
                        <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Quantity</label>
                        <div class="flex items-center border border-brand-green/20 h-[46px] w-32 bg-brand-green/5">
                            <button type="button" @click="$wire.quantity > 1 ? $wire.quantity-- : null" class="px-4 py-2 text-brand-green/60 hover:text-brand-green font-bold transition-colors">-</button>
                            <input type="text" wire:model="quantity" readonly class="w-12 text-center bg-transparent border-none font-bold text-brand-green font-body text-sm focus:outline-none focus:ring-0">
                            <button type="button" @click="$wire.quantity++" class="px-4 py-2 text-brand-green/60 hover:text-brand-green font-bold transition-colors">+</button>
                        </div>
                    </div>
                </div>

                <!-- Add to Bag & Checkout Actions -->
                <div class="flex flex-col sm:flex-row gap-6 pt-4">
                    <button wire:click="addToCart" class="flex-1 btn-gold justify-center group relative overflow-hidden text-center py-4">
                        <i class="fas fa-shopping-cart mr-4 text-lg"></i>
                        <span>Add to bag</span>
                    </button>
                    
                    <a href="https://wa.me/919876543210?text=I am interested in ordering: {{ $product->name }} (Purity: {{ $purity }}, Qty: {{ $quantity }}) - {{ url()->current() }}" 
                       target="_blank"
                       class="flex-1 btn-gold justify-center group overflow-hidden bg-[#25D366] !border-none !text-white shadow-[#25D366]/20">
                        <i class="fab fa-whatsapp mr-4 text-lg transition-transform group-hover:scale-125"></i>
                        <span>Order via WhatsApp</span>
                    </a>
                </div>

                <!-- Features/Badges -->
                <div class="flex items-center space-x-10 pt-10 opacity-60 grayscale hover:grayscale-0 transition-all duration-700">
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios/50/D4AF37/diamond--v1.png" class="w-8 h-8 mb-2">
                        <span class="text-[0.5rem] uppercase tracking-widest font-bold">Ethically Sourced</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios/50/D4AF37/guarantee.png" class="w-8 h-8 mb-2">
                        <span class="text-[0.5rem] uppercase tracking-widest font-bold">BIS Hallmarked</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios/50/D4AF37/hand-crafted.png" class="w-8 h-8 mb-2">
                        <span class="text-[0.5rem] uppercase tracking-widest font-bold">Master Crafted</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inquiry Form Section -->
        <div id="inquiry-form" class="mt-32">
            <livewire:contact.inquiry-form :subject="'Inquiry for: ' . $product->name" />
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-48">
            <div class="text-center mb-20">
                <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] mb-4 block font-bold">Similar Artistry</span>
                <h2 class="text-4xl md:text-5xl font-heading text-brand-green">You May Also Admire</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @foreach($relatedProducts as $rel)
                <div class="group">
                    <a href="{{ url('/products/' . $rel->slug) }}" class="block">
                        <div class="aspect-[4/5] overflow-hidden bg-brand-green mb-6 relative">
                            <img src="{{ asset($rel->image) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute inset-0 bg-brand-green/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="bg-white text-brand-green px-8 py-3 text-[0.6rem] uppercase tracking-widest font-bold">View Detail</span>
                            </div>
                        </div>
                        <h3 class="text-center font-heading text-xl text-brand-green group-hover:text-brand-gold transition-colors">{{ $rel->name }}</h3>
                        <p class="text-center text-brand-gold text-[0.6rem] uppercase tracking-widest mt-2">{{ $rel->collection->name }}</p>
                        <p class="text-center text-brand-green font-body font-bold text-sm mt-2">
                            @if($rel->sale_price)
                                <span class="text-brand-green font-bold">₹{{ number_format($rel->sale_price) }}</span>
                                <span class="text-brand-green/45 line-through text-xs ml-2">₹{{ number_format($rel->price) }}</span>
                            @else
                                <span>₹{{ number_format($rel->price) }}</span>
                            @endif
                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
