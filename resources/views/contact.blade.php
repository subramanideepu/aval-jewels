<x-app-layout title="Contact Us | AVAL JEWELS">

    <section class="pt-48 pb-20 bg-brand-cream">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Info Side -->
                <div class="lg:col-span-5 space-y-16">
                    <div>
                        <span class="text-brand-gold text-[0.6rem] uppercase tracking-[0.5em] font-bold mb-6 block">Get in Touch</span>
                        <h1 class="text-5xl md:text-7xl font-heading text-brand-maroon leading-tight mb-8">Reach the<br>Concierge</h1>
                        <p class="text-brand-maroon/60 font-body text-lg leading-relaxed max-w-md">
                            Whether you're looking for a bridal consultation or a custom design, our team is here to assist you with every detail.
                        </p>
                    </div>

                    <div class="space-y-10">
                        <div class="flex items-start space-x-6">
                            <div class="w-12 h-12 border border-brand-gold/20 flex items-center justify-center text-brand-gold flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="text-brand-maroon font-heading text-xl mb-2">Our Boutique</h4>
                                <p class="text-brand-maroon/60 font-body text-sm leading-relaxed">45, GST Road, Pallavaram,<br>Chennai, Tamil Nadu - 600043</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-6">
                            <div class="w-12 h-12 border border-brand-gold/20 flex items-center justify-center text-brand-gold flex-shrink-0">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 class="text-brand-maroon font-heading text-xl mb-2">Call Us</h4>
                                <p class="text-brand-maroon/60 font-body text-sm">+91 98765 43210</p>
                                <p class="text-brand-maroon/60 font-body text-sm">+91 44 2233 4455</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-6">
                            <div class="w-12 h-12 border border-brand-gold/20 flex items-center justify-center text-brand-gold flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="text-brand-maroon font-heading text-xl mb-2">Email Us</h4>
                                <p class="text-brand-maroon/60 font-body text-sm">concierge@avaljewels.com</p>
                                <p class="text-brand-maroon/60 font-body text-sm">support@avaljewels.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="lg:col-span-7">
                    <livewire:contact.inquiry-form />
                </div>
            </div>
        </div>
    </section>

    <!-- Map placeholder -->
    <section class="h-[500px] w-full grayscale contrast-125 brightness-90 relative">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.5878844857436!2d80.1495922758999!3d12.966212515437894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f05646f9037%3A0xf64f33b1e327a3c3!2sPallavaram%20Railway%20Station!5e0!3m2!1sen!2sin!4v1715678000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="absolute inset-0 pointer-events-none border-y border-brand-maroon/10"></div>
    </section>
</x-app-layout>
