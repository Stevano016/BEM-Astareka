@extends('layouts.admin')

@section('page_title', 'Tulis Berita Baru')

@section('content')
<div class="max-w-4xl bg-white p-6 md:p-12 rounded-[2rem] shadow-sm border border-outline/5">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        {{-- Judul --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Judul Berita</label>
            <input type="text" name="judul" required value="{{ old('judul') }}"
                   placeholder="Masukkan judul berita yang menarik..." 
                   class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
            @error('judul') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- Kategori & Gambar: Grid Responsif --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Kategori</label>
                <div class="relative">
                    <select name="kategori" class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary appearance-none shadow-sm cursor-pointer">
                        <option value="Berita" {{ old('kategori') == 'Berita' ? 'selected' : '' }}>Berita</option>
                        <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Prestasi" {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-primary/40">expand_more</span>
                </div>
                @error('kategori') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
            </div>
            
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Gambar Sampul</label>
                <div class="relative group">
                    <input type="file" name="gambar" class="w-full bg-surface-container-low border-2 border-dashed border-outline/10 group-hover:border-primary/30 transition-all px-6 py-3.5 rounded-2xl font-bold text-primary/60 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-primary file:text-white hover:file:bg-primary-container cursor-pointer shadow-sm">
                </div>
                @error('gambar') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Ringkasan --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Ringkasan Singkat (Excerpt)</label>
            <textarea name="excerpt" rows="3" placeholder="Tuliskan ringkasan singkat untuk tampilan kartu berita..." 
                      class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">{{ old('excerpt') }}</textarea>
            @error('excerpt') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- Konten Utama --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Isi Konten Berita</label>
            <div class="prose-editor">
                <textarea name="konten" rows="15" class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm" id="editor">{{ old('konten') }}</textarea>
            </div>
            @error('konten') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- Checkbox Publish --}}
        <label class="flex items-center gap-4 p-4 bg-surface-container-low rounded-2xl cursor-pointer hover:bg-surface-container transition-colors group border border-transparent hover:border-outline/5 shadow-sm">
            <input type="checkbox" name="is_published" value="1" id="publish" {{ old('is_published') ? 'checked' : '' }} 
                   class="w-5 h-5 rounded-lg border-outline/20 text-primary focus:ring-primary/20 transition-all">
            <span class="text-sm font-black uppercase tracking-widest text-primary/60 group-hover:text-primary transition-colors">Publikasikan Langsung</span>
        </label>

        {{-- Action Buttons: Stacked on Mobile --}}
        <div class="flex flex-col sm:flex-row gap-4 pt-4">
            <button type="submit" class="w-full sm:w-auto flex-1 bg-primary text-white px-10 py-5 md:py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
                Simpan Berita
            </button>
            <a href="{{ route('admin.berita.index') }}" 
               class="w-full sm:w-auto px-10 py-5 md:py-4 rounded-2xl font-black uppercase tracking-widest text-xs text-primary/40 hover:text-primary hover:bg-surface-container-low text-center transition-all border border-transparent hover:border-outline/5">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
