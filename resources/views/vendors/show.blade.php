@extends('layouts.app')

@section('title', $vendor->name . ' - NexShop Vendor')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Vendor Header -->
        <div class="glass-card rounded-[32px] p-8 md:p-12 mb-16 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-purple-600/10 rounded-full blur-[100px] -z-10 translate-x-1/2 -translate-y-1/2"></div>
            
            <div class="flex flex-col md:flex-row items-center gap-8 relative z-10">
                <div class="w-32 h-32 rounded-3xl bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center text-5xl font-bold shadow-2xl">
                    {{ substr($vendor->name, 0, 1) }}
                </div>
                <div class="text-center md:text-left flex-grow">
                    <div class="flex flex-wrap justify-center md:justify-start items-center gap-3 mb-4">
                        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">{{ $vendor->name }}</h1>
                        <span class="bg-purple-600/20 text-purple-400 text-xs font-bold px-3 py-1 rounded-full border border-purple-500/20">VERIFIED VENDOR</span>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-start items-center gap-6 text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-400">★★★★★</span>
                            <span class="text-sm font-medium">4.9 (2k+ reviews)</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-sm">{{ $vendor->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full md:w-auto">
                    <button class="px-8 py-3 bg-white/10 hover:bg-white/20 text-white rounded-full font-bold transition-all border border-white/10">Follow Store</button>
                    <button class="px-8 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-full font-bold transition-all">Message</button>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-6">
            <h2 class="text-3xl font-bold">Store <span class="text-purple-400">Collection</span></h2>
            <p class="text-gray-500">Showing all {{ $products->total() }} items</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($products as $product)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col h-full">
                    <div class="relative aspect-square bg-gray-800 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl opacity-50 group-hover:scale-110 transition-transform">🛍️</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors">
                            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-6 flex-grow">{{ $product->description }}</p>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-2xl font-bold font-mono text-white">${{ number_format($product->price, 2) }}</span>
                            <button class="p-2 rounded-xl bg-white/5 hover:bg-purple-600 transition-colors text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center glass-card rounded-3xl">
                    <h3 class="text-2xl font-bold text-white mb-2">This store is empty</h3>
                    <p class="text-gray-400">The vendor hasn't listed any products yet.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
