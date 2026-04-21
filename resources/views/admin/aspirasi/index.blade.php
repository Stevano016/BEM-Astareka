@extends('layouts.admin')

@section('page_title', 'Daftar Aspirasi')

@section('content')
<div class="mb-8 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
    {{-- Filter Status: Scrollable on mobile --}}
    <div class="flex gap-2 overflow-x-auto no-scrollbar pb-2 -mx-4 px-4 lg:mx-0 lg:px-0">
        @foreach(['baru', 'dibaca', 'diproses', 'selesai'] as $st)
            <a href="{{ route('admin.aspirasi.index', ['status' => $st]) }}" 
                class="px-5 py-3 rounded-2xl text-xs font-black uppercase tracking-widest whitespace-nowrap transition-all shadow-sm
                {{ (request('status') == $st) ? 'bg-primary text-white shadow-primary/20' : 'bg-white text-primary/60 hover:text-primary border border-outline/5' }}">
                {{ $st }}
            </a>
        @endforeach
        <a href="{{ route('admin.aspirasi.index') }}" 
           class="px-5 py-3 rounded-2xl text-xs font-black uppercase tracking-widest bg-white text-primary/40 border border-outline/5 hover:text-primary transition-all shadow-sm">
           Semua
        </a>
    </div>
    
    {{-- Tombol Rekap: Full width on mobile --}}
    <a href="{{ route('admin.aspirasi.export') }}" 
       class="w-full lg:w-auto px-8 py-4 lg:py-3 rounded-2xl text-sm font-bold bg-green-600 text-white hover:bg-green-700 active:scale-95 transition-all flex items-center justify-center gap-2 shadow-lg shadow-green-600/10">
        <span class="material-symbols-outlined text-base">download</span>
        Rekap Excel
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[900px]">
            <thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-[0.2em] text-outline">
                <tr>
                    <th class="px-8 py-6">Pengirim</th>
                    <th class="px-8 py-6">Kategori</th>
                    <th class="px-8 py-6">Pesan</th>
                    <th class="px-8 py-6 text-center">Status</th>
                    <th class="px-8 py-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @forelse($aspirasi as $asp)
                <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                    <td class="px-8 py-5">
                        <div class="space-y-1">
                            <p class="font-bold text-primary">{{ $asp->nama ?? 'Anonim' }}</p>
                            <p class="text-[10px] text-outline font-bold uppercase tracking-widest">{{ $asp->prodi }}</p>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1.5 bg-surface-container-low rounded-lg text-[10px] font-black text-primary uppercase tracking-widest border border-outline/5">
                            {{ $asp->kategori }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <p class="text-sm text-on-surface-variant max-w-xs truncate font-medium italic opacity-70">"{{ $asp->pesan }}"</p>
                    </td>
                    <td class="px-8 py-5 text-center">
                        <span class="px-4 py-2 rounded-xl text-[9px] font-black uppercase tracking-[0.15em] shadow-sm
                            @if($asp->status == 'baru') bg-blue-100 text-blue-700 
                            @elseif($asp->status == 'selesai') bg-green-100 text-green-700 
                            @else bg-amber-100 text-amber-700 @endif">
                            {{ $asp->status }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.aspirasi.show', $asp) }}" 
                               class="w-10 h-10 rounded-xl bg-primary-container/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-sm"
                               title="Lihat Detail">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </a>
                            @can('delete', $asp)
                            <form action="{{ route('admin.aspirasi.destroy', $asp) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                        title="Hapus Aspirasi">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center gap-4 text-outline/30 font-bold">
                            <span class="material-symbols-outlined text-6xl">campaign</span>
                            <p>Belum ada aspirasi untuk status ini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($aspirasi->hasPages())
    <div class="p-8 border-t border-outline/5 bg-surface-container-low/30">
        {{ $aspirasi->links() }}
    </div>
    @endif
</div>

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection
