@extends('layouts.admin')
@section('page_title', 'Edit Anggota Struktur')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ $struktur->nama }}" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $struktur->jabatan }}" placeholder="e.g. Ketua BEM, Kepala Departemen..." required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Departemen</label>
                <input type="text" name="departemen" value="{{ $struktur->departemen }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Foto Profile (Kosongi jika tetap)</label>
                <input type="file" name="foto" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Quote / Kata-kata (Optional)</label>
            <textarea name="quote" rows="3" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $struktur->quote }}</textarea>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ $struktur->urutan }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
        </div>
        <div class="flex items-center gap-4">
            <input type="checkbox" name="is_active" value="1" id="active" {{ $struktur->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="active" class="text-sm font-bold text-primary">Aktif</label>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Update Anggota</button>
            <a href="{{ route('admin.struktur.index') }}" class="px-8 py-3 rounded-xl font-bold text-primary hover:bg-surface-container-low transition-all">Batal</a>
        </div>
    </form>
</div>
@endsection
