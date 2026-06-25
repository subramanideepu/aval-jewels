<div>
    @if ($successMessage)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 font-body text-sm" role="alert">
            <span class="block sm:inline">{{ $successMessage }}</span>
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold">Full Name</label>
                <input type="text" wire:model="name" class="w-full bg-brand-cream/30 border border-brand-gold/20 px-4 py-3 focus:outline-none focus:border-brand-gold transition-colors @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-[0.6rem] uppercase tracking-widest">{{ $message }}</span> @enderror
            </div>
            <div class="space-y-2">
                <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold">Email Address</label>
                <input type="email" wire:model="email" class="w-full bg-brand-cream/30 border border-brand-gold/20 px-4 py-3 focus:outline-none focus:border-brand-gold transition-colors @error('email') border-red-500 @enderror">
                @error('email') <span class="text-red-500 text-[0.6rem] uppercase tracking-widest">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold">Subject</label>
            <select wire:model="subject" class="w-full bg-brand-cream/30 border border-brand-gold/20 px-4 py-3 focus:outline-none focus:border-brand-gold transition-colors appearance-none @error('subject') border-red-500 @enderror">
                <option value="Inquiry about Collection">Inquiry about Collection</option>
                <option value="Bespoke Design Request">Bespoke Design Request</option>
                <option value="Store Visit Appointment">Store Visit Appointment</option>
                <option value="Other">Other</option>
            </select>
            @error('subject') <span class="text-red-500 text-[0.6rem] uppercase tracking-widest">{{ $message }}</span> @enderror
        </div>
        <div class="space-y-2">
            <label class="text-[0.6rem] uppercase tracking-widest text-brand-green/60 font-bold">Message</label>
            <textarea wire:model="message" rows="5" class="w-full bg-brand-cream/30 border border-brand-gold/20 px-4 py-3 focus:outline-none focus:border-brand-gold transition-colors @error('message') border-red-500 @enderror"></textarea>
            @error('message') <span class="text-red-500 text-[0.6rem] uppercase tracking-widest">{{ $message }}</span> @enderror
        </div>
        <button type="submit" wire:loading.attr="disabled" class="btn-gold !w-full flex items-center justify-center space-x-2">
            <span wire:loading.remove>Send Inquiry</span>
            <span wire:loading>Sending...</span>
        </button>
    </form>
</div>
