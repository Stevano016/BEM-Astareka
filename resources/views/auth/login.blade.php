<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('bem.logo_text') }}</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LOGO ASTAREKA.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..700&family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface font-body min-h-screen flex items-center justify-center p-8">
    <div class="w-full max-w-md bg-surface-container-lowest rounded-2xl p-12 shadow-xl border border-primary/5">
        <div class="text-center mb-10">
            <span class="text-primary font-headline font-black text-4xl tracking-tighter">{{ config('bem.logo_text') }}</span>
            <p class="text-sm font-bold text-primary/60 mt-2 uppercase tracking-widest">Admin Panel Login</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="text-xs font-semibold uppercase tracking-widest text-primary/60 mb-2 block">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                    class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-4 rounded-t-lg">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="text-xs font-semibold uppercase tracking-widest text-primary/60 mb-2 block">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-4 rounded-t-lg">
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-primary focus:ring-primary">
                <label for="remember_me" class="ml-2 text-sm text-primary/60 font-bold">Remember me</label>
            </div>

            <div>
                <button type="submit" class="w-full py-5 bg-primary text-on-primary rounded-xl font-headline font-bold text-lg hover:bg-primary/90 transition-all active:scale-95 duration-200">
                    Login to System
                </button>
            </div>
        </form>
        
        <div class="mt-8 text-center">
            <a href="{{ route('beranda') }}" class="text-sm text-primary/40 hover:text-primary transition-colors font-bold">← Back to Beranda</a>
        </div>
    </div>
</body>
</html>