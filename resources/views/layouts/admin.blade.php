<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ config('bem.logo_text') }}</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LOGO ASTAREKA.png') }}">

    <!-- PWA -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0d6efd">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..700&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    <style>
        [x-cloak] { display: none !important; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-surface text-on-surface font-body">
    <div class="flex h-screen overflow-hidden relative" x-data="{ sidebarOpen: false }">
        
        <!-- Backdrop Mobile -->
        <div x-show="sidebarOpen" 
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-primary/40 backdrop-blur-sm z-40 lg:hidden">
        </div>

        <!-- Sidebar aside -->
        <aside 
            class="fixed lg:static top-0 left-0 w-64 bg-primary text-on-primary flex-shrink-0 flex flex-col h-full z-50 transition-transform lg:transition-none duration-300 ease-in-out"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
            x-cloak>
            {{-- Bagian Sidebar tetap sama (telah diperbaiki sebelumnya) --}}
            <div class="p-8 flex justify-between items-center shrink-0">
                <div>
                    <span class="text-2xl font-black font-headline tracking-tighter">{{ config('bem.logo_text') }}</span>
                    <p class="text-xs opacity-50 uppercase tracking-widest mt-1">Admin Panel</p>
                </div>
                <button @click.stop="sidebarOpen = false" class="lg:hidden text-white">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <nav class="mt-4 px-4 space-y-2 flex-1 overflow-y-auto scrollbar-hide">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">home</span>
                    <span class="font-bold">Dashboard</span>
                </a>

                @if(auth()->user()->isAdmin() || auth()->user()->isSekretaris())
                <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.berita.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">newspaper</span>
                    <span class="font-bold">Berita</span>
                </a>
                @endif

                @if(auth()->user()->isAdmin() || auth()->user()->isMendagri())
                <a href="{{ route('admin.aspirasi.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.aspirasi.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">campaign</span>
                    <span class="font-bold">Aspirasi</span>
                </a>
                @endif

                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.hero.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.hero.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">image</span>
                    <span class="font-bold">Hero Banner</span>
                </a>
                @endif

                @if(auth()->user()->isAdmin() || auth()->user()->isSekretaris())
                <a href="{{ route('admin.program-kerja.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.program-kerja.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">hub</span>
                    <span class="font-bold">Program Kerja</span>
                </a>
                @endif

                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.struktur.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.struktur.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">groups</span>
                    <span class="font-bold">Struktur</span>
                </a>
                @endif

                @if(auth()->user()->isAdmin() || auth()->user()->isSekretaris())
                <a href="{{ route('admin.kalender.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.kalender.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <span class="font-bold">Kalender</span>
                </a>
                @endif

                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.profile.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">info</span>
                    <span class="font-bold">Profil BEM</span>
                </a>
                @endif
            </nav>

            <div class="p-8 border-t border-white/10 w-full shrink-0 bg-primary">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-4 text-red-400 hover:text-red-300 font-bold w-full active:scale-95 transition-all">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Area -->
        <main class="flex-1 flex flex-col min-w-0 bg-surface">
            <!-- Fixed Header -->
            <header class="bg-white border-b border-outline/10 px-6 lg:px-12 py-6 flex justify-between items-center shrink-0 z-30 shadow-sm">
                <div class="flex items-center gap-4">
                    <button @click.stop="sidebarOpen = true" class="lg:hidden text-primary p-2 -ml-2">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h2 class="text-lg lg:text-xl font-headline font-extrabold text-primary truncate uppercase tracking-tight">@yield('page_title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-primary leading-none">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] font-bold text-secondary uppercase tracking-widest mt-1">{{ auth()->user()->role }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-white font-bold flex-shrink-0 border-2 border-surface shadow-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Scrollable Content Area -->
            <div class="flex-1 overflow-y-auto p-6 lg:p-12 scroll-smooth">
                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-100 text-green-800 rounded-xl border border-green-200 flex items-center gap-3">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="font-bold text-sm">{{ session('success') }}</span>
                    </div>
                @endif

                @yield('content')
                
                {{-- Footer Area (Optional) --}}
                <div class="mt-20 pt-8 border-t border-outline/5 text-center">
                    <p class="text-[10px] font-bold text-outline uppercase tracking-[0.2em]">&copy; {{ date('Y') }} {{ config('bem.logo_text') }} • Admin Management System</p>
                </div>
            </div>
        </main>
    </div>
    @stack('scripts')

    <!-- PWA Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => console.log('Admin Service worker registered.', reg))
                    .catch(err => console.log('Admin Service worker registration failed.', err));
            });
        }
    </script>

</body>
</html>