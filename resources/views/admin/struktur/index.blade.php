@extends('layouts.admin')

@section('page_title', 'Struktur Organisasi')

@section('content')
{{-- Header Kontrol: Responsif --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <h3 class="text-2xl font-headline font-black text-primary uppercase tracking-tighter">Daftar Pengurus</h3>
    <a href="{{ route('admin.struktur.create') }}" 
       class="w-full md:w-auto px-8 py-4 md:py-3 bg-primary text-white rounded-2xl font-black uppercase tracking-widest text-xs flex items-center justify-center gap-2 hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
        <span class="material-symbols-outlined text-base">person_add</span> 
        Tambah Pengurus
    </a>
</div>

{{-- Tabel Container --}}
<div class="bg-white rounded-[2rem] shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[900px]">
            <thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-[0.2em] text-outline">
                <tr>
                    <th class="px-8 py-6">Nama & NIM</th>
                    <th class="px-8 py-6">Jabatan</th>
                    <th class="px-8 py-6">Departemen</th>
                    <th class="px-8 py-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @forelse($struktur as $item)
                <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-primary/5 flex-shrink-0 overflow-hidden border-2 border-white shadow-sm ring-1 ring-outline/5">
                                @if($item->foto) 
                                    <img src="{{ Storage::url($item->foto) }}" class="w-full h-full object-cover"> 
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=001e40&color=fff" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-bold text-primary truncate max-w-[200px]">{{ $item->nama }}</span>
                                <span class="text-[10px] text-outline uppercase font-black tracking-widest mt-0.5">{{ $item->nim ?? '-' }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1.5 bg-secondary/10 text-secondary rounded-lg text-[10px] font-black uppercase tracking-widest border border-secondary/10">
                            {{ $item->jabatan }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[10px] font-black text-outline uppercase tracking-widest">
                            {{ $item->departemen ?? 'BPH' }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.struktur.edit', $item->id) }}" 
                               class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                               title="Edit Pengurus">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengurus ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                        title="Hapus Pengurus">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center gap-4 text-outline/30 font-bold">
                            <span class="material-symbols-outlined text-6xl">groups</span>
                            <p>Belum ada data pengurus.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($struktur->hasPages())
    <div class="p-8 border-t border-outline/5 bg-surface-container-low/30">
        {{ $struktur->links() }}
    </div>
    @endif
</div>
@endsection
