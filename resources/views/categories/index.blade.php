@extends('layouts.app')

@section('title', 'Product Categories - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4">Shop by <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Category</span></h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Find the perfect products organized by what you love.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($categories as $category)
            <a href="/product-categories/{{ $category->id }}" class="glass-card rounded-3xl p-8 text-center group flex flex-col items-center">
                <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform group-hover:bg-purple-600/20 border border-white/5">
                    <svg class="w-10 h-10 text-gray-400 group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-200 group-hover:text-white mb-2">{{ $category->name }}</h3>
                <span class="text-sm text-gray-500">{{ $category->products_count }} Products</span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
