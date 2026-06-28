<div class="bg-brand-cream min-h-screen pt-32 pb-24">
    <div class="container mx-auto px-6 max-w-6xl">
        
        @if($isSubmitted)
            <!-- Success Confirmation Screen -->
            <div class="bg-white p-12 md:p-16 shadow-2xl border border-brand-gold/20 max-w-2xl mx-auto text-center space-y-8 relative overflow-hidden rounded-sm">
                <div class="absolute top-0 left-0 w-full h-[4px] bg-linear-to-r from-brand-gold via-brand-gold-light to-brand-gold"></div>
                
                <div class="w-20 h-20 bg-brand-gold/10 text-brand-gold rounded-full flex items-center justify-center mx-auto text-3xl">
                    <i class="fas fa-check"></i>
                </div>
                
                <div class="space-y-4">
                    <h2 class="text-3xl md:text-4xl font-heading text-brand-green">Order Placed Successfully!</h2>
                    <p class="text-brand-green/60 font-body text-xs max-w-md mx-auto">
                        Thank you for choosing AVAL JEWELS. Your order ID is **#{{ $placedOrder->id }}**.
                    </p>
                </div>
                
                @if($paymentMethod === 'whatsapp')
                    <div class="p-6 bg-brand-green/5 border border-brand-gold/15 text-brand-green text-xs font-body leading-relaxed max-w-md mx-auto rounded-sm">
                        <p class="font-bold mb-3 uppercase tracking-widest text-brand-gold">WhatsApp Order Redirect</p>
                        We have opened WhatsApp to connect you directly with our designer concierge. If you were not redirected automatically, please click below to send your order.
                        <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hi House of Aval, I would like to finalize my jewelry order #' . $placedOrder->id) }}" target="_blank" class="mt-4 bg-[#25D366] text-white px-8 py-3 text-xs uppercase tracking-widest font-bold rounded-sm shadow-lg shadow-[#25D366]/10 hover:bg-[#20ba59] transition-all duration-500 hover:scale-105 inline-flex items-center">
                            <i class="fab fa-whatsapp mr-3 text-base"></i> Send Order Specification
                        </a>
                    </div>
                @elseif($paymentMethod === 'simulated_upi')
                    <div class="p-6 bg-brand-green/5 border border-brand-gold/15 text-brand-green text-xs font-body leading-relaxed max-w-md mx-auto space-y-4 rounded-sm">
                        <p class="font-bold uppercase tracking-widest text-brand-gold">UPI Scan & Pay</p>
                        <p class="text-brand-green/60">Scan this QR code using any UPI app (GPay, PhonePe, Paytm) to transfer the amount.</p>
                        <div class="bg-white p-3 border border-brand-gold/10 inline-block rounded-sm">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode('upi://pay?pa=houseofaval@upi&pn=HouseOfAval&am=' . $placedOrder->total_amount . '&cu=INR') }}" 
                                 alt="UPI QR Code" class="w-36 h-36 mx-auto">
                        </div>
                        <p class="font-bold text-sm tracking-wide">Amount Due: ₹{{ number_format($placedOrder->total_amount) }}</p>
                        <p class="text-brand-green/45 text-[0.6rem] leading-tight">Once completed, our concierge will verify payment against Order #{{ $placedOrder->id }} and update you.</p>
                    </div>
                @else
                    <div class="p-6 bg-brand-green/5 border border-brand-gold/15 text-brand-green text-xs font-body leading-relaxed max-w-md mx-auto rounded-sm">
                        <p class="font-bold mb-2 uppercase tracking-widest text-brand-gold">Simulated Card Checkout</p>
                        Your payment was processed successfully via simulated credit card. Our concierge will contact you at {{ $phone }} with shipping details shortly.
                    </div>
                @endif

                <div class="pt-6">
                    <a href="{{ url('/collections') }}" class="btn-gold !px-10 !py-3.5">
                        Continue Shopping
                    </a>
                </div>
            </div>
        @else
            <!-- Standard Checkout Screen -->
            <div class="text-center mb-16">
                <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold mb-4 block">Secure Ordering</span>
                <h1 class="text-4xl md:text-5xl font-heading text-brand-green">Checkout</h1>
            </div>

            <form wire:submit.prevent="placeOrder" class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                
                <!-- Left: Billing/Shipping Details -->
                <div class="lg:col-span-7 bg-white p-8 md:p-12 shadow-2xl relative space-y-10 rounded-sm border border-brand-gold/10">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-brand-gold"></div>
                    
                    <div>
                        <h2 class="text-2xl font-heading text-brand-green mb-3">Delivery Information</h2>
                        <p class="text-brand-green/60 text-xs font-body tracking-wider">Please provide your details below to finalize your shipping address.</p>
                    </div>

                    <div class="space-y-8">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Full Name</label>
                            <input type="text" wire:model="name" class="w-full bg-transparent border-b border-brand-green/10 py-2.5 focus:outline-none focus:border-brand-gold transition-colors font-body text-xs text-brand-green @error('name') border-red-500 @enderror">
                            @error('name') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Email Address</label>
                                <input type="email" wire:model="email" class="w-full bg-transparent border-b border-brand-green/10 py-2.5 focus:outline-none focus:border-brand-gold transition-colors font-body text-xs text-brand-green @error('email') border-red-500 @enderror">
                                @error('email') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Phone Number</label>
                                <input type="text" wire:model="phone" placeholder="+91" class="w-full bg-transparent border-b border-brand-green/10 py-2.5 focus:outline-none focus:border-brand-gold transition-colors font-body text-xs text-brand-green @error('phone') border-red-500 @enderror">
                                @error('phone') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="space-y-2">
                            <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold block">Shipping Address</label>
                            <textarea wire:model="address" rows="3" placeholder="Street details, city, state, pincode" class="w-full bg-transparent border-b border-brand-green/10 py-2.5 focus:outline-none focus:border-brand-gold transition-colors font-body text-xs text-brand-green resize-none @error('address') border-red-500 @enderror"></textarea>
                            @error('address') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Right: Order Summary & Payment -->
                <div class="lg:col-span-5 space-y-12">
                    <!-- Cart Summary -->
                    <div class="bg-white p-8 shadow-2xl space-y-8 rounded-sm border border-brand-gold/10">
                        <h3 class="text-lg font-heading text-brand-green uppercase tracking-[0.1em] border-b border-brand-green/10 pb-4">Order Summary</h3>
                        
                        <div class="space-y-6 max-h-60 overflow-y-auto pr-2 scrollbar-thin">
                            @foreach($cartItems as $item)
                                <div class="flex justify-between items-center text-xs">
                                    <div class="space-y-1 max-w-[70%]">
                                        <h4 class="font-bold text-brand-green truncate">{{ $item['name'] }}</h4>
                                        <span class="text-[0.55rem] text-brand-green/45 block">Qty: {{ $item['quantity'] }}</span>
                                    </div>
                                    <span class="font-body text-brand-green/80 font-medium">₹{{ number_format($item['subtotal']) }}</span>
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
                    <div class="bg-white p-8 shadow-2xl space-y-8 rounded-sm border border-brand-gold/10">
                        <h3 class="text-lg font-heading text-brand-green uppercase tracking-[0.1em] border-b border-brand-green/10 pb-4">Payment Method</h3>
                        
                        <div class="space-y-4">
                            <!-- WhatsApp Checkout (Default) -->
                            <label class="flex items-start space-x-4 border p-4 bg-brand-green/5 cursor-pointer hover:border-brand-gold transition-colors rounded-sm {{ $paymentMethod === 'whatsapp' ? 'border-brand-gold/60' : 'border-brand-gold/10' }}">
                                <input type="radio" wire:model.live="paymentMethod" value="whatsapp" class="mt-1 text-brand-gold focus:ring-brand-gold border-brand-green/20">
                                <div class="text-[0.7rem]">
                                    <p class="font-bold text-brand-green uppercase tracking-wider mb-1 flex items-center">
                                        <i class="fab fa-whatsapp text-base text-[#25D366] mr-2"></i> Order via WhatsApp
                                    </p>
                                    <p class="text-brand-green/60 font-light leading-relaxed">Direct connection with our designer concierge to confirm payment and custom requests.</p>
                                </div>
                            </label>

                            <!-- Simulated UPI -->
                            <label class="flex items-start space-x-4 border p-4 cursor-pointer hover:border-brand-gold transition-colors rounded-sm {{ $paymentMethod === 'simulated_upi' ? 'border-brand-gold/60 bg-brand-green/5' : 'border-brand-gold/10' }}">
                                <input type="radio" wire:model.live="paymentMethod" value="simulated_upi" class="mt-1 text-brand-gold focus:ring-brand-gold border-brand-green/20">
                                <div class="text-[0.7rem]">
                                    <p class="font-bold text-brand-green uppercase tracking-wider mb-1 flex items-center">
                                        <i class="fas fa-qrcode mr-2 text-brand-gold"></i> Simulated UPI / QR Code
                                    </p>
                                    <p class="text-brand-green/60 font-light leading-relaxed">Generate sandbox QR code details to simulate immediate UPI payments.</p>
                                </div>
                            </label>

                            <!-- Simulated Card -->
                            <label class="flex items-start space-x-4 border p-4 cursor-pointer hover:border-brand-gold transition-colors rounded-sm {{ $paymentMethod === 'simulated_card' ? 'border-brand-gold/60 bg-brand-green/5' : 'border-brand-gold/10' }}">
                                <input type="radio" wire:model.live="paymentMethod" value="simulated_card" class="mt-1 text-brand-gold focus:ring-brand-gold border-brand-green/20">
                                <div class="text-[0.7rem]">
                                    <p class="font-bold text-brand-green uppercase tracking-wider mb-1 flex items-center">
                                        <i class="far fa-credit-card mr-2 text-brand-gold"></i> Simulated Credit Card
                                    </p>
                                    <p class="text-brand-green/60 font-light leading-relaxed">Simulate a high-end secure card gateway checkout transaction.</p>
                                </div>
                            </label>
                        </div>

                        <!-- Card Fields (Only shows if card payment selected) -->
                        @if($paymentMethod === 'simulated_card')
                            <div class="pt-4 border-t border-brand-green/5 space-y-4 animate-fadeIn">
                                <div class="space-y-1">
                                    <label class="text-[0.55rem] uppercase tracking-widest text-brand-green/40 font-bold block">Card Details (Simulated)</label>
                                    <input type="text" placeholder="1111 2222 3333 4444" class="w-full bg-transparent border-b border-brand-green/10 py-2 focus:outline-none focus:border-brand-gold text-xs text-brand-green font-body tracking-widest">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-[0.55rem] uppercase tracking-widest text-brand-green/40 font-bold block">Expiry Date</label>
                                        <input type="text" placeholder="MM/YY" class="w-full bg-transparent border-b border-brand-green/10 py-2 focus:outline-none focus:border-brand-gold text-xs text-brand-green font-body">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[0.55rem] uppercase tracking-widest text-brand-green/40 font-bold block">CVV</label>
                                        <input type="password" placeholder="***" class="w-full bg-transparent border-b border-brand-green/10 py-2 focus:outline-none focus:border-brand-gold text-xs text-brand-green font-body">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn-gold !w-full justify-center text-center py-4 font-bold uppercase tracking-[0.2em] shadow-xl hover:shadow-brand-gold/25 rounded-sm">
                            <span wire:loading.remove>
                                {{ $paymentMethod === 'whatsapp' ? 'Place Order via WhatsApp' : 'Complete Ordering' }}
                            </span>
                            <span wire:loading>Securing Transaction...</span>
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
