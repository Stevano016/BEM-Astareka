@extends('layouts.app')

@section('content')
{{-- Menambahkan kontainer utama yang lebih lebar --}}
<main class="pt-24 sm:pt-32 pb-16 sm:pb-24 max-w-[95%] mx-auto">
    
    @if($featured)
    {{-- Featured News / Highlight Section --}}
    <section class="max-w-full mx-auto px-4 sm:px-8 mb-12 sm:mb-16">
        <div class="relative h-[350px] sm:h-[400px] md:h-[500px] rounded-3xl overflow-hidden editorial-shadow group">
            @if($featured->gambar)
                <img src="{{ Storage::url($featured->gambar) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $featured->judul }}">
            @else
                <div class="w-full h-full bg-primary/10"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-primary/40 to-transparent flex flex-col justify-end p-6 sm:p-12 lg:p-16">
                <div class="max-w-2xl space-y-4 sm:space-y-6">
                    <span class="inline-block px-3 py-1 sm:px-4 sm:py-1.5 bg-secondary text-white rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-widest">{{ $featured->kategori }}</span>
                    <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-headline font-extrabold text-white leading-tight tracking-tighter">{{ $featured->judul }}</h1>
                    <p class="text-white/80 text-sm sm:text-lg line-clamp-2 max-w-xl hidden sm:block">{{ $featured->excerpt }}</p>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 pt-2 sm:pt-4">
                        <a href="{{ route('berita.show', $featured->slug) }}" class="w-fit bg-white text-primary px-6 py-3 sm:px-8 sm:py-4 rounded-xl font-headline font-bold text-sm sm:text-base hover:bg-surface-container-high transition-all">Baca Selengkapnya</a>
                        <span class="text-white/60 font-bold text-xs sm:text-base">{{ $featured->published_at?->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Filter Section --}}
    <section class="max-w-full mx-auto px-4 sm:px-8 mb-8 sm:mb-12">
        <div class="bg-surface-container-low p-3 sm:p-4 rounded-2xl flex flex-col lg:flex-row justify-between gap-4 items-center">
            <form action="{{ route('berita.index') }}" method="GET" class="flex-1 w-full relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary/40 text-xl">search</span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita atau kegiatan..." 
                    class="w-full pl-11 pr-4 py-2.5 sm:py-3 bg-white border-0 rounded-xl focus:ring-2 focus:ring-primary/20 transition-all text-xs sm:text-sm font-bold">
            </form>
            <div class="flex gap-2 overflow-x-auto no-scrollbar pb-1 lg:pb-0 w-full lg:w-auto scroll-smooth">
                @foreach(['Semua', 'Berita', 'Kegiatan', 'Pengumuman', 'Prestasi', 'Lainnya'] as $cat)
                    <a href="{{ route('berita.index', ['kategori' => $cat]) }}" 
                        class="px-4 py-2 sm:px-6 sm:py-3 rounded-xl text-xs sm:text-sm font-bold whitespace-nowrap transition-all
                        {{ (request('kategori', 'Semua') == $cat) ? 'bg-primary text-white' : 'bg-white text-primary/60 hover:text-primary' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- News Grid & Sidebar Section --}}
    <section class="max-w-full mx-auto px-4 sm:px-8 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12">
        <div class="lg:col-span-8 space-y-10 lg:space-y-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($berita as $item)
                {{-- Jangan tampilkan berita yang sudah ada di featured --}}
                @if($featured && $item->id == $featured->id) @continue @endif
                
                <a href="{{ route('berita.show', $item->slug) }}" class="group block space-y-4 sm:space-y-6">
                    <div class="aspect-video rounded-2xl overflow-hidden bg-primary/5 relative">
                        @if($item->gambar)
                            <img src="{{ Storage::url($item->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $item->judul }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center opacity-10">
                                <span class="material-symbols-outlined text-5xl sm:text-6xl">newspaper</span>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                            <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-white/80 backdrop-blur-md rounded-lg text-[9px] sm:text-[10px] font-black uppercase tracking-widest text-primary">{{ $item->kategori }}</span>
                        </div>
                    </div>
                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex items-center gap-2 text-[10px] sm:text-xs font-bold text-secondary uppercase tracking-tighter">
                            <span>{{ $item->published_at?->format('d M Y') }}</span>
                            <span>•</span>
                            <span>Oleh Admin</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-headline font-extrabold text-primary leading-tight group-hover:text-secondary transition-colors">{{ $item->judul }}</h3>
                        <p class="text-on-surface-variant text-xs sm:text-sm leading-relaxed line-clamp-3">{{ $item->excerpt }}</p>
                    </div>
                </a>
                @empty
                <div class="col-span-1 md:col-span-2 py-16 sm:py-24 text-center">
                    <span class="material-symbols-outlined text-5xl sm:text-6xl text-primary/10 mb-4">search_off</span>
                    <p class="text-primary/40 font-bold text-sm sm:text-base">Tidak ada berita ditemukan.</p>
                </div>
                @endforelse
            </div>

            <div class="pt-8 sm:pt-12 border-t border-outline/10">
                {{ $berita->links() }}
            </div>
        </div>

        <aside class="lg:col-span-4 space-y-10 lg:space-y-12">
            <div class="space-y-6 sm:space-y-8">
                <h4 class="text-[10px] sm:text-xs font-black uppercase tracking-[0.2em] text-outline">Populer Minggu Ini</h4>
                <div class="space-y-5 sm:space-y-6">
                    @foreach($popular as $pop)
                    <a href="{{ route('berita.show', $pop->slug) }}" class="flex gap-4 group">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden flex-shrink-0 bg-primary/5">
                            @if($pop->gambar)
                                <img src="{{ Storage::url($pop->gambar) }}" class="w-full h-full object-cover" alt="{{ $pop->judul }}">
                            @endif
                        </div>
                        <div class="space-y-0.5 sm:space-y-1">
                            <h5 class="text-sm sm:text-base font-headline font-bold text-primary leading-tight line-clamp-2 group-hover:text-secondary transition-colors">{{ $pop->judul }}</h5>
                            <span class="text-[9px] sm:text-[10px] font-bold text-outline uppercase">{{ $pop->published_at?->format('M d, Y') }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-primary p-8 sm:p-10 rounded-3xl text-white space-y-4 sm:space-y-6 relative overflow-hidden">
                <div class="relative z-10 space-y-3 sm:space-y-4">
                    <span class="material-symbols-outlined text-secondary text-3xl sm:text-4xl">mail</span>
                    <h4 class="text-xl sm:text-2xl font-headline font-extrabold leading-tight">Berlangganan Newsletter</h4>
                    <p class="text-white/60 text-xs sm:text-sm leading-relaxed">Dapatkan update terbaru seputar kegiatan dan berita kampus langsung di emailmu.</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Anda" class="w-full bg-white/10 border-0 rounded-xl px-4 py-2.5 sm:py-3 text-xs sm:text-sm focus:ring-2 focus:ring-secondary/50 placeholder:text-white/30 text-white">
                        <button type="button" class="w-full bg-white text-primary py-2.5 sm:py-3 rounded-xl font-bold text-xs sm:text-sm hover:bg-secondary hover:text-white transition-all">Subscribe</button>
                    </form>
                </div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-secondary/20 rounded-full blur-3xl"></div>
            </div>
        </aside>
    </section>
</main>
@endsection
