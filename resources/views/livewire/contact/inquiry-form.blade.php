<div class="bg-white p-12 md:p-20 shadow-2xl relative">
    <div class="absolute top-0 left-0 w-2 h-full bg-brand-gold"></div>
    
    <div class="mb-12">
        <h2 class="text-4xl font-heading text-brand-maroon mb-4">Send an Inquiry</h2>
        <p class="text-brand-maroon/60 font-body">Our concierge team is at your service for bespoke requests and consultations.</p>
    </div>

    @if ($successMessage)
        <div class="mb-10 p-6 bg-brand-gold/10 border border-brand-gold/20 text-brand-maroon text-sm font-bold uppercase tracking-widest animate-pulse">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-[0.6rem] uppercase tracking-[0.3em] font-bold text-brand-maroon/40">Full Name</label>
                <input type="text" wire:model="name" class="w-full bg-transparent border-b border-brand-maroon/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-maroon">
                @error('name') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
            </div>
            <div class="space-y-2">
                <label class="text-[0.6rem] uppercase tracking-[0.3em] font-bold text-brand-maroon/40">Email Address</label>
                <input type="email" wire:model="email" class="w-full bg-transparent border-b border-brand-maroon/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-maroon">
                @error('email') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-[0.6rem] uppercase tracking-[0.3em] font-bold text-brand-maroon/40">Subject</label>
            <select wire:model="subject" class="w-full bg-transparent border-b border-brand-maroon/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-maroon appearance-none">
                <option value="">Select Subject</option>
                <option value="Bespoke Design">Bespoke Design</option>
                <option value="Bridal Consultation">Bridal Consultation</option>
                <option value="Product Inquiry">Product Inquiry</option>
                <option value="After Sales Service">After Sales Service</option>
            </select>
            @error('subject') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
        </div>

        <div class="space-y-2">
            <label class="text-[0.6rem] uppercase tracking-[0.3em] font-bold text-brand-maroon/40">Your Message</label>
            <textarea wire:model="message" rows="4" class="w-full bg-transparent border-b border-brand-maroon/10 py-3 focus:outline-none focus:border-brand-gold transition-colors font-body text-brand-maroon resize-none"></textarea>
            @error('message') <span class="text-[0.6rem] text-red-600 uppercase tracking-widest">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-gold !w-full md:!w-auto justify-center group overflow-hidden">
            <span wire:loading.remove>Send Inquiry</span>
            <span wire:loading>Sending...</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-4 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </button>
    </form>
</div>
