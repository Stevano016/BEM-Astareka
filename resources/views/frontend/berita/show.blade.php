@extends('layouts.app')

@section('content')
<main class="pt-32 pb-24">
    <article class="max-w-4xl mx-auto px-8">
        <!-- Header -->
        <header class="space-y-8 mb-12 text-center">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-primary/40 hover:text-primary font-bold transition-colors">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali ke Berita
            </a>
            <div class="space-y-4">
                <span class="text-xs font-black uppercase tracking-[0.2em] text-secondary">{{ $berita->kategori }} • {{ $berita->published_at?->format('d M Y') }}</span>
                <h1 class="text-4xl md:text-6xl font-headline font-extrabold text-primary leading-tight tracking-tighter">{{ $berita->judul }}</h1>
                <div class="flex items-center justify-center gap-4 text-sm font-bold text-primary/60">
                    <span>Oleh Admin ASTAREKA</span>
                    <span>•</span>
                    <span>5 Menit Baca</span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($berita->gambar)
        <div class="aspect-video rounded-3xl overflow-hidden editorial-shadow mb-12">
            <img src="{{ Storage::url($berita->gambar) }}" class="w-full h-full object-cover" alt="{{ $berita->judul }}">
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg max-w-none font-body text-on-surface-variant leading-relaxed space-y-6">
            {!! $berita->konten !!}
        </div>

        <!-- Share -->
        <footer class="mt-16 pt-8 border-t border-outline/10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4">
                <span class="text-sm font-bold text-primary opacity-40">Bagikan:</span>
                <div class="flex gap-2">
                    <button class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all"><span class="material-symbols-outlined text-sm">share</span></button>
                    <button class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all"><span class="material-symbols-outlined text-sm">link</span></button>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="px-4 py-2 bg-surface-container-low rounded-lg text-xs font-bold text-primary">{{ $berita->kategori }}</span>
            </div>
        </footer>
    </article>
</main>
@endsection
