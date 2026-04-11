@extends('layouts.admin')
@section('page_title', 'Hero Banner Settings')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf @method('PUT')
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Tagline (Kecil di atas judul)</label>
            <input type="text" name="tagline" value="{{ $hero->tagline }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Judul Utama</label>
                <input type="text" name="judul" value="{{ $hero->judul }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Kata Aksen (Warna Gold)</label>
                <input type="text" name="judul_aksen" value="{{ $hero->judul_aksen }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Deskripsi Hero</label>
            <textarea name="deskripsi" rows="3" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $hero->deskripsi }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">CTA 1 (Tombol Utama)</label>
                <input type="text" name="cta_text_1" value="{{ $hero->cta_text_1 }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">CTA 2 (Tombol Link)</label>
                <input type="text" name="cta_text_2" value="{{ $hero->cta_text_2 }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Background Image</label>
            @if($hero->gambar)
                <div class="mb-4 rounded-xl overflow-hidden h-32 w-64 bg-primary/5">
                    <img src="{{ Storage::url($hero->gambar) }}" class="w-full h-full object-cover">
                </div>
            @endif
            <input type="file" name="gambar" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
        </div>
        <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Konfigurasi</button>
    </form>
</div>
@endsection
