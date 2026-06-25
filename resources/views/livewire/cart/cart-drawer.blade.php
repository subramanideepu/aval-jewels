<div x-data="{ open: @entangle('isOpen') }" 
     x-cloak
     @keydown.window.escape="open = false"
     class="relative z-50">
    
    <!-- Backdrop Overlay -->
    <div x-show="open" 
         x-transition:enter="transition-opacity ease-out duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false" 
         class="fixed inset-0 bg-brand-dark/60 backdrop-blur-sm"></div>

    <!-- Sliding Cart Drawer Panel -->
    <div x-show="open" 
         x-transition:enter="transition transform ease-out duration-500"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform ease-in duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        
        <div class="w-screen max-w-md bg-brand-dark text-white border-l border-brand-gold/10 relative shadow-2xl">
            <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>

            <div class="h-full flex flex-col justify-between py-12 px-8 relative z-10">
                <!-- Header -->
                <div>
                    <div class="flex items-center justify-between pb-8 border-b border-brand-gold/10">
                        <h2 class="text-2xl font-heading text-brand-gold uppercase tracking-widest flex items-center">
                            <i class="fas fa-shopping-bag mr-4"></i> Cart ({{ count($cartItems) }})
                        </h2>
                        <button @click="open = false" class="text-brand-gold/60 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Cart Items Container -->
                <div class="flex-1 overflow-y-auto py-8 pr-2 space-y-8 scrollbar-thin">
                    @if(count($cartItems) > 0)
                        @foreach($cartItems as $item)
                            <div class="flex items-start justify-between border-b border-brand-gold/5 pb-6">
                                <div class="flex items-center space-x-5">
                                    <div class="w-20 h-20 bg-brand-green/30 border border-brand-gold/10 overflow-hidden flex-shrink-0">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="space-y-1">
                                        <h4 class="font-heading text-sm text-white tracking-wide">{{ $item['name'] }}</h4>
                                        <div class="flex items-center space-x-3 text-[0.65rem] text-brand-gold uppercase tracking-widest">
                                            <span>Purity: {{ $item['purity'] }}</span>
                                        </div>
                                        <div class="text-xs font-semibold text-brand-cream/80">
                                            ₹{{ number_format($item['price']) }} x {{ $item['quantity'] }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col items-end justify-between h-20">
                                    <button wire:click="removeItem('{{ $item['product_id'] }}', '{{ $item['purity'] }}')" class="text-red-400 hover:text-red-500 text-xs transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    
                                    <!-- Quantity Adjustment Controls -->
                                    <div class="flex items-center border border-brand-gold/20 text-xs bg-brand-green/10">
                                        <button wire:click="decrementQuantity('{{ $item['product_id'] }}', '{{ $item['purity'] }}')" class="px-2 py-1 text-brand-gold/60 hover:text-white transition-colors">-</button>
                                        <span class="px-3 font-semibold text-white">{{ $item['quantity'] }}</span>
                                        <button wire:click="incrementQuantity('{{ $item['product_id'] }}', '{{ $item['purity'] }}')" class="px-2 py-1 text-brand-gold/60 hover:text-white transition-colors">+</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="h-full flex flex-col items-center justify-center text-center space-y-6 opacity-60 py-20">
                            <i class="fas fa-shopping-bag text-5xl text-brand-gold/40"></i>
                            <p class="font-body text-sm text-brand-cream/60 tracking-wider">Your shopping cart is empty.</p>
                            <button @click="open = false" class="btn-gold !px-8 !py-3">Start Shopping</button>
                        </div>
                    @endif
                </div>

                <!-- Footer Summary / Checkout Buttons -->
                @if(count($cartItems) > 0)
                    <div class="pt-8 border-t border-brand-gold/10 space-y-6">
                        <div class="flex justify-between items-center text-lg">
                            <span class="font-heading text-brand-gold uppercase tracking-widest text-sm">Estimated Total</span>
                            <span class="font-body text-white font-bold text-xl">₹{{ number_format($total) }}</span>
                        </div>
                        <p class="text-[0.65rem] text-brand-cream/50 tracking-wider font-light">Taxes and delivery shipping calculated at checkout.</p>
                        
                        <div class="space-y-4">
                            <a href="{{ url('/checkout') }}" class="btn-gold !w-full justify-center text-center py-4">
                                Proceed to checkout
                            </a>
                            <button @click="open = false" class="w-full text-center text-brand-gold/60 hover:text-white text-xs uppercase tracking-widest py-2 transition-colors">
                                Continue Shopping
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
