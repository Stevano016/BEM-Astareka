@extends('layouts.admin')
@section('page_title', 'Kalender Kegiatan')
@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-headline font-black text-primary uppercase tracking-tighter">Event Kalender</h3>
        <a href="{{ route('admin.kalender.create') }}" class="px-6 py-3 bg-primary text-white rounded-xl font-bold flex items-center gap-2 hover:bg-primary-container transition-all">
            <span class="material-symbols-outlined">add</span> Tambah Event
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-outline/5 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low border-b border-outline/5">
                <tr>
                    <th class="px-6 py-4 font-black uppercase text-xs text-outline tracking-widest">Warna</th>
                    <th class="px-6 py-4 font-black uppercase text-xs text-outline tracking-widest">Judul Event</th>
                    <th class="px-6 py-4 font-black uppercase text-xs text-outline tracking-widest">Waktu</th>
                    <th class="px-6 py-4 font-black uppercase text-xs text-outline tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @foreach($events as $event)
                <tr>
                    <td class="px-6 py-4">
                        <div class="w-6 h-6 rounded-full" style="background-color: {{ $event->warna }}"></div>
                    </td>
                    <td class="px-6 py-4 font-bold text-primary">{{ $event->judul }}</td>
                    <td class="px-6 py-4 text-sm text-outline font-medium">
                        {{ \Carbon\Carbon::parse($event->waktu_mulai)->format('d M Y H:i') }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.kalender.edit', $event->id) }}" class="p-2 text-secondary hover:bg-secondary/5 rounded-lg transition-colors inline-block">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <form action="{{ route('admin.kalender.destroy', $event->id) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 text-error hover:bg-error/5 rounded-lg transition-colors" onclick="return confirm('Hapus event ini?')">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $events->links() }}
    </div>
</div>
@endsection
