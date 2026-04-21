@extends('layouts.app')

@section('title', 'Sign In - NexShop')

@section('content')
<div class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-[120px] -z-10"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[120px] -z-10"></div>

    <div class="max-w-md w-full">
        <div class="glass-card rounded-[40px] p-10 relative overflow-hidden">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center mx-auto mb-6 shadow-2xl">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h2 class="text-3xl font-black tracking-tight text-white mb-2">Welcome Back</h2>
                <p class="text-gray-500 text-sm">Enter your credentials to access your account</p>
            </div>

            <!-- Session Status -->
            @if(session('status'))
                <div class="mb-6 p-4 rounded-2xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="block w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-purple-500/50 transition-all text-sm">
                    @error('email')
                        <p class="mt-2 text-xs text-red-400 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <div class="flex justify-between items-center mb-2 ml-1">
                        <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-purple-400 hover:text-white transition">Forgot?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-purple-500/50 transition-all text-sm">
                    @error('password')
                        <p class="mt-2 text-xs text-red-400 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Math Captcha -->
                <div class="p-6 rounded-2xl bg-purple-600/5 border border-purple-500/10">
                    <label for="captcha" class="block text-xs font-bold text-purple-400 uppercase tracking-widest mb-3 ml-1">Security Challenge: Solve this</label>
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-2 bg-white/5 rounded-xl border border-white/10 font-mono text-lg text-white">
                            {{ $n1 }} + {{ $n2 }} =
                        </div>
                        <input id="captcha" type="number" name="captcha" required
                            class="block w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500/50 focus:border-purple-500/50 transition-all text-sm"
                            placeholder="?">
                    </div>
                    @error('captcha')
                        <p class="mt-2 text-xs text-red-400 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center ml-1">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded-lg bg-white/5 border-white/10 text-purple-600 focus:ring-purple-500/50 transition cursor-pointer">
                    <label for="remember_me" class="ml-3 text-sm text-gray-500 cursor-pointer hover:text-gray-400 transition">Keep me signed in</label>
                </div>

                <button type="submit" class="w-full py-4 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white rounded-2xl font-bold transition-all transform hover:scale-[1.02] shadow-xl shadow-purple-600/20 active:scale-[0.98]">
                    Sign In to NexShop
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-10 pt-8 border-t border-white/5 text-center">
                <p class="text-sm text-gray-500">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-bold text-white hover:text-purple-400 transition ml-1">Create account</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
