@extends('layouts.app')

@section('title', 'NexShop - Premium Multi-Vendor Marketplace')

@section('styles')
    <style>
        .hero-banner {
            background-image: linear-gradient(to bottom, rgba(15, 17, 21, 0.4), #0f1115), url('/images/ecommerce_hero_banner.png');
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden hero-banner min-h-[90vh] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/20 border border-purple-500/30 text-purple-300 text-sm font-medium mb-6 backdrop-blur-md">
                        <span class="w-2 h-2 rounded-full bg-purple-400 animate-pulse"></span>
                        NexShop Marketplace 2.0
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 leading-tight">
                        Discover & Shop <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500 neon-text-glow">Premium Vendors</span>
                    </h1>
                    <p class="mt-4 text-xl text-gray-300 mb-10 max-w-lg leading-relaxed">
                        The ultimate destination for unique products. Connect directly with independent creators and world-class brands.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#products" class="inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-white bg-purple-600 hover:bg-purple-700 shadow-lg shadow-purple-600/30 transition-all hover:scale-105">
                            Start Exploring
                        </a>
                        <a href="#" class="inline-flex justify-center items-center px-8 py-4 border border-gray-600 text-base font-medium rounded-full text-white bg-transparent hover:bg-white/5 transition-all">
                            Become a Vendor
                        </a>
                    </div>
                </div>
                
                <!-- Floating Stats/Cards Demo -->
                <div class="hidden lg:block relative h-full min-h-[400px]">
                    <div class="absolute top-10 right-10 glass-card p-6 rounded-2xl w-64 shadow-2xl z-20 animate-[bounce_8s_ease-in-out_infinite]">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Total Sales</p>
                                <p class="text-2xl font-bold font-mono">$1.2M+</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-700 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-green-500 w-3/4 h-full"></div>
                        </div>
                    </div>

                    <div class="absolute bottom-10 left-0 glass-card p-4 rounded-2xl w-48 shadow-2xl z-10 animate-[bounce_10s_ease-in-out_infinite_reverse]">
                        <p class="text-xs text-purple-400 font-semibold mb-1">Active Vendors</p>
                        <p class="text-4xl font-black">{{ $vendors->count() > 0 ? '1,000+' : '0' }}</p>
                        <div class="flex -space-x-2 mt-3">
                            <div class="w-8 h-8 rounded-full bg-gray-600 border-2 border-gray-900"></div>
                            <div class="w-8 h-8 rounded-full bg-gray-500 border-2 border-gray-900"></div>
                            <div class="w-8 h-8 rounded-full bg-gray-400 border-2 border-gray-900"></div>
                            <div class="w-8 h-8 rounded-full bg-purple-600 border-2 border-gray-900 flex items-center justify-center text-[10px] font-bold">+</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Categories -->
    <section class="py-20 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Browse by Category</h2>
                    <p class="text-gray-400">Find exactly what you're looking for</p>
                </div>
                <a href="#" class="text-purple-400 hover:text-purple-300 font-medium pb-1 flex items-center gap-1 group">
                    View All <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @forelse($categories as $category)
                <a href="#" class="glass-card rounded-2xl p-6 text-center group">
                    <div class="w-14 h-14 mx-auto bg-gray-800 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform group-hover:bg-purple-600/20">
                        <svg class="w-6 h-6 text-gray-400 group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <h3 class="font-medium text-gray-200 group-hover:text-white line-clamp-1">{{ $category->name }}</h3>
                </a>
                @empty
                <p class="text-gray-500 col-span-full">No categories found. Run seeders.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Trending Products -->
    <section id="products" class="py-20 bg-[#0a0c10] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-purple-500 font-semibold tracking-wider uppercase text-sm">Hottest Items</span>
                <h2 class="text-4xl font-bold mt-2">Trending Right Now</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col h-full">
                    <div class="relative aspect-square bg-gray-800 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                            <span class="text-4xl">🛍️</span>
                        </div>
                        
                        <div class="absolute top-4 left-4">
                            @if($product->status === 'active')
                            <span class="bg-green-500/20 text-green-400 text-xs font-bold px-3 py-1 rounded-full backdrop-blur-md border border-green-500/20">IN STOCK</span>
                            @endif
                        </div>
                        <button class="absolute top-4 right-4 p-2 rounded-full bg-black/50 text-white backdrop-blur-md hover:bg-purple-600 transition-colors opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="text-xs text-purple-400 font-medium mb-2">{{ $product->vendor->name ?? 'NexShop Partner' }}</div>
                        <h3 class="text-lg font-bold mb-2 line-clamp-1 group-hover:text-purple-400 transition-colors" title="{{ $product->name }}">
                            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-sm text-gray-400 line-clamp-2 mb-4 flex-grow">{{ $product->description }}</p>
                        
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/10">
                            <span class="text-2xl font-bold font-mono">${{ number_format($product->price, 2) }}</span>
                            <button class="flex items-center justify-center p-3 rounded-xl bg-white/5 hover:bg-purple-600 transition-colors text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 col-span-full text-center">No products found. Please run seeders.</p>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="/products" class="inline-flex justify-center items-center px-8 py-3 border border-gray-600 text-sm font-medium rounded-full text-white bg-transparent hover:bg-white/10 transition-all">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Vendors Section -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-900/20 rounded-full blur-[100px] -z-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                <div class="lg:pr-12">
                    <h2 class="text-4xl font-bold mb-6">Top Rated <br><span class="text-purple-400">Vendors</span></h2>
                    <p class="text-gray-400 mb-8 leading-relaxed">Shop directly from the highest-rated independent sellers and boutique brands. Quality guaranteed.</p>
                    <a href="#" class="inline-flex items-center text-white font-medium hover:text-purple-400 transition-colors group">
                        Explore Vendors Directory 
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @forelse($vendors as $vendor)
                    <div class="glass-card p-6 rounded-2xl flex items-center gap-6 group hover:bg-white/5 cursor-pointer">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-gray-700 to-gray-800 flex-shrink-0 flex items-center justify-center text-xl font-bold group-hover:scale-110 transition-transform shadow-lg">
                            {{ substr($vendor->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-white mb-1">{{ $vendor->name }}</h3>
                            <div class="flex items-center text-yellow-400 text-sm mb-2">
                                ★★★★★ <span class="text-gray-500 ml-2">(4.9)</span>
                            </div>
                            <span class="text-xs text-gray-400">{{ $vendor->email }}</span>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
