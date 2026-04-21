@extends('layouts.app')

@section('title', $berita->judul . ' - ' . config('bem.nama_organisasi'))
@section('meta_description', Str::limit(strip_tags($berita->konten), 160))
@section('meta_keywords', $berita->kategori . ', ' . implode(', ', explode(' ', $berita->judul)) . ', BEM USH, Berita Kampus')

@section('content')
<main class="pt-24 md:pt-32 pb-24 bg-white">
    <article class="max-w-4xl mx-auto px-4 md:px-8">
        
        {{-- Navigasi Kembali --}}
        <nav class="mb-6">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1 text-sm font-bold text-primary opacity-40 hover:opacity-100 transition-opacity">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Berita
            </a>
        </nav>

        <header class="mb-8">
            {{-- Kategori --}}
            <div class="mb-3">
                <span class="text-xs font-black uppercase tracking-[0.2em] text-secondary">{{ $berita->kategori }}</span>
            </div>

            {{-- Judul Berita --}}
            <h1 class="text-3xl md:text-5xl font-headline font-extrabold text-primary leading-tight tracking-tighter mb-4">
                {{ $berita->judul }}
            </h1>

            {{-- Metadata Penulis & Tanggal --}}
            <div class="flex items-center gap-3 text-sm font-medium text-on-surface-variant border-b border-outline/10 pb-6">
                <div class="flex flex-col">
                    <span class="font-bold text-primary">Admin ASTAREKA</span>
                    <span class="opacity-60">{{ $berita->published_at?->translatedFormat('l, d F Y | H:i') ?? 'Baru saja' }} WIB</span>
                </div>
            </div>
        </header>

        {{-- Gambar Utama --}}
        @if($berita->gambar)
        <div class="-mx-4 md:mx-0 mb-8 overflow-hidden md:rounded-3xl shadow-lg">
            <img src="{{ Storage::url($berita->gambar) }}" 
                 class="w-full h-auto object-cover max-h-[550px]" 
                 alt="{{ $berita->judul }}">
            @if($berita->caption_gambar)
                <p class="px-4 md:px-0 mt-3 text-xs text-on-surface-variant italic text-center">{{ $berita->caption_gambar }}</p>
            @endif
        </div>
        @endif

        {{-- Konten Berita --}}
        <div class="prose max-w-none font-body 
                    prose-p:text-on-surface-variant prose-p:leading-relaxed prose-p:text-[1.1rem] md:prose-p:text-lg
                    prose-headings:text-primary prose-headings:font-headline prose-headings:font-bold
                    prose-strong:text-primary prose-strong:font-bold
                    prose-img:rounded-2xl">
            {!! $berita->konten !!}
        </div>

        {{-- Bagikan --}}
        <footer class="mt-12 pt-8 border-t border-outline/10">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                <div class="flex items-center gap-4" x-data>
                    <span class="text-xs font-black text-primary opacity-40 uppercase tracking-widest">Bagikan:</span>
                    <div class="flex gap-2">
                        <button 
                            @click="
                                if (navigator.share) {
                                    navigator.share({
                                        title: '{{ $berita->judul }}',
                                        text: 'Baca berita selengkapnya di ASTAREKA',
                                        url: window.location.href,
                                    })
                                } else {
                                    alert('Browser tidak mendukung fitur share.');
                                }
                            "
                            class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all shadow-sm"
                        >
                            <span class="material-symbols-outlined text-sm">share</span>
                        </button>
                        <button 
                            @click="
                                navigator.clipboard.writeText(window.location.href);
                                alert('Tautan berhasil disalin ke clipboard!');
                            "
                            class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all shadow-sm"
                        >
                            <span class="material-symbols-outlined text-sm">link</span>
                        </button>
                    </div>
                </div>

                <div class="flex gap-2">
                    <span class="px-4 py-2 bg-surface-container-low rounded-lg text-xs font-bold text-primary">#{{ $berita->kategori }}</span>
                </div>
            </div>
        </footer>

    </article>
</main>
@endsection