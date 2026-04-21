@extends('layouts.admin')

@section('page_title', 'Hero Banner Settings')

@section('content')
<div class="max-w-4xl bg-white p-6 md:p-12 rounded-[2rem] shadow-sm border border-outline/5">
    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf @method('PUT')
        
        {{-- Tagline --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Tagline (Kecil di atas judul)</label>
            <input type="text" name="tagline" value="{{ $hero->tagline }}" 
                   class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
        </div>

        {{-- Judul: Grid Responsif --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Judul Utama</label>
                <input type="text" name="judul" value="{{ $hero->judul }}" 
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
            </div>
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Kata Aksen (Warna Gold)</label>
                <input type="text" name="judul_aksen" value="{{ $hero->judul_aksen }}" 
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Deskripsi Hero</label>
            <textarea name="deskripsi" rows="3" 
                      class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">{{ $hero->deskripsi }}</textarea>
        </div>

        {{-- CTA: Grid Responsif --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">CTA 1 (Tombol Utama)</label>
                <input type="text" name="cta_text_1" value="{{ $hero->cta_text_1 }}" 
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
            </div>
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">CTA 2 (Tombol Link)</label>
                <input type="text" name="cta_text_2" value="{{ $hero->cta_text_2 }}" 
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
            </div>
        </div>

        {{-- Background Image --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Background Image</label>
            @if($hero->gambar)
                <div class="mb-4 rounded-3xl overflow-hidden h-40 md:h-56 w-full bg-primary/5 border border-outline/10 shadow-inner">
                    <img src="{{ Storage::url($hero->gambar) }}" class="w-full h-full object-cover">
                </div>
            @endif
            <div class="relative group">
                <input type="file" name="gambar" 
                       class="w-full bg-surface-container-low border-2 border-dashed border-outline/10 group-hover:border-primary/30 transition-all px-6 py-3.5 rounded-2xl font-bold text-primary/60 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-primary file:text-white hover:file:bg-primary-container cursor-pointer shadow-sm">
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="pt-4">
            <button type="submit" 
                    class="w-full md:w-auto px-10 py-5 md:py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
                Simpan Konfigurasi Hero
            </button>
        </div>
    </form>
</div>
@endsection
