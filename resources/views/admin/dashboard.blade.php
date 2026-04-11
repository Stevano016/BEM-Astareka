@extends('layouts.admin')

@section('page_title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-outline/5 space-y-4">
        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
            <span class="material-symbols-outlined">newspaper</span>
        </div>
        <div>
            <p class="text-sm font-bold text-outline uppercase tracking-widest">Total Berita</p>
            <h3 class="text-3xl font-headline font-black text-primary">{{ $stats['total_berita'] }}</h3>
        </div>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-outline/5 space-y-4">
        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
            <span class="material-symbols-outlined">campaign</span>
        </div>
        <div>
            <p class="text-sm font-bold text-outline uppercase tracking-widest">Aspirasi Baru</p>
            <h3 class="text-3xl font-headline font-black text-primary">{{ $stats['aspirasi_baru'] }}</h3>
        </div>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-outline/5 space-y-4">
        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
            <span class="material-symbols-outlined">groups</span>
        </div>
        <div>
            <p class="text-sm font-bold text-outline uppercase tracking-widest">Struktur BEM</p>
            <h3 class="text-3xl font-headline font-black text-primary">{{ $stats['total_struktur'] }}</h3>
        </div>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-outline/5 space-y-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
            <span class="material-symbols-outlined">hub</span>
        </div>
        <div>
            <p class="text-sm font-bold text-outline uppercase tracking-widest">Program Kerja</p>
            <h3 class="text-3xl font-headline font-black text-primary">{{ $stats['total_program'] }}</h3>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-outline/5 overflow-hidden">
    <div class="p-8 border-b border-outline/5 flex justify-between items-center">
        <h3 class="font-headline font-extrabold text-primary">Aspirasi Terbaru</h3>
        <a href="{{ route('admin.aspirasi.index') }}" class="text-sm font-bold text-secondary">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low text-xs font-black uppercase tracking-widest text-outline">
                <tr>
                    <th class="px-8 py-4">Nama</th>
                    <th class="px-8 py-4">Kategori</th>
                    <th class="px-8 py-4">Pesan</th>
                    <th class="px-8 py-4">Status</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @foreach($aspirasiTerbaru as $asp)
                <tr>
                    <td class="px-8 py-4 font-bold text-primary">{{ $asp->nama ?? 'Anonim' }}</td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $asp->kategori }}</td>
                    <td class="px-8 py-4 text-sm text-on-surface-variant max-w-xs truncate">{{ $asp->pesan }}</td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest 
                            @if($asp->status == 'baru') bg-blue-100 text-blue-700 
                            @elseif($asp->status == 'selesai') bg-green-100 text-green-700 
                            @else bg-amber-100 text-amber-700 @endif">
                            {{ $asp->status }}
                        </span>
                    </td>
                    <td class="px-8 py-4">
                        <a href="{{ route('admin.aspirasi.show', $asp->id) }}" class="text-primary hover:text-secondary font-bold text-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
