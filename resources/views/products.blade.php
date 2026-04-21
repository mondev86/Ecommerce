@extends('layouts.app')

@section('title', 'Browse Products - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">Discover <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Products</span></h1>
                <p class="text-gray-400 text-lg max-w-2xl">Explore our vast collection of unique items from independent vendors around the world.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="relative">
                    <select class="appearance-none bg-white/5 border border-white/10 rounded-full px-6 py-3 text-sm font-medium text-gray-300 hover:bg-white/10 transition cursor-pointer pr-10 focus:outline-none focus:border-purple-500">
                        <option>Newest Arrivals</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Most Popular</option>
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($products as $product)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col h-full">
                    <div class="relative aspect-square bg-gray-800 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl opacity-50 group-hover:scale-110 transition-transform">🛍️</span>
                        </div>
                        
                        <div class="absolute top-4 left-4">
                            @if($product->quantity > 0)
                            <span class="bg-green-500/20 text-green-400 text-[10px] font-bold px-2 py-0.5 rounded-full backdrop-blur-md border border-green-500/10 uppercase">In Stock</span>
                            @else
                            <span class="bg-red-500/20 text-red-400 text-[10px] font-bold px-2 py-0.5 rounded-full backdrop-blur-md border border-red-500/10 uppercase">Sold Out</span>
                            @endif
                        </div>

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3 backdrop-blur-[2px]">
                            <a href="/products/{{ $product->id }}" class="p-3 rounded-full bg-white text-black hover:bg-purple-600 hover:text-white transition transform translate-y-4 group-hover:translate-y-0 duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                            <button class="p-3 rounded-full bg-purple-600 text-white hover:bg-purple-700 transition transform translate-y-4 group-hover:translate-y-0 duration-300 delay-75">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-bold text-purple-400 uppercase tracking-widest">{{ $product->vendor->name ?? 'NexShop' }}</span>
                            <div class="flex items-center text-yellow-500 text-[10px]">
                                ★★★★☆
                            </div>
                        </div>
                        <h3 class="text-lg font-bold mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors">
                            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-6 flex-grow">{{ $product->description }}</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-2xl font-bold font-mono text-white">${{ number_format($product->price, 2) }}</span>
                            <span class="text-[10px] text-gray-600 font-mono">QTY: {{ $product->quantity }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center glass-card rounded-3xl">
                    <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">No products found</h3>
                    <p class="text-gray-400 mb-8 max-w-sm mx-auto">We couldn't find any products at the moment. Try running the database seeders.</p>
                    <code>php artisan db:seed</code>
                </div>
            @endforelse
        </div>

        <div class="mt-16 custom-pagination">
            {{ $products->links() }}
        </div>
    </div>
</div>

<style>
    /* Pagination Overrides for dark theme */
    .custom-pagination nav [role="navigation"] {
        @apply flex justify-center;
    }
    .custom-pagination .relative.inline-flex.items-center {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #9ca3af;
        @apply rounded-xl mx-1;
    }
    .custom-pagination .relative.inline-flex.items-center:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }
    .custom-pagination span[aria-current="page"] .relative.inline-flex.items-center {
        background: #9333ea;
        color: white;
        border-color: #9333ea;
    }
</style>
@endsection
