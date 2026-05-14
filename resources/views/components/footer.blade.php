<footer class="bg-brand-dark text-white pt-24 pb-12 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/black-linen.png');"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
            <!-- Brand Section -->
            <div class="space-y-8">
                <x-brand-logo size="md" />
                <p class="text-brand-cream/50 text-sm font-body leading-relaxed max-w-xs">
                    Curating brilliance since 1990. We specialize in handcrafted luxury jewelry that defines elegance and celebrates your unique radiance.
                </p>
                <div class="flex space-x-5">
                    @foreach(['facebook', 'instagram', 'whatsapp'] as $social)
                        <a href="#" class="w-10 h-10 border border-brand-gold/20 flex items-center justify-center rounded-full hover:bg-brand-gold hover:text-brand-maroon hover:border-brand-gold transition-all duration-500 text-brand-gold/60">
                            <span class="sr-only">{{ $social }}</span>
                            <i class="fab fa-{{ $social }} text-sm"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Explore Links -->
            <div>
                <h4 class="text-brand-gold font-heading text-lg uppercase tracking-widest mb-10 relative inline-block">
                    Explore
                    <span class="absolute -bottom-2 left-0 w-8 h-px bg-brand-gold"></span>
                </h4>
                <ul class="space-y-4">
                    @foreach(['Home' => '/', 'Collections' => '/collections', 'Our Story' => '/about', 'Contact' => '/contact'] as $name => $link)
                        <li>
                            <a href="{{ $link }}" class="text-brand-cream/60 hover:text-brand-gold transition-colors text-sm font-body uppercase tracking-[0.2em] flex items-center group">
                                <span class="w-0 h-px bg-brand-gold mr-0 transition-all duration-300 group-hover:w-4 group-hover:mr-3"></span>
                                {{ $name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Boutique Info -->
            <div>
                <h4 class="text-brand-gold font-heading text-lg uppercase tracking-widest mb-10 relative inline-block">
                    The Boutique
                    <span class="absolute -bottom-2 left-0 w-8 h-px bg-brand-gold"></span>
                </h4>
                <div class="space-y-6 text-brand-cream/60 text-sm font-body leading-relaxed">
                    <p class="flex items-start space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-gold mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>45, GST Road, Pallavaram,<br>Chennai, Tamil Nadu - 600043</span>
                    </p>
                    <p class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-gold flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+91 98765 43210</span>
                    </p>
                </div>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-brand-gold font-heading text-lg uppercase tracking-widest mb-10 relative inline-block">
                    Newsletter
                    <span class="absolute -bottom-2 left-0 w-8 h-px bg-brand-gold"></span>
                </h4>
                <p class="text-brand-cream/50 text-sm font-body mb-6">Receive exclusive previews and jewelry insights.</p>
                <form class="space-y-4">
                    <div class="relative">
                        <input type="email" placeholder="Your Email" class="w-full bg-brand-maroon/20 border-b border-brand-gold/30 px-0 py-3 text-white focus:outline-none focus:border-brand-gold transition-colors placeholder:text-brand-cream/20 text-sm font-body">
                        <button type="submit" class="absolute right-0 top-3 text-brand-gold hover:translate-x-1 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="pt-12 border-t border-brand-gold/10 flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
            <p class="text-[0.6rem] font-body text-brand-cream/30 uppercase tracking-[0.3em]">
                &copy; {{ date('Y') }} AVAL JEWELS. All Rights Reserved.
            </p>
            <div class="flex space-x-8 text-[0.6rem] font-body text-brand-cream/30 uppercase tracking-[0.2em]">
                <a href="#" class="hover:text-brand-gold transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-brand-gold transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
