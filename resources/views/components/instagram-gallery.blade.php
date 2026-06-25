<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2">
    @foreach($items as $item)
        <div class="group relative aspect-square overflow-hidden bg-brand-green">
            <img src="{{ $item['image'] }}" alt="Gallery Item" class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:opacity-40">
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <a href="#" class="text-white text-[0.6rem] uppercase tracking-[0.4em] font-bold border border-white/20 px-6 py-2 hover:bg-white hover:text-brand-green transition-all">
                    View Post
                </a>
            </div>
        </div>
    @endforeach
</div>
