<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- SEO Meta Tags --}}
    <meta name="description" content="@yield('meta_description', 'Website Resmi BEM Universitas Sugeng Hartono. Wadah aspirasi, informasi berita, dan kegiatan mahasiswa Kabinet ASTAREKA.')">
    <meta name="keywords" content="BEM USH, Universitas Sugeng Hartono, Kabinet ASTAREKA, Mahasiswa, Aspirasi Mahasiswa, Berita Kampus">
    <meta name="author" content="BEM USH">
    <meta name="robots" content="index, follow">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', config('bem.nama_organisasi'))">
    <meta property="og:description" content="@yield('meta_description', 'Website Resmi BEM Universitas Sugeng Hartono.')">
    <meta property="og:image" content="@yield('meta_image', asset('img/LOGO ASTAREKA.png'))">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', config('bem.nama_organisasi'))">
    <meta property="twitter:description" content="@yield('meta_description', 'Website Resmi BEM Universitas Sugeng Hartono.')">
    <meta property="twitter:image" content="@yield('meta_image', asset('img/LOGO ASTAREKA.png'))">

    <title>@yield('title', config('bem.nama_organisasi'))</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LOGO ASTAREKA.png') }}">
    
    <!-- PWA -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0d6efd">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..700&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        {{-- Mengubah px-8 menjadi px-4 sm:px-8 untuk fleksibilitas mobile --}}
        <div class="flex justify-between items-center px-4 sm:px-8 py-4 max-w-[95%] mx-auto">
            <span class="text-lg sm:text-xl font-black text-primary tracking-tighter font-headline">{{ config('bem.logo_text') }}</span>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-4 lg:gap-8">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight text-sm lg:text-base">Beranda</a>
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight text-sm lg:text-base">Tentang Kami</a>
                <a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight text-sm lg:text-base">Berita & Event</a>
                <a href="{{ route('aspirasi.index') }}" class="{{ request()->routeIs('aspirasi.*') ? 'text-secondary border-b-2 border-secondary pb-1' : 'text-primary opacity-70 hover:opacity-100 transition-all' }} font-bold tracking-tight text-sm lg:text-base">Aspirasi</a>
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden md:block">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="bg-primary text-on-primary px-4 lg:px-6 py-2.5 rounded-xl font-headline font-bold text-xs lg:text-sm tracking-wide active:scale-95 duration-200">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="tracking-wide active:scale-95 duration-200"></a>
                @endauth
            </div>

            {{-- Burger Button (Mobile) --}}
            <button id="burger-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 rounded-xl hover:bg-surface-container transition-colors" aria-label="Toggle menu">
                <span id="burger-line-1" class="block w-5 h-0.5 bg-primary rounded-full transition-all duration-300"></span>
                <span id="burger-line-2" class="block w-5 h-0.5 bg-primary rounded-full transition-all duration-300"></span>
                <span id="burger-line-3" class="block w-5 h-0.5 bg-primary rounded-full transition-all duration-300"></span>
            </button>
        </div>

        {{-- Mobile Menu Dropdown --}}
        <div id="mobile-menu" class="md:hidden hidden flex-col px-4 sm:px-6 pb-6 pt-2 gap-1 bg-[#f8f9ff]/95 backdrop-blur-xl border-t border-outline-variant/10">
            <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-secondary bg-surface-container' : 'text-primary hover:bg-surface-container' }} flex items-center gap-3 px-4 py-3 rounded-xl font-bold tracking-tight transition-all text-sm">
                <span class="material-symbols-outlined text-base">home</span> Beranda
            </a>
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'text-secondary bg-surface-container' : 'text-primary hover:bg-surface-container' }} flex items-center gap-3 px-4 py-3 rounded-xl font-bold tracking-tight transition-all text-sm">
                <span class="material-symbols-outlined text-base">info</span> Tentang Kami
            </a>
            <a href="{{ route('berita.index') }}" class="{{ request()->routeIs('berita.*') ? 'text-secondary bg-surface-container' : 'text-primary hover:bg-surface-container' }} flex items-center gap-3 px-4 py-3 rounded-xl font-bold tracking-tight transition-all text-sm">
                <span class="material-symbols-outlined text-base">newspaper</span> Berita & Event
            </a>
            <a href="{{ route('aspirasi.index') }}" class="{{ request()->routeIs('aspirasi.*') ? 'text-secondary bg-surface-container' : 'text-primary hover:bg-surface-container' }} flex items-center gap-3 px-4 py-3 rounded-xl font-bold tracking-tight transition-all text-sm">
                <span class="material-symbols-outlined text-base">campaign</span> Aspirasi
            </a>
            <div class="mt-3 pt-3 border-t border-outline-variant/20">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-xl font-headline font-bold text-sm tracking-wide w-full active:scale-95 duration-200">
                        <span class="material-symbols-outlined text-base">dashboard</span> Dashboard
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="fixed top-24 right-4 sm:right-8 z-[60] bg-primary text-white p-4 rounded-xl editorial-shadow animate-bounce text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="w-full mt-20 bg-surface-container-low font-body text-sm tracking-wide">
        {{-- Mengubah px-12 menjadi px-4 sm:px-12 --}}
        <div class="flex flex-col md:flex-row justify-between items-start px-4 sm:px-12 py-12 sm:py-16 gap-12 w-full max-w-[95%] mx-auto">
            <div class="space-y-4 max-w-sm">
                <div class="text-lg font-bold text-primary font-headline">{{ config('bem.logo_text') }}</div>
                <p class="text-on-surface-variant opacity-80 leading-relaxed text-sm">
                    {{ config('bem.nama_organisasi') }} {{ config('bem.kabinet') }}. Menjadi garda terdepan dalam pelayanan dan advokasi mahasiswa.
                </p>
                <div class="flex gap-4">
                    <button 
                        x-data 
                        @click="
                            if (navigator.share) {
                                navigator.share({
                                    title: '{{ config('bem.nama_organisasi') }}',
                                    text: 'Kunjungi website kami!',
                                    url: window.location.href,
                                })
                            } else {
                                navigator.clipboard.writeText(window.location.href);
                                alert('Link website berhasil disalin!');
                            }
                        "
                        class="hover:text-secondary transition-colors text-primary flex items-center"
                        aria-label="Share website">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                    <a href="mailto:bemuniversitassugenghartono@gmail.com?subject=Pertanyaan%20seputar%20BEM%20USH" class="hover:text-secondary transition-colors text-primary">
                        <span class="material-symbols-outlined">alternate_email</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-12 w-full md:w-auto">
                <div class="space-y-4">
                    <h4 class="font-bold text-primary-container text-xs uppercase tracking-widest">Navigasi</h4>
                    <ul class="space-y-2 text-on-surface-variant opacity-80 text-sm">
                        <li><a href="{{ route('beranda') }}" class="hover:text-secondary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('berita.index') }}" class="hover:text-secondary transition-colors">Berita & Event</a></li>
                        <li><a href="{{ route('aspirasi.index') }}" class="hover:text-secondary transition-colors">Aspirasi</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-secondary transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="space-y-4">
                    <h4 class="font-bold text-primary-container text-xs uppercase tracking-widest">Hubungi Kami</h4>
                    <ul class="space-y-2 text-on-surface-variant opacity-80 text-sm">
                        <li><a href="https://www.instagram.com/bem.ush?igsh=aTNia2kxMm50emRt" class="hover:text-secondary transition-colors">Instagram</a></li>
                        <li><a href="https://www.linkedin.com/company/bem-universitas-sugeng-hartono/" class="hover:text-secondary transition-colors">LinkedIn</a></li>
                        <li><a href="https://youtube.com/@bem-kmuniversitassugenghartono?si=OT7EmZnAY1QWHREA" class="hover:text-secondary transition-colors">YouTube</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="px-4 sm:px-12 py-8 border-t border-outline-variant/10 text-center md:text-left text-on-surface-variant opacity-70 max-w-[95%] mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
            <p>© {{ config('bem.tahun') }} {{ config('bem.nama_organisasi') }} {{ config('bem.kabinet') }}. The Digital Curator.</p>
            <p class="opacity-50">Designed by Stevano.</p>
        </div>
    </footer>

    {{-- Burger Menu Script Tetap Sama --}}
    <script>
        const burgerBtn = document.getElementById('burger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const line1 = document.getElementById('burger-line-1');
        const line2 = document.getElementById('burger-line-2');
        const line3 = document.getElementById('burger-line-3');
        let isOpen = false;

        burgerBtn.addEventListener('click', () => {
            isOpen = !isOpen;
            if (isOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
                line1.classList.add('rotate-45', 'translate-y-2');
                line2.classList.add('opacity-0', 'scale-x-0');
                line3.classList.add('-rotate-45', '-translate-y-2');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                line1.classList.remove('rotate-45', 'translate-y-2');
                line2.classList.remove('opacity-0', 'scale-x-0');
                line3.classList.remove('-rotate-45', '-translate-y-2');
            }
        });

        document.addEventListener('click', (e) => {
            if (isOpen && !burgerBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                isOpen = false;
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                line1.classList.remove('rotate-45', 'translate-y-2');
                line2.classList.remove('opacity-0', 'scale-x-0');
                line3.classList.remove('-rotate-45', '-translate-y-2');
            }
        });
    </script>

    <!-- PWA Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => console.log('Service worker registered.', reg))
                    .catch(err => console.log('Service worker registration failed.', err));
            });
        }
    </script>

    @stack('scripts')
</body>
</html>