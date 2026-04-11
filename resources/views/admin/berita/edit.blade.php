@extends('layouts.admin')
@section('page_title', 'Edit Berita')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf @method('PUT')
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Judul Berita</label>
            <input type="text" name="judul" value="{{ $berita->judul }}" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Kategori</label>
                <select name="kategori" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                    <option value="News" {{ $berita->kategori == 'News' ? 'selected' : '' }}>News</option>
                    <option value="Event" {{ $berita->kategori == 'Event' ? 'selected' : '' }}>Event</option>
                    <option value="Announcement" {{ $berita->kategori == 'Announcement' ? 'selected' : '' }}>Announcement</option>
                    <option value="Achievement" {{ $berita->kategori == 'Achievement' ? 'selected' : '' }}>Achievement</option>
                </select>
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Thumbnail Image (Kosongi jika tetap)</label>
                <input type="file" name="gambar" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Excerpt (Ringkasan Singkat)</label>
            <textarea name="excerpt" rows="2" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $berita->excerpt }}</textarea>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Isi Konten (HTML)</label>
            <textarea name="konten" rows="10" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary" id="editor">{{ $berita->konten }}</textarea>
        </div>
        <div class="flex items-center gap-4">
            <input type="checkbox" name="is_published" value="1" id="publish" {{ $berita->is_published ? 'checked' : '' }} class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="publish" class="text-sm font-bold text-primary">Publikasikan</label>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Update Berita</button>
            <a href="{{ route('admin.berita.index') }}" class="px-8 py-3 rounded-xl font-bold text-primary hover:bg-surface-container-low transition-all">Batal</a>
        </div>
    </form>
</div>
@endsection
