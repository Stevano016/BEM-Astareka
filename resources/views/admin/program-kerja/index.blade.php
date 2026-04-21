@extends('layouts.admin')

@section('page_title', 'Manajemen Program Kerja')

@section('content')
{{-- Header Kontrol: Responsif --}}
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <h3 class="text-2xl font-headline font-black text-primary uppercase tracking-tighter">Daftar Proker</h3>
    <a href="{{ route('admin.program-kerja.create') }}" 
       class="w-full md:w-auto px-8 py-4 md:py-3 bg-primary text-white rounded-2xl font-black uppercase tracking-widest text-xs flex items-center justify-center gap-2 hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
        <span class="material-symbols-outlined text-base">add</span> 
        Tambah Program
    </a>
</div>

{{-- Tabel Container --}}
<div class="bg-white rounded-[2rem] shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[900px]">
            <thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-[0.2em] text-outline">
                <tr>
                    <th class="px-8 py-6">Nama Program</th>
                    <th class="px-8 py-6">Departemen</th>
                    <th class="px-8 py-6 text-center">Status</th>
                    <th class="px-8 py-6 text-center">Urutan</th>
                    <th class="px-8 py-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @forelse($programKerja as $item)
                <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/5 flex items-center justify-center text-primary shadow-sm border border-outline/5">
                                <span class="material-symbols-outlined">{{ $item->icon }}</span>
                            </div>
                            <span class="font-bold text-primary">{{ $item->nama }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[10px] font-black text-outline uppercase tracking-[0.1em]">{{ $item->departemen }}</span>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <span class="px-3 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest shadow-sm
                            {{ $item->is_featured ? 'bg-amber-100 text-amber-700 border border-amber-200' : 'bg-surface-container text-outline' }}">
                            {{ $item->is_featured ? 'Featured' : 'Regular' }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <span class="px-3 py-1 bg-surface-container-low rounded-lg text-xs font-bold text-primary">#{{ $item->urutan }}</span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.program-kerja.edit', $item->id) }}" 
                               class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                               title="Edit Proker">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.program-kerja.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                        title="Hapus Proker">
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
                            <span class="material-symbols-outlined text-6xl">hub</span>
                            <p>Belum ada program kerja.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
