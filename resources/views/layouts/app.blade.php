<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('bem.nama_organisasi'))</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..700&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        headline: ['Manrope', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                        label: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        "primary": "#001e40",
                        "primary-container": "#003366",
                        "primary-fixed": "#d5e3ff",
                        "primary-fixed-dim": "#a7c8ff",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#799dd6",
                        "on-primary-fixed": "#001b3c",
                        "on-primary-fixed-variant": "#1f477b",
                        "secondary": "#755b00",
                        "secondary-container": "#ffd660",
                        "secondary-fixed": "#ffe08e",
                        "secondary-fixed-dim": "#eac24e",
                        "on-secondary": "#ffffff",
                        "on-secondary-container": "#755c00",
                        "on-secondary-fixed": "#241a00",
                        "on-secondary-fixed-variant": "#584400",
                        "tertiary": "#001e42",
                        "tertiary-container": "#003368",
                        "tertiary-fixed": "#d6e3ff",
                        "tertiary-fixed-dim": "#a8c8ff",
                        "on-tertiary": "#ffffff",
                        "on-tertiary-container": "#739de0",
                        "on-tertiary-fixed": "#001b3d",
                        "on-tertiary-fixed-variant": "#134684",
                        "surface": "#f8f9ff",
                        "surface-bright": "#f8f9ff",
                        "surface-dim": "#cbdbf5",
                        "surface-variant": "#d3e4fe",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#eff4ff",
                        "surface-container": "#e5eeff",
                        "surface-container-high": "#dce9ff",
                        "surface-container-highest": "#d3e4fe",
                        "surface-tint": "#3a5f94",
                        "on-surface": "#0b1c30",
                        "on-surface-variant": "#43474f",
                        "on-background": "#0b1c30",
                        "background": "#f8f9ff",
                        "outline": "#737780",
                        "outline-variant": "#c3c6d1",
                        "inverse-surface": "#213145",
                        "inverse-on-surface": "#eaf1ff",
                        "inverse-primary": "#a7c8ff",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "on-error": "#ffffff",
                        "on-error-container": "#93000a",
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    }
                }
            }
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        .glass-effect { backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
        .editorial-shadow { box-shadow: 0 20px 40px rgba(11,28,48,0.06); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .line-clamp-2 { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
    </style>
    
    <link rel="stylesheet" href="{{ asset('css/astareka-custom.css') }}">
</head>
<body class="bg-surface text-on-surface font-body selection:bg-secondary-container selection:text-on-secondary-container">
    
    <nav class="fixed top-0 w-full z-50 bg-[#f8f9ff]/80 backdrop-blur-xl border-b border-outline-variant/10">
        <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
            <span class="text-xl font-black text-primary tracking-tighter font-headline">{{ config('bem.logo_text') }}</span>
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Beranda</a>
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Tentang Kami</a>
                <a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Berita & Event</a>
                <a href="{{ route('aspirasi.index') }}" class="{{ request()->routeIs('aspirasi.*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight">Aspirasi</a>
            </div>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-headline font-bold text-sm tracking-wide active:scale-95 duration-200">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-headline font-bold text-sm tracking-wide active:scale-95 duration-200">Login</a>
            @endauth
        </div>
    </nav>

    @if(session('success'))
        <div class="fixed top-24 right-8 z-[60] bg-primary text-white p-4 rounded-xl editorial-shadow animate-bounce">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="w-full mt-20 bg-surface-container-low font-body text-sm tracking-wide">
        <div class="flex flex-col md:flex-row justify-between items-start px-12 py-16 gap-8 w-full max-w-7xl mx-auto">
            <div class="space-y-4 max-w-sm">
                <div class="text-lg font-bold text-primary font-headline">{{ config('bem.logo_text') }}</div>
                <p class="text-on-surface-variant opacity-80 leading-relaxed">
                    {{ config('bem.nama_organisasi') }} {{ config('bem.kabinet') }}. Menjadi garda terdepan dalam pelayanan dan advokasi mahasiswa.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-secondary transition-colors text-primary"><span class="material-symbols-outlined">share</span></a>
                    <a href="#" class="hover:text-secondary transition-colors text-primary"><span class="material-symbols-outlined">alternate_email</span></a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-12">
                <div class="space-y-4">
                    <h4 class="font-bold text-primary-container text-xs uppercase tracking-widest">Navigasi</h4>
                    <ul class="space-y-2 text-on-surface-variant opacity-80">
                        <li><a href="{{ route('beranda') }}" class="hover:text-secondary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('berita.index') }}" class="hover:text-secondary transition-colors">Berita & Event</a></li>
                        <li><a href="{{ route('aspirasi.index') }}" class="hover:text-secondary transition-colors">Aspirasi</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-secondary transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h4 class="font-bold text-primary-container text-xs uppercase tracking-widest">Hubungi Kami</h4>
                    <ul class="space-y-2 text-on-surface-variant opacity-80">
                        <li><a href="#" class="hover:text-secondary transition-colors">Instagram</a></li>
                        <li><a href="#" class="hover:text-secondary transition-colors">LinkedIn</a></li>
                        <li><a href="#" class="hover:text-secondary transition-colors">YouTube</a></li>
                        <li><a href="#" class="hover:text-secondary transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="px-12 py-8 border-t border-outline-variant/10 text-center md:text-left text-on-surface-variant opacity-70 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <p>© {{ config('bem.tahun') }} {{ config('bem.nama_organisasi') }} {{ config('bem.kabinet') }}. The Digital Curator.</p>
            <p class="opacity-50">Designed for Excellence.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
