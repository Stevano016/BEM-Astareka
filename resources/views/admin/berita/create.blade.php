@extends('layouts.admin')
@section('page_title', 'Tulis Berita Baru')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Judul Berita</label>
            <input type="text" name="judul" required placeholder="Masukkan judul berita..." class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Kategori</label>
                <select name="kategori" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                    <option value="Berita">Berita</option>
                    <option value="Kegiatan">Kegiatan</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Prestasi">Prestasi</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                @error('kategori') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Gambar Sampul (Thumbnail)</label>
                <input type="file" name="gambar" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Ringkasan Singkat (Excerpt)</label>
            <textarea name="excerpt" rows="2" placeholder="Tuliskan ringkasan singkat berita..." class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary"></textarea>
            @error('excerpt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Isi Konten Berita</label>
            <textarea name="konten" rows="15" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary" id="editor">{{ old('konten') }}</textarea>
            @error('konten') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="flex items-center gap-4">
            <input type="checkbox" name="is_published" value="1" id="publish" {{ old('is_published') ? 'checked' : '' }} class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="publish" class="text-sm font-bold text-primary">Publikasikan Langsung</label>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="px-8 py-3 rounded-xl font-bold text-primary hover:bg-surface-container-low transition-all">Batal</a>
        </div>
    </form>
</div>
@endsection
