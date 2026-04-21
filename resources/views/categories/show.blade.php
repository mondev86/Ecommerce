@extends('layouts.app')

@section('title', $category->name . ' - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <nav class="flex mb-4 text-sm text-gray-400">
                <a href="/" class="hover:text-white transition">Home</a>
                <span class="mx-2">/</span>
                <a href="/product-categories" class="hover:text-white transition">Categories</a>
                <span class="mx-2">/</span>
                <span class="text-gray-200">{{ $category->name }}</span>
            </nav>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">Category: <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">{{ $category->name }}</span></h1>
            <p class="text-gray-400 text-lg">Showing products for {{ $category->name }}.</p>
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
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-bold text-purple-400 uppercase tracking-widest">{{ $product->vendor->name ?? 'NexShop' }}</span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors">
                            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-6 flex-grow">{{ $product->description }}</p>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-2xl font-bold font-mono text-white">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center glass-card rounded-3xl">
                    <h3 class="text-2xl font-bold text-white mb-2">No products in this category</h3>
                    <p class="text-gray-400">Discover other categories or check back later.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
