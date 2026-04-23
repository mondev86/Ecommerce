@extends('layouts.app')

@section('title', 'Our Vendors - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">Discover <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Premium Vendors</span></h1>
                <p class="text-gray-400 text-lg max-w-2xl">Connect with talented creators and world-class brands. Each vendor is hand-picked for quality and reliability.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($vendors as $vendor)
                <div class="glass-card rounded-2xl overflow-hidden group flex flex-col h-full border border-white/5 hover:border-purple-500/50 transition-all duration-300">
                    <div class="relative h-32 bg-gradient-to-r from-purple-900/40 to-blue-900/40">
                        <div class="absolute -bottom-10 left-6">
                            <div class="w-20 h-20 rounded-2xl bg-gray-900 border-4 border-[#0f1115] flex items-center justify-center text-3xl font-bold text-white shadow-xl group-hover:scale-105 transition-transform">
                                {{ substr($vendor->name, 0, 1) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-14 p-6 flex flex-col flex-grow">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition-colors">
                                <a href="{{ route('vendors.show', $vendor) }}">{{ $vendor->name }}</a>
                            </h3>
                            <div class="flex items-center text-yellow-500 text-sm">
                                ★★★★★
                            </div>
                        </div>
                        
                        <p class="text-sm text-gray-400 mb-6 flex-grow line-clamp-2">
                            Independent vendor specializing in premium quality products. Trusted member of the NexShop community.
                        </p>
                        
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Contact</span>
                                <span class="text-sm text-gray-300">{{ $vendor->email }}</span>
                            </div>
                            <a href="{{ route('vendors.show', $vendor) }}" class="p-2 rounded-xl bg-white/5 hover:bg-purple-600 transition-colors text-white group/btn">
                                <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center glass-card rounded-3xl">
                    <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">No vendors found</h3>
                    <p class="text-gray-400 mb-8 max-w-sm mx-auto">We couldn't find any vendors at the moment. Try running the database seeders.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 custom-pagination">
            {{ $vendors->links() }}
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
