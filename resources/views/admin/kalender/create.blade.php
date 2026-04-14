@extends('layouts.admin')
@section('page_title', 'Tambah Event')
@section('content')
<div class="max-w-4xl bg-white p-10 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.kalender.store') }}" method="POST" class="space-y-8">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Judul Event</label>
                <input type="text" name="judul" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Pilih Warna</label>
                <input type="color" name="warna" value="#3b82f6" class="w-full h-[52px] bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-2 py-1 rounded-t-lg font-bold text-primary">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-outline">Waktu Selesai (Opsional)</label>
                <input type="datetime-local" name="waktu_selesai" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-xs font-black uppercase tracking-widest text-outline">Deskripsi Event</label>
            <textarea name="deskripsi" rows="4" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary"></textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-8 py-4 bg-primary text-white rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Event</button>
            <a href="{{ route('admin.kalender.index') }}" class="px-8 py-4 bg-surface-container text-primary rounded-xl font-bold hover:bg-surface-container-high transition-all">Batal</a>
        </div>
    </form>
</div>
@endsection
