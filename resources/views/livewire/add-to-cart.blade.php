<div>
    <div class="flex flex-col gap-4">
        <div class="flex items-center gap-4">
            <div class="flex items-center bg-white/5 border border-white/10 rounded-full px-4 py-2">
                <button wire:click="$decrement('quantity')" class="text-gray-400 hover:text-white transition p-1" @if($quantity <= 1) disabled @endif>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                </button>
                <input type="number" wire:model="quantity" class="bg-transparent border-none text-center w-12 text-white font-bold focus:ring-0" readonly>
                <button wire:click="$increment('quantity')" class="text-gray-400 hover:text-white transition p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </button>
            </div>
            <span class="text-xs text-gray-500">{{ $product->quantity }} units available</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <button wire:click="addToCart" wire:loading.attr="disabled" class="flex items-center justify-center px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white rounded-full font-bold transition-all transform hover:scale-[1.02] shadow-lg shadow-purple-600/20 disabled:opacity-50">
                <span wire:loading.remove>
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Add to Cart
                </span>
                <span wire:loading>
                    <svg class="animate-spin h-5 w-5 mr-3 inline" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Adding...
                </span>
            </button>
            <button class="flex items-center justify-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-full font-bold transition-all border border-white/10">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                Wishlist
            </button>
        </div>
    </div>
</div>
