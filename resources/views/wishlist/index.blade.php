@extends('layouts.app')

@section('title', 'My Wishlist - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight mb-12">My <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Wishlist</span></h1>

        @if($wishlistItems->isEmpty())
            <div class="glass-card rounded-[32px] p-20 text-center">
                <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                    💖
                </div>
                <h2 class="text-2xl font-bold mb-4">Your wishlist is empty</h2>
                <p class="text-gray-400 mb-8 max-w-sm mx-auto">Save items you like for later and they will appear here!</p>
                <a href="/products" class="inline-flex px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white rounded-full font-bold transition-all">Start Exploring</a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($wishlistItems as $item)
                <div class="glass-card rounded-[32px] p-4 group hover-scale border-white/5 relative">
                    <div class="aspect-square rounded-[24px] bg-gray-800 flex items-center justify-center text-5xl mb-6 relative overflow-hidden">
                        🛍️
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
                             <form action="/cart/{{ $item->product->id }}" method="POST">
                                @csrf
                                <button type="submit" class="p-4 bg-purple-600 hover:bg-purple-700 text-white rounded-full transition-transform hover:scale-110">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                </button>
                            </form>
                             <form action="/wishlist/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-4 bg-red-600/80 hover:bg-red-600 text-white rounded-full transition-transform hover:scale-110">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="px-2 pb-2">
                        <p class="text-[10px] font-bold text-purple-400 uppercase tracking-widest mb-1">{{ $item->product->vendor->name ?? 'NexShop' }}</p>
                        <h3 class="text-white font-bold mb-2 truncate">{{ $item->product->name }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-black text-white font-mono">${{ number_format($item->product->price, 2) }}</span>
                            <span class="text-xs text-gray-500 font-medium">In Stock</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
