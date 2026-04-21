@extends('layouts.app')

@section('title', $product->name . ' - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-sm text-gray-400">
            <a href="/" class="hover:text-white transition">Home</a>
            <span class="mx-2">/</span>
            <a href="/products" class="hover:text-white transition">Products</a>
            <span class="mx-2">/</span>
            <span class="text-gray-200">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Product Image -->
            <div class="relative">
                <div class="glass-card rounded-3xl overflow-hidden aspect-square flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900 border-white/5">
                    <span class="text-9xl">🛍️</span>
                    
                    @if($product->quantity > 0)
                    <div class="absolute top-6 left-6">
                        <span class="bg-green-500/20 text-green-400 text-xs font-bold px-4 py-1.5 rounded-full backdrop-blur-md border border-green-500/20">IN STOCK</span>
                    </div>
                    @endif
                </div>
                
                <!-- Small Gallery Thumbnails (Static Placeholder) -->
                <div class="grid grid-cols-4 gap-4 mt-6">
                    @foreach(range(1, 4) as $i)
                    <div class="glass-card rounded-xl aspect-square flex items-center justify-center bg-gray-800/50 cursor-pointer hover:border-purple-500/50 transition">
                        <span class="text-xl opacity-50">🖼️</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Product Info -->
            <div class="flex flex-col">
                <div class="mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-purple-400 font-semibold tracking-wider uppercase text-xs">{{ $product->category->name ?? 'Uncategorized' }}</span>
                        <div class="flex items-center text-yellow-400 text-xs">
                            ★★★★★ <span class="text-gray-500 ml-2">(124 reviews)</span>
                        </div>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">{{ $product->name }}</h1>
                    <div class="flex items-baseline gap-4 mb-6">
                        <span class="text-4xl font-bold font-mono text-white">${{ number_format($product->price, 2) }}</span>
                    </div>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Action Buttons & Quantity (Livewire) -->
                <div class="mb-8">
                    @livewire('add-to-cart', ['product' => $product])
                </div>

                <!-- Vendor Info -->
                <div class="flex items-center gap-4 p-4 mb-8 glass-card rounded-2xl bg-white/3 border-white/5">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center font-bold">
                        {{ substr($product->vendor->name ?? 'N', 0, 1) }}
                    </div>
                    <div class="flex-grow">
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-widest">Sold by</p>
                        <p class="text-white font-bold">{{ $product->vendor->name ?? 'NexShop Official' }}</p>
                    </div>
                    <a href="/vendors/{{ $product->vendor_id }}" class="px-4 py-2 text-xs font-bold text-purple-400 hover:text-white transition">Visit Store</a>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-32">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold mb-2">You May Also Like</h2>
                    <p class="text-gray-400">Products from the same category</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $related)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col h-full">
                    <div class="relative aspect-square bg-gray-800 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🛍️</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors">
                            <a href="/products/{{ $related->id }}">{{ $related->name }}</a>
                        </h3>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-bold font-mono">${{ number_format($related->price, 2) }}</span>
                            <button class="p-2 rounded-lg bg-white/5 hover:bg-purple-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
