@extends('layouts.admin')
@section('page_title', 'Tambah Program Kerja')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.program-kerja.store') }}" method="POST" class="space-y-8">
        @csrf
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Nama Program</label>
                <input type="text" name="nama" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Departemen</label>
                <input type="text" name="departemen" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Material Icon Name</label>
                <input type="text" name="icon" value="hub" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Background Style</label>
                <select name="bg_style" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                    <option value="surface-container-low">Light Blue</option>
                    <option value="primary">Dark Blue (Featured)</option>
                    <option value="secondary-container">Gold/Yellow</option>
                    <option value="surface-container-highest">Light Gray</option>
                </select>
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Urutan</label>
                <input type="number" name="urutan" value="0" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary"></textarea>
        </div>
        <div class="flex items-center gap-4">
            <input type="checkbox" name="is_featured" value="1" id="featured" class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="featured" class="text-sm font-bold text-primary">Tampilkan sebagai Bento Card Besar (Featured)</label>
        </div>
        <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Program</button>
    </form>
</div>
@endsection
