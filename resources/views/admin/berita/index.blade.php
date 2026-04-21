@extends('layouts.admin')

@section('page_title', 'Manajemen Berita')

@section('content')
{{-- Header Kontrol: Responsif untuk Mobile --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    {{-- Search Bar --}}
    <form action="{{ route('admin.berita.index') }}" method="GET" class="relative w-full md:w-80">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline/50">search</span>
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Cari berita..." 
               class="w-full pl-10 pr-4 py-3 md:py-2.5 bg-white border border-outline/10 rounded-2xl text-sm focus:ring-primary focus:border-primary font-bold shadow-sm transition-all">
    </form>

    {{-- Tombol Utama --}}
    <a href="{{ route('admin.berita.create') }}" 
       class="w-full md:w-auto bg-primary text-white px-8 py-4 md:py-3 rounded-2xl font-bold text-sm flex items-center justify-center gap-2 hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
        <span class="material-symbols-outlined text-base">add</span>
        Tulis Berita Baru
    </a>
</div>

{{-- Table Container --}}
<div class="bg-white rounded-[2rem] shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[800px]">
            <thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-[0.2em] text-outline">
                <tr>
                    <th class="px-8 py-6">Judul Berita</th>
                    <th class="px-8 py-6">Kategori</th>
                    <th class="px-8 py-6">Status</th>
                    <th class="px-8 py-6">Tanggal</th>
                    <th class="px-8 py-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @forelse($berita as $item)
                <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl bg-primary/5 flex-shrink-0 overflow-hidden border border-outline/5">
                                @if($item->gambar) 
                                    <img src="{{ Storage::url($item->gambar) }}" class="w-full h-full object-cover"> 
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-primary/20">
                                        <span class="material-symbols-outlined">image</span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-bold text-primary truncate max-w-[200px] md:max-w-xs">{{ $item->judul }}</span>
                                <span class="text-[10px] text-outline uppercase font-bold tracking-widest mt-0.5">Admin ASTAREKA</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1.5 bg-surface-container rounded-lg text-[10px] font-black text-primary uppercase tracking-widest">
                            {{ $item->kategori }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <form action="{{ route('admin.berita.publish', $item->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" 
                                    class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-[0.15em] active:scale-95 transition-all
                                    {{ $item->is_published ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $item->is_published ? 'Terbit' : 'Draf' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-xs font-bold text-outline">{{ $item->published_at?->format('d/m/Y') ?? '-' }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.berita.edit', $item->id) }}" 
                               class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                               title="Edit Berita">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                        title="Hapus Berita">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center gap-4 text-outline/30 font-bold">
                            <span class="material-symbols-outlined text-6xl">newspaper</span>
                            <p>Belum ada berita yang tersedia.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- Pagination: Harus responsif --}}
    @if($berita->hasPages())
    <div class="p-8 border-t border-outline/5 bg-surface-container-low/30">
        {{ $berita->links() }}
    </div>
    @endif
</div>
@endsection
