@extends('layouts.admin')

@section('page_title', 'Kalender Kegiatan')

@section('content')
<div class="space-y-8">
    {{-- Header Kontrol: Responsif --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h3 class="text-2xl font-headline font-black text-primary uppercase tracking-tighter">Event Kalender</h3>
        <a href="{{ route('admin.kalender.create') }}" 
           class="w-full md:w-auto px-8 py-4 md:py-3 bg-primary text-white rounded-2xl font-black uppercase tracking-widest text-xs flex items-center justify-center gap-2 hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
            <span class="material-symbols-outlined text-base">add</span> 
            Tambah Event
        </a>
    </div>

    {{-- Tabel Container --}}
    <div class="bg-white rounded-[2rem] shadow-sm border border-outline/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[700px]">
                <thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-[0.2em] text-outline">
                    <tr>
                        <th class="px-8 py-6">Warna</th>
                        <th class="px-8 py-6">Judul Event</th>
                        <th class="px-8 py-6">Waktu Pelaksanaan</th>
                        <th class="px-8 py-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline/5">
                    @forelse($events as $event)
                    <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="w-8 h-8 rounded-full border-4 border-white shadow-sm ring-1 ring-outline/5" 
                                 style="background-color: {{ $event->warna }}"></div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="font-bold text-primary">{{ $event->judul }}</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-primary/80">
                                    {{ \Carbon\Carbon::parse($event->waktu_mulai)->translatedFormat('d F Y') }}
                                </span>
                                <span class="text-[10px] font-black text-outline uppercase tracking-widest mt-1">
                                    {{ \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') }} WIB
                                </span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.kalender.edit', $event->id) }}" 
                                   class="w-10 h-10 rounded-xl bg-secondary/10 text-secondary flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm"
                                   title="Edit Event">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <form action="{{ route('admin.kalender.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus event ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                            title="Hapus Event">
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
                                <span class="material-symbols-outlined text-6xl">calendar_month</span>
                                <p>Belum ada jadwal kegiatan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($events->hasPages())
        <div class="p-8 border-t border-outline/5 bg-surface-container-low/30">
            {{ $events->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
