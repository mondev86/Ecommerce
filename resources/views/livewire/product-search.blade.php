<div class="relative w-full max-w-md hidden lg:block">
    <div class="relative group">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 group-focus-within:text-purple-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input 
            wire:model.live.debounce.300ms="query"
            type="text" 
            class="block w-full pl-11 pr-4 py-2 bg-white/5 border border-white/10 rounded-full text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-purple-500/50 transition-all text-white backdrop-blur-md"
            placeholder="Search premium products..."
            autocomplete="off"
        >
    </div>

    <!-- Search Results Dropdown -->
    @if(strlen($query) >= 2)
        <div class="absolute mt-3 w-full glass-card rounded-[24px] shadow-2xl border-white/10 overflow-hidden z-[70] animate-in fade-in slide-in-from-top-2 duration-300">
            @if(count($results) > 0)
                <div class="p-2">
                    @foreach($results as $product)
                        <a href="/products/{{ $product->id }}" class="flex items-center gap-4 p-3 rounded-2xl hover:bg-white/5 transition group">
                            <div class="w-12 h-12 rounded-xl bg-gray-800 flex-shrink-0 flex items-center justify-center text-xl">
                                🛍️
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-sm font-bold text-white group-hover:text-purple-400 transition-colors">{{ $product->name }}</h4>
                                <p class="text-[10px] text-gray-500 line-clamp-1">${{ number_format($product->price, 2) }} • {{ $product->vendor->name ?? 'NexShop' }}</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endforeach
                </div>
                <div class="bg-white/3 p-3 text-center border-t border-white/5">
                    <a href="/products?search={{ $query }}" class="text-[10px] font-bold text-purple-400 uppercase tracking-widest hover:text-white transition">View all results</a>
                </div>
            @else
                <div class="p-8 text-center">
                    <p class="text-gray-400 text-sm">No products found for "<span class="text-white font-medium">{{ $query }}</span>"</p>
                </div>
            @endif
        </div>
    @endif
</div>
