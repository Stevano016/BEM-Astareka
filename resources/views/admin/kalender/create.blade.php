@extends('layouts.admin')

@section('page_title', 'Tambah Event')

@section('content')
<div class="max-w-4xl bg-white p-6 md:p-12 rounded-[2rem] shadow-sm border border-outline/5">
    <form action="{{ route('admin.kalender.store') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            {{-- Judul Event --}}
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Judul Event</label>
                <input type="text" name="judul" required value="{{ old('judul') }}"
                       placeholder="Nama kegiatan..." 
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
                @error('judul') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Warna Event --}}
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Pilih Warna Label</label>
                <div class="flex items-center gap-4 bg-surface-container-low p-2 pl-6 rounded-2xl border-2 border-transparent focus-within:border-primary transition-all shadow-sm">
                    <span class="text-sm font-bold text-primary/40 flex-1">Identitas Warna</span>
                    <input type="color" name="warna" value="{{ old('warna', '#3b82f6') }}" 
                           class="w-16 h-10 rounded-xl cursor-pointer bg-transparent border-none">
                </div>
                @error('warna') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            {{-- Waktu Mulai --}}
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" required value="{{ old('waktu_mulai') }}"
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
                @error('waktu_mulai') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Waktu Selesai --}}
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Waktu Selesai (Opsional)</label>
                <input type="datetime-local" name="waktu_selesai" value="{{ old('waktu_selesai') }}"
                       class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">
                @error('waktu_selesai') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="space-y-3">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Deskripsi Event</label>
            <textarea name="deskripsi" rows="4" placeholder="Detail singkat mengenai kegiatan ini..." 
                      class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-xs mt-1 ml-1 font-bold">{{ $message }}</p> @enderror
        </div>

        {{-- Action Buttons: Stacked on Mobile --}}
        <div class="flex flex-col sm:flex-row gap-4 pt-4">
            <button type="submit" class="w-full sm:w-auto flex-1 bg-primary text-white px-10 py-5 md:py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
                Simpan Event
            </button>
            <a href="{{ route('admin.kalender.index') }}" 
               class="w-full sm:w-auto px-10 py-5 md:py-4 rounded-2xl font-black uppercase tracking-widest text-xs text-primary/40 hover:text-primary hover:bg-surface-container-low text-center transition-all border border-transparent hover:border-outline/5">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
