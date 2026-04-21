<a href="/cart" class="text-gray-300 hover:text-white relative transition-colors">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
    @if($count > 0)
    <span class="absolute -top-1 -right-1 bg-purple-600 text-[10px] text-white font-bold px-1.5 py-0.5 rounded-full shadow-[0_0_10px_rgba(139,92,246,0.6)]">
        {{ $count }}
    </span>
    @endif
</a>
