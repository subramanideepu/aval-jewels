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
            <div x-data="{ 
                activeImage: '{{ asset($product->image) }}',
                zoom: false,
                zoomX: 0,
                zoomY: 0,
                handleMove(e) {
                    const rect = e.currentTarget.getBoundingClientRect();
                    const x = ((e.clientX - rect.left) / rect.width) * 100;
                    const y = ((e.clientY - rect.top) / rect.height) * 100;
                    this.zoomX = x;
                    this.zoomY = y;
                }
            }" class="space-y-6">
                <!-- Magnifying Lens Container -->
                <div class="aspect-[4/5] bg-brand-green overflow-hidden relative border border-brand-gold/10 group cursor-zoom-in rounded-sm"
                     @mouseenter="zoom = true" 
                     @mouseleave="zoom = false"
                     @mousemove="handleMove($event)">
                    <img :src="activeImage" alt="{{ $product->name }}" 
                         class="w-full h-full object-cover transition-transform duration-200"
                         :class="zoom ? 'scale-[1.8]' : 'scale-100'"
                         :style="zoom ? `transform-origin: ${zoomX}% ${zoomY}%` : ''">
                    <div class="absolute inset-0 bg-brand-green/5 pointer-events-none"></div>
                </div>
                
                @if($product->gallery && count($product->gallery) > 0)
                <div class="grid grid-cols-4 gap-4">
                    <button @click="activeImage = '{{ asset($product->image) }}'" class="aspect-square bg-brand-green overflow-hidden opacity-60 hover:opacity-100 transition-opacity border border-brand-gold/10" :class="activeImage === '{{ asset($product->image) }}' ? 'opacity-100 ring-2 ring-brand-gold' : ''">
                        <img src="{{ asset($product->image) }}" class="w-full h-full object-cover">
                    </button>
                    @foreach($product->gallery as $img)
                    <button @click="activeImage = '{{ asset($img) }}'" class="aspect-square bg-brand-green overflow-hidden opacity-60 hover:opacity-100 transition-opacity border border-brand-gold/10" :class="activeImage === '{{ asset($img) }}' ? 'opacity-100 ring-2 ring-brand-gold' : ''">
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
                    <h1 class="text-4xl md:text-6xl font-heading text-brand-green leading-tight">{{ $product->name }}</h1>
                </div>

                <!-- Product Price -->
                <div class="bg-white p-6 border-l-4 border-brand-gold shadow-lg shadow-brand-green/5">
                    <div class="flex items-baseline space-x-4">
                        @if($product->sale_price)
                            <span class="text-4xl font-body font-bold text-brand-green">
                                ₹{{ number_format($product->sale_price) }}
                            </span>
                            <span class="text-lg text-brand-green/40 line-through">
                                ₹{{ number_format($product->price) }}
                            </span>
                        @else
                            <span class="text-4xl font-body font-bold text-brand-green">
                                ₹{{ number_format($product->price) }}
                            </span>
                        @endif
                        <span class="text-[0.6rem] text-brand-gold uppercase tracking-[0.2em] font-bold">Price</span>
                    </div>
                </div>

                <div class="prose prose-brand max-w-none">
                    <p class="text-brand-green/70 text-base font-body leading-relaxed font-light">
                        {!! $product->description !!}
                    </p>
                </div>

                <!-- Specifications -->
                @if($product->specifications && count($product->specifications) > 0)
                <div class="border-y border-brand-green/10 py-8">
                    <h3 class="text-brand-green font-heading text-xl mb-6">Specifications</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                        @foreach($product->specifications as $label => $value)
                        <div class="flex justify-between items-center border-b border-brand-green/5 pb-2">
                            <span class="text-[0.6rem] uppercase tracking-widest text-brand-green/45 font-bold">{{ $label }}</span>
                            <span class="text-xs font-body text-brand-green font-medium">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Product Buying Options (Quantity) -->
                <div class="border-b border-brand-green/10 pb-10">
                    <!-- Quantity Selection -->
                    <div class="space-y-3">
                        <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Quantity</label>
                        <div class="flex items-center border border-brand-green/20 h-[46px] w-32 bg-white">
                            <button type="button" wire:click="$set('quantity', {{ max(1, $quantity - 1) }})" class="px-4 py-2 text-brand-green/60 hover:text-brand-green font-bold transition-colors">-</button>
                            <span class="w-12 text-center bg-transparent border-none font-bold text-brand-green font-body text-sm">{{ $quantity }}</span>
                            <button type="button" wire:click="$set('quantity', {{ $quantity + 1 }})" class="px-4 py-2 text-brand-green/60 hover:text-brand-green font-bold transition-colors">+</button>
                        </div>
                    </div>
                </div>

                <!-- Add to Bag & Checkout Actions -->
                <div class="flex flex-col sm:flex-row gap-6 pt-4">
                    <button wire:click="addToCart" class="flex-1 btn-gold justify-center group relative overflow-hidden text-center py-4 rounded-sm flex items-center">
                        <i class="fas fa-shopping-bag mr-3 text-sm"></i>
                        <span>Add to bag</span>
                    </button>
                    
                    @php
                        $calculatedPrice = $product->sale_price ?? $product->price;
                        $whatsappMsg = "Hi House of Aval, I am interested in ordering:\n\n*{$product->name}*\nQty: {$quantity}\nPrice: ₹" . number_format($calculatedPrice * $quantity) . "\n\nProduct Link: " . urlencode(url()->current());
                    @endphp
                    <a href="https://wa.me/{{ $whatsappNumber }}?text={!! urlencode($whatsappMsg) !!}" 
                       target="_blank"
                       class="flex-1 inline-flex justify-center items-center bg-[#25D366] text-white px-8 py-4 text-[0.7rem] uppercase tracking-[0.2em] font-bold rounded-sm shadow-xl shadow-[#25D366]/10 hover:bg-[#20ba59] transition-all duration-500 hover:scale-105">
                        <i class="fab fa-whatsapp mr-3 text-base"></i>
                        <span>Order via WhatsApp</span>
                    </a>
                </div>

                <!-- Features/Badges -->
                <div class="flex items-center space-x-10 pt-10 opacity-60 grayscale hover:grayscale-0 transition-all duration-700">
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios/50/D4AF37/diamond--v1.png" class="w-8 h-8 mb-2">
                        <span class="text-[0.5rem] uppercase tracking-widest font-bold">Lightweight Comfort</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="https://img.icons8.com/ios/50/D4AF37/guarantee.png" class="w-8 h-8 mb-2">
                        <span class="text-[0.5rem] uppercase tracking-widest font-bold">AAA-Grade Quality</span>
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
