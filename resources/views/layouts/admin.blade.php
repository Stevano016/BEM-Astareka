<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ config('bem.logo_text') }}</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LOGO ASTAREKA.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..700&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-surface text-on-surface font-body">
    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-primary text-on-primary flex-shrink-0 flex flex-col sticky top-0 h-screen">
            <div class="p-8">
                <span class="text-2xl font-black font-headline tracking-tighter">{{ config('bem.logo_text') }}</span>
                <p class="text-xs opacity-50 uppercase tracking-widest mt-1">Admin Panel</p>
            </div>
            
            <nav class="mt-4 px-4 space-y-2 flex-1 overflow-y-auto pb-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">home</span>
                    <span class="font-bold">Dashboard</span>
                </a>
                <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.berita.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">newspaper</span>
                    <span class="font-bold">Berita</span>
                </a>
                <a href="{{ route('admin.aspirasi.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.aspirasi.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">campaign</span>
                    <span class="font-bold">Aspirasi</span>
                </a>
                <a href="{{ route('admin.hero.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.hero.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">image</span>
                    <span class="font-bold">Hero Banner</span>
                </a>
                <a href="{{ route('admin.program-kerja.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.program-kerja.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">hub</span>
                    <span class="font-bold">Program Kerja</span>
                </a>
                <a href="{{ route('admin.struktur.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.struktur.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">groups</span>
                    <span class="font-bold">Struktur</span>
                </a>
                <a href="{{ route('admin.kalender.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.kalender.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <span class="font-bold">Kalender</span>
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.profile.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">info</span>
                    <span class="font-bold">Profil BEM</span>
                </a>
            </nav>

            <div class="mt-auto p-8 border-t border-white/10 w-full">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-4 text-red-400 hover:text-red-300 font-bold w-full">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b border-outline/10 px-12 py-6 flex justify-between items-center">
                <h2 class="text-xl font-headline font-extrabold text-primary">@yield('page_title', 'Dashboard')</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-bold text-primary opacity-70">{{ auth()->user()->name }}</span>
                    <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-white font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="p-12">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-100 text-green-800 rounded-xl border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    @stack('scripts')

</body>
</html>