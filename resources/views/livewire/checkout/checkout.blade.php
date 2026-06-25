<div class="bg-brand-cream min-h-screen pt-32 pb-24">
    <div class="container mx-auto px-6 max-w-6xl">
        
        @if($isSubmitted)
            <!-- Success Confirmation Screen -->
            <div class="bg-white p-12 md:p-20 shadow-2xl border-t-4 border-brand-gold max-w-2xl mx-auto text-center space-y-8">
                <div class="w-20 h-20 bg-brand-gold/10 text-brand-gold rounded-full flex items-center justify-center mx-auto text-3xl">
                    <i class="fas fa-check"></i>
                </div>
                <div class="space-y-4">
                    <h2 class="text-4xl font-heading text-brand-green">Order Placed Successfully!</h2>
                    <p class="text-brand-green/60 font-body text-sm max-w-md mx-auto">
                        Thank you for shopping with AVAL JEWELS. Your order **#{{ $placedOrder->id }}** has been recorded.
                    </p>
                </div>
                
                @if($paymentMethod === 'whatsapp')
                    <div class="p-6 bg-brand-green/5 border border-brand-gold/20 text-brand-green text-xs font-body leading-relaxed max-w-md mx-auto">
                        <p class="font-bold mb-2 uppercase tracking-wider text-brand-gold">WhatsApp Order Redirect</p>
                        We have opened WhatsApp to send your order receipt to our boutique concierge. If you were not redirected, please click the button below to complete your checkout.
                        <a href="https://wa.me/919876543210?text={{ urlencode('Hi House of Aval, check order #' . $placedOrder->id) }}" target="_blank" class="mt-4 btn-gold !py-3 !px-8 block text-center">
                            Retry WhatsApp Message
                        </a>
                    </div>
                @else
                    <div class="p-6 bg-brand-green/5 border border-brand-gold/20 text-brand-green text-xs font-body leading-relaxed max-w-md mx-auto">
                        <p class="font-bold mb-2 uppercase tracking-wider text-brand-gold">Simulated Checkout Info</p>
                        Your payment was processed successfully via simulated **{{ $paymentMethod === 'simulated_card' ? 'Credit Card' : 'UPI' }}**. Our concierge will contact you on your registered phone number ({{ $phone }}) shortly for shipping updates.
                    </div>
                @endif

                <div class="pt-6">
                    <a href="{{ url('/collections') }}" class="btn-gold">
                        Continue Shopping
                    </a>
                </div>
            </div>
        @else
            <!-- Standard Checkout Screen -->
            <div class="text-center mb-16">
                <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold mb-4 block">Secure Ordering</span>
                <h1 class="text-5xl font-heading text-brand-green leading-tight">Checkout</h1>
            </div>

            <form wire:submit.prevent="placeOrder" class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                
                <!-- Left: Billing/Shipping Details -->
                <div class="lg:col-span-7 bg-white p-10 md:p-16 shadow-2xl relative space-y-12">
                    <div class="absolute top-0 left-0 w-2 h-full bg-brand-gold"></div>
                    
                    <div>
                        <h2 class="text-3xl font-heading text-brand-green mb-4">Delivery Information</h2>
                        <p class="text-brand-green/60 text-xs font-body tracking-wider">Please provide your details below to finalize your shipping address.</p>
                    </div>

                    <div class="space-y-8">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label class="text-[0.65rem] uppercase tracking-widest text-brand-green/60 font-bold block">Full Name</label>
                            <input type="text" wire:model="name" class="w-full bg-transparent border-b border-brand-green/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-green @error('name') border-red-500 @enderror">
                            @error('name') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-[0.65rem] uppercase tracking-widest text-brand-green/60 font-bold block">Email Address</label>
                                <input type="email" wire:model="email" class="w-full bg-transparent border-b border-brand-green/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-green @error('email') border-red-500 @enderror">
                                @error('email') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="text-[0.65rem] uppercase tracking-widest text-brand-green/60 font-bold block">Phone Number</label>
                                <input type="text" wire:model="phone" placeholder="e.g. +91 98765 43210" class="w-full bg-transparent border-b border-brand-green/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-green @error('phone') border-red-500 @enderror">
                                @error('phone') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="space-y-2">
                            <label class="text-[0.65rem] uppercase tracking-widest text-brand-green/60 font-bold block">Shipping Address</label>
                            <textarea wire:model="address" rows="3" placeholder="Full street address, city, state, pincode" class="w-full bg-transparent border-b border-brand-green/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-green resize-none @error('address') border-red-500 @enderror"></textarea>
                            @error('address') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Right: Order Summary & Payment -->
                <div class="lg:col-span-5 space-y-12">
                    <!-- Cart Summary -->
                    <div class="bg-white p-10 shadow-2xl space-y-8">
                        <h3 class="text-xl font-heading text-brand-green uppercase tracking-widest border-b border-brand-green/10 pb-4">Order Summary</h3>
                        
                        <div class="space-y-6 max-h-60 overflow-y-auto pr-2">
                            @foreach($cartItems as $item)
                                <div class="flex justify-between items-center text-xs">
                                    <div class="space-y-1">
                                        <h4 class="font-bold text-brand-green">{{ $item['name'] }}</h4>
                                        <span class="text-[0.6rem] text-brand-gold uppercase tracking-wider">{{ $item['purity'] }} Hallmarked</span>
                                        <span class="text-[0.6rem] text-brand-green/40 block">Qty: {{ $item['quantity'] }}</span>
                                    </div>
                                    <span class="font-body text-brand-green/80">₹{{ number_format($item['subtotal']) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-brand-green/10 pt-6 space-y-4">
                            <div class="flex justify-between text-xs text-brand-green/60">
                                <span>Subtotal</span>
                                <span>₹{{ number_format($total) }}</span>
                            </div>
                            <div class="flex justify-between text-xs text-brand-green/60">
                                <span>Estimated Shipping</span>
                                <span class="text-brand-gold uppercase tracking-widest font-bold">Free Delivery</span>
                            </div>
                            <div class="flex justify-between text-base font-heading text-brand-green font-bold border-t border-brand-green/5 pt-4">
                                <span>Total Amount</span>
                                <span class="text-lg">₹{{ number_format($total) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="bg-white p-10 shadow-2xl space-y-8">
                        <h3 class="text-xl font-heading text-brand-green uppercase tracking-widest border-b border-brand-green/10 pb-4">Payment Method</h3>
                        
                        <div class="space-y-4">
                            <!-- WhatsApp Checkout (Default) -->
                            <label class="flex items-start space-x-4 border border-brand-gold/20 p-4 bg-brand-green/5 cursor-pointer hover:border-brand-gold transition-colors">
                                <input type="radio" wire:model.live="paymentMethod" value="whatsapp" class="mt-1 text-brand-gold focus:ring-brand-gold border-brand-green/20">
                                <div class="text-xs">
                                    <p class="font-bold text-brand-green uppercase tracking-wider mb-1 flex items-center">
                                        <i class="fab fa-whatsapp text-lg text-[#25D366] mr-2"></i> Order via WhatsApp
                                    </p>
                                    <p class="text-brand-green/60 font-light">Generate order specifications and send details to our designer concierge instantly.</p>
                                </div>
                            </label>

                            <!-- Simulated UPI -->
                            <label class="flex items-start space-x-4 border border-brand-green/10 p-4 cursor-pointer hover:border-brand-gold transition-colors" :class="$wire.paymentMethod === 'simulated_upi' ? 'border-brand-gold/20 bg-brand-green/5' : ''">
                                <input type="radio" wire:model.live="paymentMethod" value="simulated_upi" class="mt-1 text-brand-gold focus:ring-brand-gold border-brand-green/20">
                                <div class="text-xs">
                                    <p class="font-bold text-brand-green uppercase tracking-wider mb-1">
                                        <i class="fas fa-mobile-alt mr-2 text-brand-gold"></i> Simulated UPI / QR Payment
                                    </p>
                                    <p class="text-brand-green/60 font-light">Simulate payment verification instantly (no actual funds charged).</p>
                                </div>
                            </label>

                            <!-- Simulated Card -->
                            <label class="flex items-start space-x-4 border border-brand-green/10 p-4 cursor-pointer hover:border-brand-gold transition-colors" :class="$wire.paymentMethod === 'simulated_card' ? 'border-brand-gold/20 bg-brand-green/5' : ''">
                                <input type="radio" wire:model.live="paymentMethod" value="simulated_card" class="mt-1 text-brand-gold focus:ring-brand-gold border-brand-green/20">
                                <div class="text-xs">
                                    <p class="font-bold text-brand-green uppercase tracking-wider mb-1">
                                        <i class="far fa-credit-card mr-2 text-brand-gold"></i> Simulated Card Checkout
                                    </p>
                                    <p class="text-brand-green/60 font-light">Enter simulated card information to complete order immediately.</p>
                                </div>
                            </label>
                        </div>

                        <!-- Card Fields (Only shows if card payment selected) -->
                        @if($paymentMethod === 'simulated_card')
                            <div class="pt-4 border-t border-brand-green/5 space-y-4 animate-fadeIn">
                                <div class="space-y-1">
                                    <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold block">Card Details (Simulated)</label>
                                    <input type="text" placeholder="1111 2222 3333 4444" class="w-full bg-transparent border-b border-brand-green/10 py-2 focus:outline-none focus:border-brand-gold text-xs text-brand-green font-body tracking-wider">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold block">Expiry Date</label>
                                        <input type="text" placeholder="MM/YY" class="w-full bg-transparent border-b border-brand-green/10 py-2 focus:outline-none focus:border-brand-gold text-xs text-brand-green font-body">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/40 font-bold block">CVV</label>
                                        <input type="password" placeholder="***" class="w-full bg-transparent border-b border-brand-green/10 py-2 focus:outline-none focus:border-brand-gold text-xs text-brand-green font-body">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn-gold !w-full justify-center text-center py-4 font-bold uppercase tracking-[0.2em] shadow-2xl">
                            <span wire:loading.remove>
                                {{ $paymentMethod === 'whatsapp' ? 'Order via WhatsApp' : 'Place Order' }}
                            </span>
                            <span wire:loading>Processing...</span>
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
