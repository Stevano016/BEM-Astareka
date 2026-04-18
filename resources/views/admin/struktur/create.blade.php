@extends('layouts.admin')
@section('page_title', 'Tambah Anggota Struktur')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">NIM</label>
                <input type="text" name="nim" value="{{ old('nim') }}" placeholder="e.g. 062302029" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan') }}" placeholder="e.g. Ketua BEM, Kepala Departemen..." required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Departemen</label>
                <input type="text" name="departemen" value="{{ old('departemen') }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Quote / Kata-kata (Optional)</label>
            <textarea name="quote" rows="3" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary"></textarea>
        </div>
        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Urutan Tampil</label>
            <input type="number" name="urutan" value="0" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
        </div>
        <div class="flex items-center gap-4">
            <input type="checkbox" name="is_active" value="1" id="active" checked class="rounded border-gray-300 text-primary focus:ring-primary">
            <label for="active" class="text-sm font-bold text-primary">Aktif</label>
        </div>
        <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Anggota</button>
    </form>
</div>
@endsection
