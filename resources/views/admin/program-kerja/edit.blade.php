@extends('layouts.admin')
@section('page_title', 'Edit Program Kerja')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.program-kerja.update', $programKerja->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Nama Program</label>
                <input type="text" name="nama" value="{{ $programKerja->nama }}" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Departemen</label>
                <input type="text" name="departemen" value="{{ $programKerja->departemen }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Material Icon Name</label>
                <input type="text" name="icon" value="{{ $programKerja->icon }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Background Style</label>
                <select name="bg_style" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                    <option value="surface-container-low" {{ $programKerja->bg_style == 'surface-container-low' ? 'selected' : '' }}>Light Blue</option>
                    <option value="primary" {{ $programKerja->bg_style == 'primary' ? 'selected' : '' }}>Dark Blue (Featured)</option>
                    <option value="secondary-container" {{ $programKerja->bg_style == 'secondary-container' ? 'selected' : '' }}>Gold/Yellow</option>
                    <option value="surface-container-highest" {{ $programKerja->bg_style == 'surface-container-highest' ? 'selected' : '' }}>Light Gray</option>
                </select>
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Urutan</label>
                <input type="number" name="urutan" value="{{ $programKerja->urutan }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $programKerja->deskripsi }}</textarea>
        </div>
        <div class="flex items-center gap-4">
            <input type="checkbox" name="is_featured" value="1" id="featured" {{ $programKerja->is_featured ? 'checked' : '' }} class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="featured" class="text-sm font-bold text-primary">Tampilkan sebagai Bento Card Besar (Featured)</label>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Update Program</button>
            <a href="{{ route('admin.program-kerja.index') }}" class="px-8 py-3 rounded-xl font-bold text-primary hover:bg-surface-container-low transition-all">Batal</a>
        </div>
    </form>
</div>
@endsection
