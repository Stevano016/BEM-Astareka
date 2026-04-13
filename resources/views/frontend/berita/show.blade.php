@extends('layouts.app')

@section('content')
{{-- Gunakan max-w-[95%] agar sejajar dengan navbar, tapi konten artikel dibatasi agar nyaman dibaca --}}
<main class="pt-32 pb-24 max-w-[95%] mx-auto">
    
    {{-- Container artikel dinaikkan ke max-w-5xl (sebelumnya 4xl) agar sedikit lebih lebar tapi tetap ergonomis --}}
    <article class="max-w-5xl mx-auto px-8">
        
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

        @if($berita->gambar)
        {{-- Gambar dibuat lebar (aspect-video) agar terlihat sinematik di layar lebar --}}
        <div class="aspect-video rounded-3xl overflow-hidden editorial-shadow mb-12">
            <img src="{{ Storage::url($berita->gambar) }}" class="w-full h-full object-cover" alt="{{ $berita->judul }}">
        </div>
        @endif

        {{-- max-w-none pada prose agar mengikuti container 5xl --}}
        <div class="prose prose-lg max-w-none font-body text-on-surface-variant leading-relaxed space-y-6">
            {!! $berita->konten !!}
        </div>

        <footer class="mt-16 pt-8 border-t border-outline/10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4">
                <span class="text-sm font-bold text-primary opacity-40">Bagikan:</span>
                
                <div x-data class="flex gap-2">
                    <button 
                        @click="
                            if (navigator.share) {
                                navigator.share({
                                    title: '{{ $berita->judul ?? config('bem.nama_organisasi') }}',
                                    text: 'Baca selengkapnya di website kami!',
                                    url: window.location.href,
                                })
                            } else {
                                alert('Browser tidak mendukung fitur share.');
                            }
                        "
                        class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all"
                        title="Bagikan"
                    >
                        <span class="material-symbols-outlined text-sm">share</span>
                    </button>

                    <button 
                        @click="
                            navigator.clipboard.writeText(window.location.href);
                            alert('Link berita berhasil disalin ke clipboard!');
                        "
                        class="w-10 h-10 rounded-full bg-surface-container-low flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all"
                        title="Salin Tautan"
                    >
                        <span class="material-symbols-outlined text-sm">link</span>
                    </button>
                </div>
            </div>
            
            <div class="flex gap-4">
                <span class="px-4 py-2 bg-surface-container-low rounded-lg text-xs font-bold text-primary">{{ $berita->kategori }}</span>
            </div>
        </footer>
    </article>
</main>
@endsection