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
                <input type="text" name="nama" value="{{ old('nama', $struktur->nama) }}" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">NIM</label>
                <input type="text" name="nim" value="{{ old('nim', $struktur->nim) }}" placeholder="e.g. 062302029" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $struktur->jabatan) }}" placeholder="e.g. Ketua BEM, Kepala Departemen..." required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Departemen</label>
                <input type="text" name="departemen" value="{{ old('departemen', $struktur->departemen) }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
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
        <div class="space-y-4">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Foto Anggota</label>
            @if($struktur->foto)
                <div class="w-32 aspect-[3/4] rounded-xl overflow-hidden mb-2 bg-surface-container">
                    <img src="{{ Storage::url($struktur->foto) }}" class="w-full h-full object-cover">
                </div>
            @endif
            <input type="file" name="foto" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            <p class="text-[10px] text-outline italic">Kosongkan jika tidak ingin mengubah foto. Max: 2MB</p>
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
