<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ config('bem.logo_text') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300..700&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        headline: ['Manrope', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        "primary": "#001e40",
                        "primary-container": "#003366",
                        "on-primary": "#ffffff",
                        "secondary": "#755b00",
                        "surface": "#f8f9ff",
                        "surface-container-low": "#eff4ff",
                        "on-surface": "#0b1c30",
                        "outline": "#737780",
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface text-on-surface font-body">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-on-primary flex-shrink-0 relative">
            <div class="p-8">
                <span class="text-2xl font-black font-headline tracking-tighter">{{ config('bem.logo_text') }}</span>
                <p class="text-xs opacity-50 uppercase tracking-widest mt-1">Admin Panel</p>
            </div>
            <nav class="mt-4 px-4 space-y-2">
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
                <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('admin.profile.*') ? 'bg-primary-container' : 'hover:bg-primary-container/50' }} transition-colors">
                    <span class="material-symbols-outlined">info</span>
                    <span class="font-bold">Profil BEM</span>
                </a>
            </nav>
            <div class="absolute bottom-8 px-8 w-64">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-4 text-red-400 hover:text-red-300 font-bold">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
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
    <script>
        if (document.getElementById('editor')) {
            var simplemde = new SimpleMDE({ element: document.getElementById("editor") });
        }
    </script>
</body>
</html>
